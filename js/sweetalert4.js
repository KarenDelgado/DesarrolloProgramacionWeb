Swal.fire({
	title: 'Error',
	html: 'Debe iniciar sesión para poder encargar productos.<br><br><br><a href="javascript: history.go(-1)" class="alerta">Regresar</a>',
	showConfirmButton: false,
	//confirmButtonText: 'Aceptar',
	//confirmButtonColor: 'black',
	//icon: 'error',
	//closeButtonHtml: '<a href="Registro.html">Clic </a>'
	padding: '1.5rem',
	allowOutsideClick: false,
	imageUrl: './img/cheems_error.png',
	imageWidth:'70%'

});