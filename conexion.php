<?php 
	function conexion()
	{
		if (!($link=mysqli_connect("localhost","root","","base_btr"))){
			echo "Error conectando a la base de datos";
			exit();
		}
		return $link;
	}
 ?>