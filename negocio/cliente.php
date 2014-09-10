<?php
	function alta_cliente($apellido,$nombre,$edad,$usuario,$password){
		if($apellido!=""){
			if($nombre!=""){
				if($edad>0){
					require_once("../dao/clienteDAO.php");
					return cliente_save($apellido,$nombre,$edad,$usuario,$password);
				}else{
					return "no ingreso edad";
				}
			}else{
				return "no ingreso nombre";
			}
		}else{
			return "no ingreso apellido";
		}
	}
        function listar_clientes($usuario,$password){
            require_once '../dao/clienteDAO.php';
            return get_clientes($usuario,$password);
        }
        function obtener_cliente($id,$usuario,$password){
            require_once '../dao/clienteDAO.php';
            return get_cliente_by_id($id,$usuario,$password);
        }
        function borrar_cliente($id,$usuario,$password){
            require_once '../dao/clienteDAO.php';
            return del_cliente_by_id($id,$usuario,$password);
        }
        