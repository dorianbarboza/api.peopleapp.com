<?php
    require 'modelos/solicitudm.php';
    class Solicitud {
        public function index(){
			echo 'index desde UsuarioController';
		}
        private $model; 
        public function get($parametros){
            //echo var_dump($parametros);
            $this->model = new SolicitudM();
            if(!empty($parametros[0])){
                switch($parametros[0]){
                    case 'get':
                        return $this->model->getSolicitudById($parametros[1]);
                    break;

                    case 'obtenerUsuarios':
                        return $this->model->obtenerUsuarios();
                    break;

                    case 'allDenuncias':
                        return $this->model->getAllDenuncias();
                    break;

                    case 'allNecesidades':
                        return $this->model->getAllNecesidades();
                    break;

                    case 'allSugerencias':
                        return $this->model->getAllSugerencias();
                    break;

                    case 'totalDenuncias':
                        return $this->model->totalDenuncias();
                    break;

                    case 'totalSugerencias':
                         return $this->model->totalSugerencias();
                    break;

                    case 'totalNecesidades':
                        return $this->model->totalNecesidades();
                    break;
                    
                    case 'tipo':
                        return $this->model->getByTipo($parametros[1]);
                    break;
                    case 'user':
                         return $this->model->getByUser($parametros[1]);
                    break;

                    default:
                        return [ "error"=>"No hay parámetros para buscar una solicitud"];  
                    break;
                }
                /*if($parametros[0] == "get" && !empty($parametros[1])){
                    return $this->model->getSolicitudById($parametros[1]);
                }else if($parametros[0] == "allDenuncias"){
                    return $this->model->getAllDenuncias();
                }else if($parametros[0] == "allNecesidades"){
                    return $this->model->getAllNecesidades();
                }else if($parametros[0] == "allSugerencias"){
                    return $this->model->hola();
                }else if($parametros[0] == "tipo" && !empty($parametros[1])){
                    return $this->model->getByTipo($parametros[1]);
                }else if($parametros[0] == "user" && !empty($parametros[1])){
                    return $this->model->getByUser($parametros[1]);
                }else{
                    return [ "error"=>"No hay parámetros para buscar una solicitud"];  
                }
            }else{
                return [ "error"=>"No se ha enviado el recurso"];
            }¨*/
        }
    }
        public function post($parametros){
            $this->model = new SolicitudM();
            $cuerpo = file_get_contents('php://input');
            $array = json_decode($cuerpo);
            if(!empty($parametros[0])){
                $opcion = $parametros[0];
                switch($opcion){
                    case 'registrar':
                        return $this->model->registrarSolicitud($array);
                    break;
                    case 'quejasUser':
                        return $this->model->getQuejasUser($array);
                    break;
                }
            }
        }
    }

?>