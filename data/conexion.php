<?php
	$host="localhost";
	$usr="root";
	$password="";
	$bsd="uvm2";
	
	$conexion=mysql_connect($host,$usr,$password) or die("Error de Conexion");
	if (!function_exists('mysql_set_charset')) {
		function mysql_set_charset($charset,$conexion)
		{
			return mysql_query("set names $charset",$conexion);
		}
	}
	mysql_select_db($bsd,$conexion) or die("Error en la Base de Datos");
?>