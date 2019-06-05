<?php
    require_once('core/db_abstract_model.php');
    class SolicitudM extends DBAbstractModel{

        public $dependencia;
        public $dependenciaExterna;
        public $area_dependencia;
        public $municipio_dependencia;
        public $tipo_solicitud;
        public $descripcion;
        public $importancia;
        public $status_seguimiento;
        public $status_turnado;
        public $status_reciente;
        public $fecha_solicitud;
        public $fecha_registro;
        public $folio_usuario;
        public $subtipo;
        public $propuesta;
        public $hora;



        public function __construct(){

        }

        /*
        Método para devuelve solicitudes de denuncias
        */
        public function obtenerUsuarios(){
            $this->query="SELECT * FROM usuario";
            $this->get_results_from_query();
            if(count($this->rows) > 0){
               
                return [
                    "datos"=>$this->rows

                ];
            }
        }


 


        public function hola(){
            $this->query="SELECT * FROM tb_solicitud INNER JOIN tb_tipo_solicitud on tb_tipo_solicitud.id_tipo_solicitud = tb_solicitud.id_tipo_solicitud where tb_solicitud.id_tipo_solicitud=2";
            $this->get_results_from_query();
            if(count($this->rows) > 0){
                return [
                    "datos"=>$this->rows
                ];
            }
        }
     
           /*
        Método para devuelve solicitudes de sugerencias
        */
        public function getAllSugerencias(){
            $this->query="SELECT * FROM tb_solicitud WHERE id_tipo_solicitud=2";
            $this->get_results_from_query();
            if(count($this->rows) > 0){
                return [
                    "datos"=>$this->rows
                ];

            }
        }

        /*
              /*
        Método para devuelve solicitudes de necesidades
        */
        public function getAllNecesidades(){
            $this->query="SELECT * FROM tb_solicitud INNER JOIN tb_tipo_solicitud on tb_tipo_solicitud.id_tipo_solicitud = tb_solicitud.id_tipo_solicitud where tb_solicitud.id_tipo_solicitud=3";
            $this->get_results_from_query();
            if(count($this->rows) > 0){
                return [
                    "datos"=>$this->rows
                ];
            }
        }

        /*
           Devuelve la solicitud que coincida con la id 
         */
        public function getSolicitudById($id){
            if ($id != '') {
                $this->query = "SELECT *
                FROM tb_solicitud
                WHERE id_solicitud = '$id'
                ";
                $this->get_results_from_query();
            }
            if (count($this->rows) == 1) {
                return [
                    "datos"=>$this->rows[0]
                ];
            }else{
                return [
                    "error"=>"No se ha encontrado un usuario"
                ];
            }
        }

        /**
         * Registro de solicitud
         */
        public function registrarSolicitud($array){
            if(!empty($array)){
                $consulta = "INSERT INTO `tb_solicitud`
                            (`id_dependencia`, `dependenciaExterna`, `area_dependencia`, `municipio_dependencia`, `id_tipo_solicitud`, `descripcion`, `id_importancia`, `status_seguimiento`, `status_turnado`, `status_reciente`, `fecha_solicitud`, `fecha_registro`, `id_usuario`, `id_subtipo`, `propuesta`, `hora`) 
                            VALUES ($array->dependencia,
                                    $array->dependenciaExterna,
                                    '$array->area_dependencia',
                                    '$array->municipio_dependencia',
                                    $array->tipo_solicitud,
                                    '$array->descripcion',
                                    $array->importancia,
                                    $array->status_seguimiento,
                                    $array->status_turnado,
                                    $array->status_reciente,
                                    '$array->fecha_solicitud',
                                    '$array->fecha_registro',
                                    $array->folio_usuario,
                                    $array->subtipo,
                                    '$array->propuesta',
                                    '$array->hora');";
                //echo $consulta;
                $this->query = $consulta;
                return $this->execute_single_query();
            }
        }

        /**
         * Devuelve las solicitudes que coincidan con el tipo de solicitud enviada
         */
        public function getByTipo($tipo){
            $this->query="SELECT * FROM tb_solicitud WHERE tb_solicitud.id_tipo_solicitud = $tipo";
            $this->get_results_from_query();
            if(count($this->rows) > 0){
                return [
                    "datos"=>$this->rows
                ];
            }else{
                return [
                    "datos"=>"No hay datos"
                ];
            }
        }
        /**
         * 
         * Devuelve las solicitud que coincidan con el id del usuario
         */

         public function getByUser($id){
            $this->query="SELECT * FROM tb_solicitud WHERE tb_solicitud.id_usuario = $id";
            $this->get_results_from_query();
            if(count($this->rows) > 0){
                return [
                    "datos"=>$this->rows
                ];
            }else{
                return [
                    "datos"=>"No hay datos"
                ];
            }
         }

         public function getQuejasUser($array){
            $this->query="SELECT * 
                          FROM v_quejas
                          WHERE v_quejas.id_usuario = $array->idUsuario AND
                                v_quejas.id_tipo_solicitud = $array->idSolicitud";
            $this->get_results_from_query();
            if(count($this->rows) > 0){
                return [
                    "datos"=>$this->rows
                ];
            }else{
                return [
                    "datos"=>"No hay datos"
                ];
            }
         }


         
         public function totalDenuncias(){
            $this->query="SELECT count(*) as numeroDenuncias, tb_solicitud.id_dependencia 
            FROM tb_solicitud WHERE tb_solicitud.id_tipo_solicitud=1 
            group By  tb_solicitud.id_dependencia";
            $this->get_results_from_query();
            if(count($this->rows) > 0){
                return [
                    "datos"=>$this->rows
                ];
            }else{
                return [
                    "datos"=>"No hay datos"
                ];
            }
         }
    
         public function totalSugerencias(){
            $this->query="SELECT  count(*) as numeroSugerencias, tb_solicitud.id_dependencia 
            FROM tb_solicitud WHERE tb_solicitud.id_tipo_solicitud=2
            group By  tb_solicitud.id_dependencia";
            $this->get_results_from_query();
            if(count($this->rows) > 0){
                return [
                    "datos"=>$this->rows
                ];
            }else{
                return [
                    "datos"=>"No hay datos"
                ];
            }
         }
   
         public function totalNecesidades(){
            $this->query="SELECT  count(*) as numeroNecesidades, tb_solicitud.id_dependencia 
            FROM tb_solicitud WHERE tb_solicitud.id_tipo_solicitud=3
            group By  tb_solicitud.id_dependencia";
            $this->get_results_from_query();
            if(count($this->rows) > 0){
                return [
                    "datos"=>$this->rows
                ];
            }else{
                return [
                    "datos"=>"No hay datos"
                ];
            }
         }
    }

?>