
	var area1 = document.getElementById("area1");
	var area2 = document.getElementById("area2");
	var area3 = document.getElementById("area3");
	var area4 = document.getElementById("area4");
	var texte = document.getElementById("texte");
	var texta = document.getElementById("alle");
	var copy1 = document.getElementById("copyBlock1");
	var copy2 = document.getElementById("copyBlock2");
	var copy3 = document.getElementById("copyBlock3");
	var copy4 = document.getElementById("copyBlock4");
	var copy5 = document.getElementById("copyText");
	var copy6 = document.getElementById("copyAll");
	var answer = document.getElementById("copyAnswer");

	copy1.addEventListener('click', function(e) {
	area1.select();
	try {
		 var successful = document.execCommand('copy');
		     
		 if(successful) answer.innerHTML = '¡Nombre Copiado!';
		     else answer.innerHTML = 'Incapaz de copiar';
		 } catch (err) {
		      answer.innerHTML = 'El navegador no soporta esta acción';
		 }
	});

	copy2.addEventListener('click', function(e) {
	area2.select();
	try {
		 var successful = document.execCommand('copy');
		     
		 if(successful) answer.innerHTML = '¡Apellido Copiado!';
		     else answer.innerHTML = 'Incapaz de copiar';
		 } catch (err) {
		      answer.innerHTML = 'El navegador no soporta esta acción';
		 }
	});

	copy3.addEventListener('click', function(e) {
	area3.select();
	try {
		 var successful = document.execCommand('copy');
		     
		 if(successful) answer.innerHTML = '¡Correo Copiado!';
		     else answer.innerHTML = 'Incapaz de copiar';
		 } catch (err) {
		      answer.innerHTML = 'El navegador no soporta esta acción';
		 }
	});

	copy4.addEventListener('click', function(e) {
	area4.select();
	try {
		 var successful = document.execCommand('copy');
		     
		 if(successful) answer.innerHTML = '¡Contraseña Copiada!';
		     else answer.innerHTML = 'Incapaz de copiar';
		 } catch (err) {
		      answer.innerHTML = 'El navegador no soporta esta acción';
		 }
	});

	copy5.addEventListener('click', function(e) {
	texte.select();
	try {
		 var successful = document.execCommand('copy');
		     
		 if(successful) answer.innerHTML = '¡Texto Copiado!';
		     else answer.innerHTML = 'Incapaz de copiar';
		 } catch (err) {
		      answer.innerHTML = 'El navegador no soporta esta acción';
		 }
	});

	copy6.addEventListener('click', function(e) {
	texta.select();
	try {
		 var successful = document.execCommand('copy');
		     
		 if(successful) answer.innerHTML = '¡Texto Copiado!';
		     else answer.innerHTML = 'Incapaz de copiar';
		 } catch (err) {
		      answer.innerHTML = 'El navegador no soporta esta acción';
		 }
	});