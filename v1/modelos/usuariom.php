<?php
class UsuarioM
{ 
    public static function post($peticion) {
        if ($peticion[0] == 'registro') {
            return self::registrar();
        } else if ($peticion[0] == 'login') {
            return self::loguear();
        } else {
            throw new ExcepcionApi(self::ESTADO_URL_INCORRECTA, "Url mal formada", 400);
        }
    }    
   
    private function registrar() {
        $cuerpo = file_get_contents('php://input');
        $usuario = json_decode($cuerpo);
        $resultado = self::crear($usuario);

        switch ($resultado) {
            case self::ESTADO_CREACION_EXITOSA:
                http_response_code(200);
                return
                    [
                        "estado" => self::ESTADO_CREACION_EXITOSA,
                        "mensaje" => utf8_encode("¡Registro con éxito!")
                    ];
                break;
            case self::ESTADO_CREACION_FALLIDA:
                throw new ExcepcionApi(self::ESTADO_CREACION_FALLIDA, "Ha ocurrido un error");
                break;
            default:
                throw new ExcepcionApi(self::ESTADO_FALLA_DESCONOCIDA, "Falla desconocida", 400);
        }
    }

    private function buscarUsuario ($id){
        $pdo = ConexionBD::obtenerInstancia()->obtenerBD();
        //sentencia select,
        $query = "SELECT * FROM usuario WHERE usuario.idUsuario = ?";
        $sentencia = $pdo->prepare($comando);
        $sentencia->bindParam(1,$id,PDO::PARAM_INT);
        // Ejecutar sentencia preparada
        if ($sentencia->execute()) {
            http_response_code(200);
            return
                [
                    "estado" => self::ESTADO_EXITO,
                    "datos" => $sentencia->fetchAll(PDO::FETCH_ASSOC)
                ];
        } else
            throw new ExcepcionApi(self::ESTADO_ERROR, "Se ha producido un error");
    }
    

    private function crear($datosUsuario) {
        $nombre = $datosUsuario->nombre;

        $contrasena = $datosUsuario->contrasena;
        $contrasenaEncriptada = self::encriptarContrasena($contrasena);
        $correo = $datosUsuario->correo;
        $claveApi = self::generarClaveApi();

        try {

            $pdo = ConexionBD::obtenerInstancia()->obtenerBD();

            // Sentencia        
            $comando = "INSERT INTO " . self::NOMBRE_TABLA . " ( " .
                self::NOMBRE . "," .
                self::CONTRASENA . "," .
                self::CLAVE_API . "," .
                self::CORREO . ")" .
                " VALUES(?,?,?,?)";

            $sentencia = $pdo->prepare($comando);

            $sentencia->bindParam(1, $nombre);
            $sentencia->bindParam(2, $contrasenaEncriptada);
            $sentencia->bindParam(3, $claveApi);
            $sentencia->bindParam(4, $correo);

            $resultado = $sentencia->execute();

            if ($resultado) {
                return self::ESTADO_CREACION_EXITOSA;
            } else {
                return self::ESTADO_CREACION_FALLIDA;
            }
        } catch (PDOException $e) {
            throw new ExcepcionApi(self::ESTADO_ERROR_BD, $e->getMessage());
        }
    }

    private function encriptarContrasena($contrasenaPlana) {
        if ($contrasenaPlana)
            return password_hash($contrasenaPlana, PASSWORD_DEFAULT);
        else return null;
    }

    private function generarClaveApi() {
        return md5(microtime().rand());
    }


    function agregarUsuario($array){  
            $pdo = ConexionBD::obtenerInstancia()->obtenerBD();
        
            // $nombre = $_POST['nombre'];
            // $contrasena = $_POST['contrasena'];
            // $correo = $_POST['correo'];
            // $sexo = $_POST['sexo'];
            // $fechaNacimiento = $_POST['fechaNacimiento'];

            $query = "INSERT INTO `usuario` (`nombre`, `contrasena`, `correo`, `sexo`, `fechaNacimiento`) VALUES ('$array->nombre', '$array->contrasena', '$array->correo', '$array->sexo', '$array->fechaNacimiento');";
            $sentencia = $pdo->prepare($query);
            // Ejecutar sentencia preparada
            if ($sentencia->execute()) {
                http_response_code(200);
                return
                    [
                        "datos" =>"Se ha registrado el usuario"
                    ];
            } else
                throw new ExcepcionApi(self::ESTADO_ERROR, "Se ha producido un error");
    }

    function obtenerUsuario(){
        $pdo = ConexionBD::obtenerInstancia()->obtenerBD();

        $this->$query = "SELECT * FROM usuario";
        $this->get_results_from_query();
        if(count($this->rows)>0){
           
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