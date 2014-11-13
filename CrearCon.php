<?php
session_start();
?> 


<?php

				//traigo las variables del formulario
				$complejo=$_POST['complejos'];
				$fecha   =$_POST['fecha'];
				$desc    =$_POST['descripcion'];
				$partici =$_POST['participantes'];
				$idconvo = $_session ["idconvo"];

				// CONExion A  LA BASE DE DATOS
 			$con=mysql_connect("127.0.0.1","root","mysql");
				if (mysqli_connect_errno()){
				echo "fallo la conexion: ".mysqli_connect_error();
				}				
				//selecciono la base de datos
			 $link = mysql_select_db("futbol",$con);
			
 			if ($_POST[agregar]) { 
 				mysql_query ("INSERT INTO participantes VALUES(".$idconvo.",".$partici.")");
 				die("<script>location.href = 'convocatoria.php'</script>");
 				//header("refresh:1;url=convocatoria.php");
 			}

 			if ($_POST[Crear]) { 
 				mysql_query ("INSERT INTO convocatorias VALUES (".$idconvo.",".$complejo.",".$desc.")");
 				echo "Convocatoria creada, su codigo para modificar o cancelar la convocatoria es :".$idconvo;

 			}

?>