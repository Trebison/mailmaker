<html>
	<head>
		<title>Mailmaker</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="fonts/icons.css">
		<script src="js/jquery-3.2.1.js"></script>
	</head>
	<body>
		<header>
			<div class="icon" id="svg"><i class="icon-mail_outline"></i></div>
		</header>
		<main>
			<form action="datasvg.php" method="POST" enctype="multipart/form-data">
				<input type="text" name="namefile" placeholder="Nombre"><br>
				<input type="file" name="archivo"><br>
				<input type="submit" name="enviar" value="Subir">
			</form>
			<a href="excel/formato.xls">— Haz click aquí para descargar el formato .xls —</a>
		</main>
	</body>
	<script src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/copy.js"></script>
</html>