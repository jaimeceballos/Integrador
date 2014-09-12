<?php
	session_start();
	require_once('conectar.php');
        require_once('../negocio/cliente.php');
        
	if(isset($_POST['usuario']) && isset($_POST['password'])){
		if($_POST['usuario'] != "" && $_POST['password']!= ""){
			$usuario = $_POST['usuario'];
			$password = $_POST['password'];
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
			
	}elseif(!empty($_POST['formulario']) && $_POST['formulario'] == 'nuevo'){
			$usuario  	= $_SESSION['usuario'];
			$password 	= $_SESSION['pass'];
			$apellido	= $_POST['apellido'];
			$nombre		= $_POST['nombre'];
			$edad		= $_POST['edad'];

			//$coneccion = get_conection($usuario,$password);
			
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

	}elseif(!empty($_POST['formulario']) && $_POST['formulario'] == 'modifica'){
                        $usuario  	= $_SESSION['usuario'];
			$password 	= $_SESSION['pass'];
			$apellido	= $_POST['apellido'];
			$nombre		= $_POST['nombre'];
			$edad		= $_POST['edad'];
                        $id             = $_POST['id'];
                        
                        $estado = update_cliente($id,$apellido,$nombre,$edad,$usuario,$password);
                        
                        if($estado == 1){
				$cliente = obtener_cliente($id, $usuario, $password);
                                $_SESSION['archivo'] = "edita_cliente.php";
                                $_SESSION['cliente'] = $cliente;
				header( "Location: ../welcome.php?conf=ok");
				die(); 				
			}else{
				$cliente = obtener_cliente($id, $usuario, $password);
                                $_SESSION['archivo'] = "edita_cliente.php";
                                $_SESSION['cliente'] = $cliente;
				header( "Location: ../welcome.php?err=no se pudo guardar");
				die();
			}
                        
        }

	if(!empty($_GET['op'])){
		if($_GET['op'] == 'salir'){
			header( "Location: ../index.php");
			session_destroy();
			die(); 
		}elseif($_GET['op'] == 'listar'){

			$usuario = $_SESSION['usuario'];
			$password= $_SESSION['pass'];
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
                    $cliente = obtener_cliente($id, $usuario, $password);
                    $_SESSION['archivo'] = "edita_cliente.php";
                    $_SESSION['cliente'] = $cliente;
                    header("Location: ../welcome.php");
                    
                }elseif($_GET['op'] == 'remove' ){
                    $id = $_GET['row'];
                    $usuario = $_SESSION['usuario'];
                    $password= $_SESSION['pass'];
                    $cliente = borrar_cliente($id, $usuario, $password);
                    $results = listar_clientes($usuario, $password);
                    $_SESSION['archivo'] = "listado.php";
                    $_SESSION['listado'] = $results;
                    header("Location: ../welcome.php?del=ok");
                    die();
                }elseif($_GET['op'] == 'buscar_form'){
                    $_SESSION['archivo'] = "buscar.php";
                    header("Location: ../welcome.php");
                    die();
                }

		
	}
        if(!empty($_GET['formulario']) && $_GET['formulario']=='buscar'){
            $usuario = $_SESSION['usuario'];
            $password= $_SESSION['pass'];
            if(empty($_GET['nombre'])){
                $nombre = '%';
            }else{
                $nombre = '%'.$_GET['nombre'].'%';
            }
            if(empty($_GET['apellido'])){
                $apellido = '%';
            }else{
                $apellido = '%'.$_GET['apellido'].'%';
            }
            if(empty($_GET['edad'])){
                $edad = '%';
            }else{
                $edad = $_GET['edad'];
            }
            
            
            $results = buscar($apellido,$nombre,$edad,$usuario,$password);
            $_SESSION['archivo'] = "buscar.php";
            $_SESSION['listado'] = $results;
            header("Location: ../welcome.php?del=ok");
            die();
        }