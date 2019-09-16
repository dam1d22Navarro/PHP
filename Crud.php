<?php

 function mostrar(){
	 $f1=fopen("alumno.dat","r");
	 
	 $linea=fgets($f1);
	 $fila=0;
	 
	 while(!feof($f1)){
		 $campos=explode("|",$linea);
		 $resultados[$fila][0]=$campos[0];
		 $resultados[$fila][1]=$campos[1];
		$fila++;
		$linea=fgets($f1);
	 }
	 return $resultados;
	 fclose($f1);
	 
	 
	 
	 
	 
	 
	 
 }
 
 function guardar($nombre,$nota){
	 if(!empty($_GET['nombre']) and !empty($_GET['nota'])){
		 $resultados['vacio']="";
		 $f1=fopen("alumno.dat","a+");
		 $linea=fgets($f1);
		 $encontrado=false;
		 while(!feof($f1) and !$encontrado){
			 $campos=explode("|",$linea);
			 if($nombre==$campos[0]){
				$encontrado=true;
			 }
			 $linea=fgets($f1);
		 }
		 
		 if(!$encontrado){
			fputs($f1,$nombre."|".$nota."\n");
			$resultados['bien']="Alumno añadido.";
		 }else{
			 $resultados['error']="El alumno ya existe.";
		 }
		 return $resultados;
		 fclose($f1);
	 }
	 
	 
 }
 
 function buscar($nombre){
	 if(!empty($_GET['nombre'])){
		 $f1=fopen("alumno.dat","r");
		 $linea=fgets($f1);
		 $encontrado=false;
		 while(!feof($f1)and !$encontrado){
			 $campos=explode("|",$linea);
			 if($nombre==$campos[0]){
				 $encontrado=true;
				 $resultados['busqueda']=$campos[1];
			 }
			 $linea=fgets($f1);
		 }
		 
		
		 return $resultados;
		 fclose($f1);
	 }
 }	 
	function borrar($nombre){
		if(!empty($_GET['nombre'])){
			$f1=fopen("alumno.dat","r");
			$f2=fopen("alumno_copia.dat","w");
			$linea=fgets($f1);
			$encontrado=false;
			while(!feof($f1)and !$encontrado){
				$campos=explode("|",$linea);
				 if($nombre!=$campos[0]){
					fputs($f2,$linea);
				}else{
					$encontrado=true;
					$resultados['bien']="Alumno borrado.";
				}
				
				$linea=fgets($f1);
			}
			
			while(!feof($f1)){
					fputs($f2,$linea);
					$linea=fgets($f1);
			}
			if(!$encontrado){
				$resultados['error']="El alumno no existe.";
			}
			
			fclose($f1);
			fclose($f2);
			unlink("alumno.dat");
			rename("alumno_copia.dat", "alumno.dat");
			return $resultados;
		}
		
		
	}
	
	function modificar($nombre,$nota){
		if(!empty($_GET['nombre']) and !empty($_GET['nota'])){
			$f1=fopen("alumno.dat","r");
			$f2=fopen("alumno_copia.dat","w");
			$linea=fgets($f1);
			$encontrado=false;
			while(!feof($f1) and !$encontrado){
				$campos=explode("|",$linea);
				 if($nombre!=$campos[0]){
					fputs($f2,$linea);
				}else{
					$encontrado=true;
					fputs($f2,$nombre."|".$nota."\n");
					$resultados['bien']="Alumno modificado.";
				}
				
				$linea=fgets($f1);
			}
			
			while(!feof($f1)){
					fputs($f2,$linea);
					$linea=fgets($f1);
			}
			if(!$encontrado){
				$resultados['error']="El alumno no existe.";
			}
			
			fclose($f1);
			fclose($f2);
			unlink("alumno.dat");
			rename("alumno_copia.dat", "alumno.dat");
			return $resultados;
		}
		
		
	}
	 













?>