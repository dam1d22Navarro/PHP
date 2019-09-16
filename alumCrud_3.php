<?php 
	function conectar(){
		if(!$con=mysqli_connect("localhost", "root", "","dam2d")){
			
			die("Error conexion a BD");
		}
		return $con ;
		
	}
	
	
	function buscar($nombre){/*recibo el nombre com parámetro*/
	
		
			$conexion=conectar();
			$datos['mensaje']="";//Borro sino muestra los mensajes al presionar el botón
			$resultado=mysqli_query($conexion,"SELECT * FROM alumnos WHERE nombre='$nombre'");
			
			
			if($fila=mysqli_fetch_assoc($resultado)){/*muevo datos con assoc a una tabla*/
				
				$datos=$fila;
				
			}
			
			if(!mysqli_num_rows($resultado)){
			$datos['mensaje']= "El alumno no existe";
		
		    }else{
				$datos['mensaje']= "El alumno  existe";
			}
			
			mysqli_close($conexion);
		
		  return $datos;
	
	}

	function mostrar(){
		$conexion=conectar();
		$resultado=mysqli_query($conexion,"select * from alumnos");
		
			while($fila=mysqli_fetch_array($resultado)){
				$datos['alumnos'][]=$fila;
									
										
			}
								
		
		mysqli_close($conexion);
	
		return $datos;	
	
	}
	
	function insertar($nombre){/*recibo el nombre com parámetro*/
			$conexion=conectar();
			//$nombre = $_POST['nombre'];
			$nota = $_POST['nota'];
			$datos['mensaje']="";
			
			$resultado=mysqli_query($conexion,"SELECT * FROM alumnos WHERE nombre='$nombre'");
			
			
			if(!mysqli_num_rows($resultado)){//compruebo que no existe
				
				
					if (mysqli_query($conexion, "INSERT INTO alumnos (nombre, nota) VALUES ('$nombre', '$nota')")){
						
						$datos['mensaje']= "Han sido insertados".mysqli_affected_rows($conexion);
						
					}else{
						
						//$datos['mensaje']="";
					}
				
			}else{
				$datos['mensaje']= "No insertados ya existe";
				
			}
		

			mysqli_close($conexion);
			return $datos;
	}
	
	function modificar($id){//recibe el id como parametro
		    $conexion=conectar();
			//$id = $_POST['oculto'];// no hace falta
			$nombre = $_POST['nombre'];
			$nota = $_POST['nota'];
			$datos['mensaje']="";/*Sino mostraria los mensajes al darle al boton*/
		
			
			if (mysqli_connect_errno()){
					$datos['mensaje']= "Error al conectar a la base de datos " . mysqli_connect_error();
			
			}else{	
					$sql = "SELECT * FROM alumnos WHERE id='$id'";
					$resultado = mysqli_query($conexion, $sql);
					
					$fila = mysqli_fetch_array($resultado);
                    $id=$fila['id'];//La fila contiene el id del usuario buscado y me lo guardo en $id
					 
					$sql = "UPDATE alumnos SET nombre='$nombre', nota='$nota'  WHERE id='".$id."'";
					
					$resultado = mysqli_query($conexion, $sql);
					$datos['mensaje']= "Ha sido modificado".mysqli_affected_rows($conexion)." registro de nombre ".$nombre;
				
					
					
			}
			mysqli_close($conexion);
			
			return $datos;

	}
	
	function borrar($nombre){//recibe como parametro el nombre
			$conexion=conectar();
			
			//$nombre = $_POST['nombre'];
			$nota = $_POST['nota'];
			$datos['mensaje']="";
			//$cont=0;
			
			$conexion = mysqli_connect("localhost", "root", "","dam2d");
			if (mysqli_connect_errno()){
					$datos['mensaje']="Error al conectar a la base de datos " . mysqli_connect_error();
			}else{
							
				$sql = "SELECT * FROM alumnos WHERE nombre='$nombre'";
				$resultado = mysqli_query($conexion, $sql);
                
				$fila= mysqli_fetch_array($resultado);


				if($nombre=='' && $nota==''|| $nombre!=$fila['nombre']){/*Si los inputs están vacios o el usuario no existe*/
					
						$datos['mensaje']= "usuario no existe por lo que no puede ser borrado";
					
				}else{
					
				
				$sql = "DELETE FROM alumnos WHERE nombre = '$nombre'";
					
				$resultado = mysqli_query($conexion, $sql);

					if( mysqli_affected_rows($conexion)>0){
								//echo "Eliminado/s ".mysqli_affected_rows($con)." alumno(s)  correctamente";
								
								$datos['mensaje']= "Ha sido borrado".mysqli_affected_rows($conexion)." registro de nombre ".$nombre;
					}
                     
					/* 
					mysqli_query($con,"DELETE FROM alumnos WHERE nota<5");
					echo "Alumnos borrados " . mysqli_affected_rows($con);
					*/
				

				}
				   
			}
			mysqli_close($conexion);
	        return $datos;

	}
	
	function limpiar(){
			$id="";
			$nombre ="";
			$nota = "";
			

		

	}
	
?>