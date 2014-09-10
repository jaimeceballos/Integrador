<?php session_start();
	if(isset($_SESSION['archivo']) && $_SESSION['archivo']!="" ){
		$archivo =$_SESSION['archivo'];
	}
	if(isset($_SESSION['usuario']) && $_SESSION['usuario'] !=""){
		$usuario = $_SESSION['usuario'];
	}
	if(isset($_SESSION['session_begin']) && $_SESSION['session_begin'] !=""){
		$session_begin = $_SESSION['session_begin'];
	}
        if(isset($_GET['err'])){
            $error = $_GET['err'];
        }
        if(isset($_GET['conf'])){
            $conf = $_GET['conf'];
        }

 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>sin título</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link href="css/bootstrap.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<style type="text/css">
	.cuerpo{
		padding-top:60px;
	}
        .body{
            margin-left: 20px;
            margin-right: 20px;
        }

	</style>
</head>

<body class="body">
	<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">Clientes_bd</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="controller/controller.php?op=listar">Listar</a>
								</li>
								<li>
									<a href="controller/controller.php?op=nuevo">Nuevo</a>
								</li>
								<li>
									<a href="#">Buscar</a>
								</li>
							</ul>
						</li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i><?php echo $_SESSION['usuario'] ?><strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="controller/controller.php?op=salir">Salir</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				
			</nav>
		</div>
	</div>

</div>
<div class="cuerpo">
        
        
	<?php if(isset($archivo)): ?>
	
	 	<?php include $archivo; ?>

	<?php else: ?>		
	 	   <h3> Bienvenido <?php echo $usuario ?> <small>iniciaste session el: <?php echo $session_begin ?></small></h3>
	<?php endif; ?>
</div>
</body>

</html>