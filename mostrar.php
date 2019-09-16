<html>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		.top-buffer { margin-top:25px; }
	</style>
	
	<body>
		<div class="container">
		<?php include 'Crud.php';
			if(!empty($_GET['nombre'])){
				$nombre=$_GET['nombre'];
			}else{
				$nombre="";
			}
			
			if(!empty($_GET['nota'])){
				$nota=$_GET['nota'];
			}else{
				$nota="";
			}
			
			if(isset($_GET['limpiar'])){
				$nota="";
				$nombre="";
			}
			
			if(isset($_GET['buscar'])){
				if(isset($_GET['nombre'])){
					$resultados=buscar($nombre);
					if(isset($resultados['busqueda'])){
						$nota=$resultados['busqueda'];
					}else{
						$nota="";
					}
				}
			}
		?>
			
			
				<h1>Formulario</h1>
			
				<form name ='Alumno' action='mostrar.php' method='GET'>
					<div class="form-group top-buffer">
					
						<label for="name">Nombre</label>
						<input  class="form-control" type="text" name='nombre' value='<?php echo "$nombre" ?>'/> 
					</div>
						<div class="form-group top-buffer">
							
							<label for="nota">Nota</label>
							<input  class="form-control" type="text" name='nota' value='<?php echo "$nota"  ?>'/>
						</div>
						<div class="form-group top-buffer">
							<input class="btn btn-default" type='submit' value='Guardar' name="guardar"/>
							<input class="btn btn-default" type='submit' value='Mostrar' name="mostrar"/>
							<input class="btn btn-default" type='submit' value='Buscar' name="buscar"/>
							<input class="btn btn-default" type='submit' value='Borrar' name="borrar"/>
							<input class="btn btn-default" type='submit' value='Modificar' name="modificar"/>
							<input class="btn btn-default" type='submit' value='Limpiar' name="limpiar"/><br/><br/>
						</div>
				</form>
		<?php
			if(isset($_GET['mostrar'])){
				$tabla=mostrar();
				echo"<table border=2><tr><td>Nombre</td><td>Nota</td></tr>";
				foreach($tabla as $valor){
					echo"<tr><td>".$valor[0]."</td><td>".$valor[1]."</td></tr>";
				}
				echo"</table>";
			}elseif(isset($_GET['guardar'])){
				$resultados=guardar($nombre,$nota);
				
			}elseif(isset($_GET['borrar'])){
				$resultados=borrar($nombre);
			
			}elseif(isset($_GET['modificar'])){
				$resultados=modificar($nombre,$nota);
			}	
		if(isset($resultados['error'])){
					echo $resultados['error'];
		}elseif(isset($resultados['bien'])){
					echo $resultados['bien'];
		}
		
			
		?>
		
		</div>
	</body>
</html>