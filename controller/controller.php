<?php
	session_start();
	
	if(isset($_POST['usuario']) && isset($_POST['password'])){
		if($_POST['usuario'] != "" && $_POST['password']!= ""){
			$usuario = $_POST['usuario'];
			$password = $_POST['password'];
			require_once('conectar.php');
			$coneccion = get_conection($usuario,$password);
			if($coneccion!==false){
				header("Location: ../welcome.php");
				$_SESSION['usuario'] = $usuario;
				$_SESSION['pass']	 = $password;
				$_SESSION['session_begin']=  date("d/m/Y H:i");
			    header("Location: ../welcome.php");
				die();
			}else{
				header("Location: ../index.php?error="."No se puede Conectar");
				session_destroy();
				die();

				 
			}
		}
			
	}elseif(isset($_POST['formulario']) && $_POST['formulario'] == 'nuevo'){
			$usuario  	= $_SESSION['usuario'];
			$password 	= $_SESSION['pass'];
			$apellido	= $_POST['apellido'];
			$nombre		= $_POST['nombre'];
			$edad		= $_POST['edad'];

			require_once('conectar.php');
			$coneccion = get_conection($usuario,$password);
			require_once('../negocio/cliente.php');
			$estado = alta_cliente($apellido,$nombre,$edad,$usuario,$password);
			if($estado == 1){
				$_SESSION['archivo'] = "nuevo.php";
				header( "Location: ../welcome.php?conf=ok");
				die(); 				
			}else{
				$_SESSION['archivo'] = "nuevo.php";
				header( "Location: ../welcome.php?err=no se pudo guardar");
				die();
			}

	}elseif(isset($_POST['formulario']) && $_POST['formulario'] == 'modifica'){
            
        }

	if(isset($_GET['op'])){
		if($_GET['op'] == 'salir'){
			header( "Location: ../index.php");
			session_destroy();
			die(); 
		}elseif($_GET['op'] == 'listar'){

			$usuario = $_SESSION['usuario'];
			$password= $_SESSION['pass'];
			require_once('conectar.php');
			$coneccion = get_conection($usuario,$password);
			require_once '../negocio/cliente.php';
                        $results = listar_clientes($usuario, $password);
			$_SESSION['archivo'] = "listado.php";
			$_SESSION['listado'] = $results;
			header( "Location: ../welcome.php");
			die();
		}elseif($_GET['op'] == 'nuevo'){
			$_SESSION['archivo'] = "nuevo.php";
			header( "Location: ../welcome.php");
			die(); 

		}elseif($_GET['op'] == 'edit' ){
                    $id = $_GET['row'];
                    $usuario = $_SESSION['usuario'];
                    $password= $_SESSION['pass'];
                    require_once('conectar.php');
                    $coneccion = get_conection($usuario,$password);
                    require_once '../negocio/cliente.php';
                    $cliente = obtener_cliente($id, $usuario, $password);
                    $_SESSION['archivo'] = "edita_cliente.php";
                    $_SESSION['cliente'] = $cliente;
                    header("Location: ../welcome.php");
                    
                }elseif($_GET['op'] == 'remove' ){
                    $id = $_GET['row'];
                    $usuario = $_SESSION['usuario'];
                    $password= $_SESSION['pass'];
                    require_once('conectar.php');
                    $coneccion = get_conection($usuario,$password);
                    require_once '../negocio/cliente.php';
                    $cliente = borrar_cliente($id, $usuario, $password);
                    $results = listar_clientes($usuario, $password);
                    $_SESSION['archivo'] = "listado.php";
                    $_SESSION['listado'] = $results;
                    header("Location: ../welcome.php?del=ok");
                }

		
	}