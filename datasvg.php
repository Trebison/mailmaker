

<?php
	echo '<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>';
	require_once 'excel/reader.php';

	$nombre = "";
	$apellido = "";
	$ext = "@uvm.edu.ve";
	$nuevo_correo="";
	$generacion ="";

	// Excel VARIOS CORREOS
	if(isset($_POST['enviar'])){

		if($_POST['namefile'] == NULL){
			$namefile = 'correos';
		}
		else{
			$namefile = $_POST['namefile'];
		}

		//crea la carpeta y el archivo en el directorio
		$carpeta = 'files/list_'.$namefile.' ('.date("Y-m-d").')';
		if(!file_exists($carpeta)){
			mkdir($carpeta, 0777, true);
		}
		$archivo = $_FILES['archivo']['tmp_name'];
		$archivo_name = $_FILES['archivo']['name'];
		$archivo_rename = $namefile.".xls";
		move_uploaded_file($archivo,$carpeta."/".$archivo_rename);
		$xls = $carpeta."/".$archivo_rename;

		//carga el archivo .xls
		$data = new Spreadsheet_Excel_Reader();
		$data->setOutputEncoding('CP1251');
		$data->read($xls);

		echo("<br><div class='info'><table>");
		for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
			echo("<tr>");
			for ($j = 2; $j <= $data->sheets[0]['numCols']; $j++) {
				$all = $data->sheets[0]['cells'][$i][$j];

				echo("<td>". ucwords(strtolower($all)) ."</td>");

				if($j==2) //apellido
				{
					$partes = $data->sheets[0]['cells'][$i][$j];
					$partes = str_replace("?","",$partes);
					$partes = explode(' ',$partes);
					$nuevo_correo.=$partes[0].$partes[1];

				}
				if($j==3) //nombre
				{
					$partes = explode(' ',$data->sheets[0]['cells'][$i][$j]);
					$nuevo_correo .= substr($partes[0], 0, 1);
					$nuevo_correo .= substr($partes[1], 0, 1);

				//	Genera el correo @uvm.edu.ve
					$nuevo_correo.=$ext;
					$nuevo_correo = utf8_encode(strtolower($nuevo_correo));
					$nuevo_correo = str_replace(" ","",$nuevo_correo); //ojo: espacio fantama, mucho cuidado xq da miedo!! ://
					$nuevo_correo = str_replace(" ","",$nuevo_correo);
					$nuevo_correo = str_replace(array(0=>'á',1=>'é',2=>'í',3=>'ó',4=>'ú',5=>'ñ',6=>' ',7=>'ñ',8=>'Á',9=>'É',10=>'Í',11=>'Ó',12=>'Ú'), array(0=>'a',1=>'e',2=>'i',3=>'o',4=>'u',5=>'n',6=>'',7=>'n',8=>'a',9=>'e',10=>'i',11=>'o',12=>'u'),$nuevo_correo);
				}
	
			}

			$generacion .= utf8_encode(ucwords(strtolower(
				$data->sheets[0]['cells'][$i][3])))
				.','.
				utf8_encode(ucwords(strtolower($data->sheets[0]['cells'][$i][2])))
				.','.
				$nuevo_correo
				.',uvm'.
				$data->sheets[0]['cells'][$i][4]
				.','.
				utf8_encode($data->sheets[0]['cells'][$i][5]).',,,,,,,,,,,'.PHP_EOL;


			echo("<td>".$nuevo_correo."</td>");
			echo("</tr>");
			$nuevo_correo="";
		}

		echo("</table></div>");
		$control = fopen($carpeta."/".$namefile."_para_importar.csv","w+");
		$head = 'First Name,Last Name,Email Address,Password,Secondary Email,Work Phone 1,Home Phone 1,Mobile Phone 1,Work address 1,Home address 1,Employee Id,Employee Type,Employee Title,Manager,Department,Cost Center
		';
		$generacion = str_replace(array(0=>'á',1=>'é',2=>'í',3=>'ó',4=>'ú',5=>'ñ',6=>' ',7=>'ñ',8=>'Á',9=>'É',10=>'Í',11=>'Ó',12=>'Ú'), array(0=>'a',1=>'e',2=>'i',3=>'o',4=>'u',5=>'n',6=>'',7=>'n',8=>'a',9=>'e',10=>'i',11=>'o',12=>'u'),$generacion);

		fwrite($control, $head);
		fwrite($control, $generacion);
		fclose($control);
	}

?>