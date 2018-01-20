<?php

	include("data/conexion.php");

	echo '<form action="mailmaker.php" method="POST">';
	echo '<input type="text" placeholder="Cédula" name="ci"><br>';
	echo '<input type="submit" name="enviar" value="Click">';
	echo '</form>';

	if(isset($_POST['enviar'])){

		if($_POST['ci'] == NULL){

			header("refresh:0, mailmaker.php");
		}
		else{

			$alumno = $_POST['ci'];

			$sql = mysql_query("SELECT * FROM alumno WHERE ced_alu LIKE '$alumno'");
			while($data = mysql_fetch_array($sql)){

				$lastname = str_replace(array(0=>'á',1=>'é',2=>'í',3=>'ó',4=>'ú',5=>'ñ',6=>' ',7=>'Ñ'), array(0=>'a',1=>'e',2=>'i',3=>'o',4=>'u',5=>'n',6=>'',7=>'n'),$data['ape_alu']);

				$name = str_replace(array(0=>'á',1=>'é',2=>'í',3=>'ó',4=>'ú',5=>'ñ',6=>' ',7=>'Ñ'), array(0=>'a',1=>'e',2=>'i',3=>'o',4=>'u',5=>'n',6=>'',7=>'n'),$data['nom_alu']);

				$ci = $data['ced_alu'];
				$name = utf8_encode(ucwords(strtolower($name)));
				$lastname = utf8_encode(ucwords(strtolower($lastname)));

				$fullname = explode(' ',$lastname);
				$fullname = $fullname[0].$fullname[1];
				$initials = substr($name, 0,1);
				$mail = strtolower($fullname.$initials);

				$pass = 'uvm'.$ci;

				$texto = nl2br("Hola, ".$name." ".$lastname.".\n\nTu Cuenta de Correo Institucional es: ".$mail."@uvm.edu.ve\nY tu contraseña temporal es: ".$pass."\n\nAl ingresar, el sistema te va solicitar que cambies la contraseña por otra de tu preferencia.\n\n");
				$texto = str_replace('<br />','',$texto);

				$all = nl2br("Nombre: ".$name.",\nApellido: ".$lastname.",\nCorreo: ".$mail."@uvm.edu.ve,\nContraseña: ".$pass."");
				$all = str_replace('<br />','',$all);

				echo '<div class="form">';
					echo '<textarea id="texte" readonly>'.$texto.'</textarea>';
					echo '<div class="result">';
						echo '<input type="text" id="area1" value="'.$name.'" readonly>';
						echo '<button id="copyBlock1"><i class="icon-content_copy"></i></button><br>';
						echo '<input type="text" id="area2" value="'.$lastname.'" readonly>';
						echo '<button id="copyBlock2"><i class="icon-content_copy"></i></button><br>';
						echo '<input type="text" id="area3" value="'.$mail.'" readonly>';
						echo '<button id="copyBlock3"><i class="icon-content_copy"></i></button><br>';
						echo '<input type="text" id="area4" value="'.$pass.'" readonly>';
						echo '<button id="copyBlock4"><i class="icon-content_copy"></i></button><br>';
					echo '</div>';
					echo '<textarea id="alle">'.$all.'</textarea>';
				echo '</div>';

				echo '<div class="options">';
					echo '<button id="copyText"><i class="icon-text_fields"></i></button>';
					echo '<button><i class="icon-file_upload"></i></button>';
					echo '<button id="copyAll"><i class="icon-strikethrough_s"></i></button>';
				echo '</div>';

/*
				mysql_query("INSERT INTO busqueda (ci,name,lastname) values ('$ci','$name','$lastname')");
				if(mysql_affected_rows()>0){

				}
				else{

				}

*/
				$query = mysql_query("SELECT * FROM datos_ingreso WHERE ced_alu LIKE '$alumno'");
				while($row = mysql_fetch_array($query)){

					if($row['car_ing'] == 'IS'){
						$carrera = 'Ingeniería de Computación';
					}
					if($row['car_ing'] == 'II'){
						$carrera = 'Ingeniería Industrial';
					}
					if($row['car_ing'] == 'FS'){
						$carrera = 'Administración de Empresas';
					}
					if($row['car_ing'] == 'CP'){
						$carrera = 'Contaduría Pública';
					}
					if($row['car_ing'] == 'DS'){
						$carrera = 'Derecho';
					}
					if($row['car_ing'] == 'PS'){
						$carrera = 'Ciencias Políticas';
					}

					echo '<p>Estudiante de: <b>'.$carrera.'</b></p><br>';

				}

				echo '<text id="copyAnswer"></text>';
			}
		}
	}

?>