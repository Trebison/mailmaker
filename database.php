<?php

	require("data/conexion.php");

	$i = 1;
	$query = mysql_query("SELECT * FROM alumno");
	while($data = mysql_fetch_array($query)){

		$ci = $data['ced_alu'];
		$name = utf8_encode($data['nom_alu']);
		$lastname = $data['ape_alu'];

		echo $i.' | ';
		echo $ci.' | ';

		if($name = str_replace(array(0=>'&nbsp;',1=>'Â ',2=>'Â',3=>'Ã',5=>'š',4=>'©',6=>'Ã‰',7=>'¹',9=>'³',10=>'¨',11=>'ï',12=>'½',13=>'¬',14=>'-',15=>'±'), array(0=>' ',1=>' ',2=>'',3=>'',4=>'E',5=>'U',6=>'E',7=>'U',9=>'O',10=>'E',11=>'A',12=>'',13=>'I',14=>'U',15=>'N'), $name)){
			$name = $name;
		}
		else{
			$name = $name;
		}

		if($lastname = str_replace(array(0=>'&nbsp;',1=>'Â ',2=>'Â',3=>'Ã',5=>'š',4=>'©',6=>'Ã‰',7=>'¹',9=>'³',10=>'¨',11=>'ï',12=>'½',13=>'¬',14=>'-',15=>'±'), array(0=>' ',1=>' ',2=>'',3=>'',4=>'E',5=>'U',6=>'E',7=>'U',9=>'O',10=>'E',11=>'A',12=>'',13=>'I',14=>'U',15=>'N'), $lastname))
		{
			$lastname = $lastname;
		}
		else{
			$lastname = $lastname;
		}

		$name = utf8_encode(ucwords(strtolower($name)));
		$lastname = utf8_encode(ucwords(strtolower($lastname)));

		mysql_query("INSERT INTO estudiantes (ci,name,lastname) values ('$ci','$name','$lastname')");
		if(mysql_affected_rows()>0){
			
		}
		else{

		}

		echo $name.' '.' ';
		echo $lastname.' '.'<br>';
		$i++;
	}

?>