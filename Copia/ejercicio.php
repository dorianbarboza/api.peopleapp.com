<?php
 include './httpful.phar';
 $uri = "http://localhost/api.peopleapp.com/v1/usuarios/buscartodos";
 $response = \Httpful\Request::get($uri)->send();
 echo $response;


// $datos_post = http_build_query(
//     array()
//         'var1' => 'contenido',
//         'var2' => 'doh'
//     )
// );

// $uri = "http://localhost/api.peoplepp.com/v1/usuarios/buscartodos" ;
// $response = \ Httpful \ Request :: get ($uri) -> send ();
// echo $response;

// $opciones = array('http' =>
//     array(
//         'method'  => 'POST',
//         'header'  => 'Content-type: application/x-www-form-urlencoded',
//         'content' => $datos_post
//     )
// );

// $contexto = stream_context_create($opciones);

// $resultado = file_get_contents('http://example.com/submit.php', false, $contexto);

?>