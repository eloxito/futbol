<?php
session_start();
?> 

<head>
	  <title>Convocatoria</title>
<h1 ALIGN=center> Crear Convocatoria </h1> 
		<?php  
			echo  $_SESSION["Nombre_Usuario"] ;
		?>
</head>

<body > 
	<div style="margin-left:30%; top: -30%; text-align: center; width: 45%; margin-top: 5%;background-color:null;">

<?php
            $con=mysql_connect("127.0.0.1","root","mysql");
				if (mysqli_connect_errno()){
				echo "fallo la conexion: ".mysqli_connect_error();
				}				
				//selecciono la base de datoscxcxcxc
			 $link = mysql_select_db("futbol",$con);

			 $resul  = mysql_query ("SELECT * FROM complejos");
                        $resul2 = mysql_query("SELECT usuarios.Id, usuarios.Nombre FROM usuarios INNER JOIN amistad ON (usuarios.Id=amistad.IdUsuario2) WHERE IdUsuario2!=14624410");
             //$resul2= mysql_query("SELECT usuarios.Id, usuarios.Nombre FROM usuarios INNER JOIN amistad ON (usuarios.Id=amistad.IdUsuario2) WHERE IdUsuario2!=".$_SESSION["Id_Usuario"]);
                    
             if (!isset($_SESSION ["idconvo"])) {
                   $resul4 = mysql_query ("SELECT COUNT(*) as Cant FROM convocatorias");
                   $row4 = mysql_fetch_array($resul4);
                   $row4['Cant'];
                   $_SESSION ["idconvo"]=($row4['Cant']+1);
                } else{
                 $resul3 = mysql_query ("SELECT usuarios.Id, usuarios.Nombre FROM usuarios INNER JOIN  participantes ON (usuarios.Id=participantes.IdUsuario) WHERE IdConvocatoria=".$_SESSION ["idconvo"]);   
                }
          
        //("SELECT usuarios.Id, usuarios.Nombre FROM usuarios INNER JOIN amistad ON (usuarios.Id=amistad.IdUsuario2) WHERE IdUsuario2 !=".$_SESSION["Id_Usuario"]);
                    //("SELECT * FROM amistad WHERE IdUsuario1=".$_SESSION["Id_Usuario"]);
					//while($row = mysql_fetch_array($resul) )	{
					//	echo $row['Nombre']." ---- ".$row['Direccion'];
					//	echo "<br><br>";
					//			}
?>

	<form action="CrearCon.php" method="POST" >

		<table border="0" cellpadding="1">
    <tbody >
        <tr>
            <td>Complejo Deportivo</td>
            <td><select name="complejos">
                <?php 
                    while($row = mysql_fetch_array($resul) )    {              
    				echo "<option value=".$row["Id"]."> ".$row['Nombre']." -- ".$row['Direccion']."</option>";
                    }
                      ?>
    				
				</select><br/><br/></td>
        </tr>
        <tr>
            <td>Fecha</td>
            <td><input type="date" name="fecha"><br/><br/></td>
        </tr>
        <tr>
            <td>Descripcion</td>
            <td><textarea name="descripcion" rows="4" cols="20"> </textarea></td>
        </tr>
        <tr>
            <td>Participantes</td>
            <td><select name="Participantes">
    			<?php 
                    while($row2 = mysql_fetch_array($resul2) )    {  
                      echo "<option value=".$row2[0]."> ".$row2[1]."</option>";
                           
                    }
                ?>
			</td>
			<td><input type="submit" name="agregar" value="Agregar"></td>

        </tr>
        <tr>
        <td> <?php 
                    while($row5 = mysql_fetch_array($resul3) )    {  
                          
                            echo "<h3> ".$row5[1]."</h3><br>";
                    }
                ?>  </td>	
 		<td>   </td><br/><br/></td>	
        </tr>

        <tr>
        	<td><input type="submit" value="Crear" ></td>
            <td></td>
            <td><a href="">Cancelar</a></td>
        </tr>
    </tbody>
</table>

 </form>
</div>
</body>