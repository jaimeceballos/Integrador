<?php
	//session_start();
	function get_conection($usuario,$password){
		error_reporting(E_ALL);//notifica de todos los errores
		ini_set("display_errors", true);//establece que los errores se deben mostrar
		header('Content-Type: text/html; charset=UTF-8');
		  
		try {
			$pdo = new PDO(
		      'mysql:host=localhost;dbname=cliente_db',
		      $usuario, $password);
		   
		    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);//habilita la preparacion de prepared statements
		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $pdo->exec("SET NAMES UTF8");//establece el charset
		    return $pdo; 
		}
		catch (PDOException $e) {
			$error = $e->getMessage();
			return false;
		}
		
	}