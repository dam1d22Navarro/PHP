<!DOCTYPE html> 
<html lang="es"> 
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="estiloss.css" media="screen" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
	</head>
	
	<body style="background-color:#81F7F3">
	
					
		
		
		<div class="row">
		
<div class="col-lg-4"></div>
<div class="col-lg-4">
<form class="form-horizontal" action="" method="post">
<h3>Login Alumno</h3>
  <div class="form-group">
    <label class="col-lg-8 control-label">Nombre</label>
    <div class="col-lg-4">
      <input type="text" class="form-control" name="usuario" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-8 control-label">Contraseña</label>
    <div class="col-lg-4">
      <input type="password" class="form-control" name="pass" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-4">
      <button type="submit" class="btn btn-default" name="conexion">Enviar</button>
    </div>
  </div>
</div>
		
		<?php 
		session_start();
		if (isset ($_POST["conexion"])){

			if ($_POST["usuario"] == 'alu' && $_POST["pass"]=='123' ){
				$_SESSION['log'] = true;
			}else{
				$_SESSION['log'] = false;
			}
		
			if ($_SESSION['log']){
				header("Location: formuBD.php");
			}else{
				echo "Contraseña o User incorrectos";
			}
		}


	 ?>

	</body>
</html>
