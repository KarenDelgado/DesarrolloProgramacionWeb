Swal.fire({
	title: 'Error',
	html: 'El nick ya se encuentra registrado, ingrese otro.<br><br><br><a href="javascript: history.go(-1)" class="alerta">Volver</a>',
	showConfirmButton: false,
	//confirmButtonText: 'Aceptar',
	//confirmButtonColor: 'black',
	//icon: 'error',
	//closeButtonHtml: '<a href="Registro.html">Clic </a>'
	padding: '1.5rem',
	allowOutsideClick: false,
	imageUrl: './img/cheems_alerta.png',
	imageWidth:'40%'

});