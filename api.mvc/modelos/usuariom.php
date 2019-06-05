<?php
    require_once('core/db_abstract_model.php');
    class UsuarioM extends DBAbstractModel{

        public function __construct(){

        }

        function agregarUsuario($array){  
            if(!empty($array)){
                $consulta = "INSERT INTO `usuario` (`nombre`, `contrasena`, `correo`, `sexo`, `fechaNacimiento`)
                 VALUES (
                     '$array->nombre',
                      '$array->contrasena', 
                      '$array->correo',
                      '$array->sexo', 
                      '$array->fechaNacimiento');"; 
            }

            $this->query = $consulta;
            // Ejecutar sentencia preparada
            $result = $this->execute_single_query();
                if ($result['mensaje'] == "Registrado"){
                    return [
                        "datos" =>"Se ha registrado el usuario"
                    ];
                
            }else{
                return [
                    "error"=>"Error en el JSON"
                ];
            }
    }


        public function addUser($array){
        
            
            if(!empty($array)){
                $consulta = "INSERT INTO `tb_usuario`(`usuario`,`nombre`, `primer_apellido`, `segundo_apellido`, `contrasena`, `correo`, `id_dependencia`, `dependencia_externa`, `municipio`, `categoria`, `nivel`,`key_user`) 
                            VALUES (
                            	'$array->usuario',
                                '$array->nombre',
                                '$array->primer_apellido',
                                '$array->segundo_apellido',
                                '$hash',
                                '$array->correo',
                                $array->id_dependencia,
                                '$array->dependencia_externa',
                                '$array->municipio',
                                '$array->categoria',
                                $array->nivel,
                                '$hash_key'
                            );";
                $this->query = $consulta;
                $result = $this->execute_single_query();
                if ($result['mensaje'] == "Registrado"){
                    return [
                        "Contrasena" => $contrasenaUsuario,
                        "key" => $key_user
                    ];
                }else{
                    return $result;
                }
            }else{
                return [
                    "error"=>"Error en el JSON"
                ];
            }
        }
        /**
         * Método que verifica el acceso del usuario con usuario y contraseña
         */
        public function verifyUser($array){
            $usuario = $this->getUserByName($array->usuario);
            if($usuario['datos'] != "No se encontró el usuario"){
                $contrasenaUsuario = $usuario["datos"]['contrasena'];
                $tipoUsuario = $usuario["datos"]['nivel'];
                $idUsuario = $usuario["datos"]['id_usuario'];
                $idDependencia = $usuario["datos"]["id_dependencia"];
                if(password_verify($array->contrasena,$contrasenaUsuario)){
                    return [
                        "login"=>"Correcto",
                        "key"=>$usuario["datos"]["key_user"],
                        "nivelUsuario"=>$tipoUsuario,
                        "idUsuario"=>$idUsuario,
                        "idDependencia"=>$idDependencia
                    ];
                }else{
                    return [
                        "login"=>"Usuario no encontrado y/o contraseña incorrecta"
                    ];
                }
            }else{
                return [
                    "login" => "Usuario no encontrado y/o contraseña incorrecta"//$usuario['datos']    
                ];
            }
            
        }
        /**
         * Método para buscar a un usuario con correo
         */
        public function getUserByEmail($correo){
            $this->query="SELECT * FROM tb_usuario where tb_usuario.correo = '$correo'";
            $this->get_results_from_query();
            if(count($this->rows) > 0){
                return [
                    "datos"=>$this->rows[0]
                ];
            }else{
                return [
                    "datos"=>"No se encontró el usuario"
                ];
            }
        }
        /**
         * Método para buscar a un usuario con su nombre
         */
        public function getUserByName($nombre){
            $this->query="SELECT * FROM tb_usuario where tb_usuario.usuario = '$nombre'";
            $this->get_results_from_query();
            if(count($this->rows) > 0){
                return [
                    "datos"=>$this->rows[0]
                ];
            }else{
                return [
                    "datos"=>"No se encontró el usuario"
                ];
            }
        }

        /**
         * Método para buscar a un usuario con su id
         */
        public function getUserById($id){
            $this->query="SELECT * FROM tb_usuario where tb_usuario.id_usuario = $id";
            $this->get_results_from_query();
            if(count($this->rows) > 0){
                return [
                    "datos"=>$this->rows[0]
                ];
            }else{
                return [
                    "datos"=>"No se encontró el usuario"
                ];
            }
        }
    }

?>
