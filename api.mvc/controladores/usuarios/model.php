<?php
# Importar modelo de abstracción de base de datos
//echo getcwd();
require_once('core/db_abstract_model.php');

class Usuariod extends DBAbstractModel {
############################### PROPIEDADES ################################
    public $nombre;
    public $apellido;
    public $email;
    private $clave;
    protected $id;

    ################################# MÉTODOS ################################## # Traer datos de un usuario
    public function get($user_email = '') {
        if ($user_email != '') {
            $email = $user_email[0];
            $this->query = "SELECT id, nombre, apellido, email, clave
            FROM usuarios
            WHERE email = '$email'
            ";

            $this->get_results_from_query();
        }

        if (count($this->rows) == 1) {
            return [
                "nombre" => $this->rows[0]['nombre'],
                "apellido" => $this->rows[0]['apellido'],
                "email" => $this->rows[0]['email']
            ];
            
            //$this->rows[0]['nombre'];
        }
        /*if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'Usuario encontrado';
        } else {
            $this->mensaje = 'Usuario no encontrado';
        }*/
        
/*
        http_response_code(200);
        return
            [
                "estado" => self::ESTADO_CREACION_EXITOSA,
                "mensaje" => utf8_encode("�Registro con �xito!")
            ];

*/
    }

    public function post($v = null){
        $body = file_get_contents('php://input');
        
        return $body;
    }
    # Crear un nuevo usuario
    public function set($user_data = array())
    {
        if (array_key_exists('email', $user_data)) {
            $this->get($user_data['email']);

            if ($user_data['email'] != $this->email) {
                foreach ($user_data as $campo => $valor) {
                    $$campo = $valor;
                }

                /*
                $nombre = $user_data['nombre'];
                $email = $user_data['email'];
                $apellido = $user_data['apellido'];
                $clave = $user_data['clave'];
                */

                $this->query = "
                    INSERT INTO usuarios
                    (nombre, apellido, email, clave)
                    VALUES
                    ('$nombre', '$apellido', '$email', '$clave')
            ";
                $this->execute_single_query();
                $this->mensaje = 'Usuario agregado exitosamente';
            } else {
                $this->mensaje = 'El usuario ya existe';
            }
        } else {
            $this->mensaje = 'No se ha agregado al usuario';
        }
    }

    # Modificar un usuario
    public function edit($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }

        $this->query = "UPDATE usuarios
            SET nombre='$nombre',
                apellido='$apellido'
            WHERE email = '$email'
            ";
        $this->execute_single_query();
        $this->mensaje = 'Usuario modificado';
    }

    # Eliminar un usuario
    public function delete($user_email = ''){
        $this->query = "
                DELETE FROM     usuarios
                WHERE           email = '$user_email'
        ";
        $this->execute_single_query();
        $this->mensaje = 'Usuario eliminado';
    }

    # Método constructor
    function __construct()
    {
        $this->db_name = 'tienda';
    }

    # Método destructor del objeto
    function __destruct()
    {
        //unset($this);
    }
}
?>