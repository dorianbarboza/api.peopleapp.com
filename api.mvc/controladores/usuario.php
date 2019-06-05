<?php
    require 'modelos/usuariom.php';
    class Usuario{
        private $userModel;

        public function __construct(){
            
        }

        public function index(){
			echo 'index desde UsuarioController';
		}

        public function get($parametros){
            
        }

        public function post($parametros){
            $this->userModel = new usuarioM();
            /*
                Se obtiene el JSON
            */
            $cuerpo = file_get_contents('php://input');
            //Se decodifica el JSON para volverlo como una arreglo
            $array = json_decode($cuerpo);
            //echo $array['user'];
            //Se busca el recurso pedido por el usuario
    
            switch($parametros[0]){

                case 'insertarUsuario':
                return $this->userModel->agregarUsuario($array);
                break;
                case 'login':
                    return $this->userModel->verifyUser($array);
                break;

                case 'add':
                    return $this->userModel->addUser($array);
                break;

                case 'all':
                    return ($this->userModel->allUser($array));
                break;

                case 'selectid':
                    return ($this->userModel->getUser($array));
                break;

                case 'sistema':
                require_once('site_media/json/index.php');
                break;

                default:
                echo 'hola';
                break;
         
            }
        }
    }
?>
