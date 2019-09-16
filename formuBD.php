<?php
		session_start();
		
		
		 if( !isset( $_SESSION['log']) || !$_SESSION['log']) {
			
					 die();
					 
		 }
	 ?>


<!DOCTYPE html> 
<html lang="es"> 
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="estiloss.css" media="screen" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
	<style type="text/css">
		
 		
 		table {
 			text-align:center;
 			width:25%;
 			background: #D8D8D8;
 		}
 		
 		table th {
 			text-align:center;
 			background:#2EFE64;
 		}
 		tr:nth-child(even){
 			background-color: #01A9DB
 		}
 		tr:hover{
 			background-color: #F3F781;
 		}


	</style>

	
	</head>
	
	<body style="background-color:#81F7F3">
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
			

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="nav navbar-right">
						  <li ><a href="./Ejer9_aleatorios.php">Ejercicio1 &nbsp &nbsp </a></li>
						  <li ><a href="./Ejer4_tabla_multiplicar_clase.php">Ejercicio2 &nbsp &nbsp &nbsp </a></li>
						   <li ><a href="./Ejer9_aleatorios.php">Ejercicio3 &nbsp &nbsp </a></li>
						  <li ><a href="./Ejer4_tabla_multiplicar_clase.php">Ejercicio4 &nbsp &nbsp &nbsp </a></li>
						   <li ><a href="./Ejer9_aleatorios.php">Ejercicio5 &nbsp &nbsp </a></li>
						  <li ><a href="./Ejer4_tabla_multiplicar_clase.php">Ejercicio6 &nbsp &nbsp &nbsp </a></li>
						   <li ><a href="./Ejer9_aleatorios.php">Ejercicio7 &nbsp &nbsp </a></li>
						  <li ><a href="./Ejer4_tabla_multiplicar_clase.php">Ejercicio8 &nbsp &nbsp &nbsp </a></li>
						  <li ><a href="./Ejer4_tabla_multiplicar_clase.php">Ejercicio9 &nbsp &nbsp &nbsp </a></li>
						   <li ><a href="./Ejer9_aleatorios.php">Ejercicio10 &nbsp &nbsp </a></li>
						  <li ><a href="./Ejer4_tabla_multiplicar_clase.php">Ejercicio11 &nbsp &nbsp &nbsp </a></li>
						  <li ><a href="./Ejer4_tabla_multiplicar_clase.php">Ejercicio12 &nbsp &nbsp &nbsp </a></li>
						  
				
				
						<form class="form-right" action="" method="post" >
							<li><button class="btn navbar-btn btn-danger" type="submit" name="desconectar">Logout</button></li>
						</form>
				</ul>     
			</div>
				
	</nav>
	
	
	<?php
	include 'alumCrud_3.php';
			
			$nombre="";
			$nota="";
			$mensaje="";
			
			if (isset($_POST['nombre'])){
				$nombre=$_POST['nombre'];
				$nombre=$_POST['nota'];
			
			
			}
			
			
			if(isset($_POST['buscar'])){
				$nombre=$_POST['nombre']; /* $datos me devuelve nombre,nota,mensaje*/
				$datos=buscar($nombre);
				
				if(isset($datos['nombre'])){
					$id=$datos['id'];
					$nombre=$datos['nombre'];
					$nota=$datos['nota'];
					
					
				}
				$mensaje=$datos['mensaje'];
				var_dump($datos);/*como esta estructurado el array,  nos devuelve tipo ,valores*/
			}
			
			
			if(isset($_POST['limpiar'])){
				$id="";
				$nota="";	
				$nombre="";
			}	
			
	
	?>
	
	


	
	<div class="container">
		<div class="text-center">
			<h1>Alumno</h1>
			
			<form action="formuBD.php" method="post" class="center">
				
				
				
				<input type="hidden" name="oculto" value='<?php echo "$id" ; ?>'><br><br>
				<p>Nombre:</p>
				<input type="text" name="nombre"  value='<?php echo "$nombre" ; ?>'/><br><br>
			
				<p>Nota:</p>
				<input type="text" name="nota" value='<?php echo "$nota";  ?>'/><br><br>
				
				
				

				<p>	
					<input type="submit" name="mostrar" value="Mostrar">
					<input type="submit" name="insertar" value="Insertar">
					<input type="submit" name="buscar" value="Buscar">
					<input type="submit" name="modificar" value="Modificar">
					<input type="submit" name="borrar" value="Borrar">
					<input type="submit" name="limpiar" value="Limpiar">					
					
				
				</p>
				<br>

				<br>

	
			</form>
		</div>
	</div>
	<?php
		

				

				if( isset( $_SESSION["conexion"])) {
					echo $_SESSION["conexion"];

				}
				
				if (isset($_POST["desconectar"])){
						
						unset ($_SESSION["conexion"]);
						Header("Location: login.php");
					
				 }
				 
	?>				 
	
		
		
	<?php
		 
			if(isset($_POST['mostrar'])){
				
				$datos=mostrar();
					
				//echo "</br><table border=2>";
				echo "<table border=1 align='center'>";
						echo "<tr><th> NOMBRE </th><th> NOTA </th></tr>";
							foreach($datos['alumnos'] as $alumnos){
								echo "<tr>";
									echo "<td>".$alumnos['nombre']."</td>"; 
									echo "<td>".$alumnos['nota']."</td>";
								echo "</tr>";
								
							}
				
				echo "</table>";	
					
					
			}
			
			
			if(isset($_POST['insertar'])){
				
				
				$nombre=$_POST['nombre']; 
				$datos=insertar($nombre);
				
				if(isset($datos['nombre'])){   /*me devuelve nombre,nota,mensaje*/
					$nombre=$datos['nombre'];
					$nota=$datos['nota'];
					
					
				}
				$mensaje=$datos['mensaje'];
				
				
			}
			
			
			if(isset($_POST['modificar'])){
				//modificar();
				
				$id=$_POST['oculto']; 
				$datos=modificar($id);
				
				if(isset($datos['id'])){
					$id=$datos['id'];
					$nombre=$datos['nombre'];
					$nota=$datos['nota'];
					
					
				}
				
				$mensaje=$datos['mensaje'];
				
			}
			
			if(isset($_POST['borrar'])){
				//borrar();
				
				$nombre=$_POST['nombre']; 
				$datos=borrar($nombre);
				
				if(isset($datos['nombre'])){
					$nombre=$datos['nombre'];
					$nota=$datos['nota'];
					
					
				}
				$mensaje=$datos['mensaje'];
				
			}if (isset($_POST['limpiar'])){
				limpiar();
			}
			
			echo $mensaje;

	?>
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
