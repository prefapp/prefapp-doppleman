<?php

class Dopple_mysqli extends mysqli{

     public function __construct($host, $usuario, $contraseña, $bd) {
     
        parent::init();
    
        if (!parent::real_connect($host, $usuario, $contraseña, $bd)) {
        
            die('Error de conexión (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        }
    }

}

function iniciar(){

    $html = crear_documento();

    $bd = new Dopple_mysqli(

        "db",

        $_ENV[MYSQL_USER],

        $_ENV[MYSQL_PASSWORD],

        $_ENV[MYSQL_DATABASE]

    );

    if($resultado = $bd->query("SELECT * FROM provinces")){

        while($province = $resultado->fetch_assoc()){

            if($ciudades = $bd->query("SELECT * FROM cities WHERE province_id = " . $province["id"])){

                $html .= construir_tabla_provincia($province["name"], $ciudades->fetch_all());

                $ciudades->close();
            }

        }

        $resultado->close();
    }

    $bd->close();

    $html .= cerrar_documento();

    echo $html;

}

function crear_documento(){

return <<<HTML

<html>
    <head>
        
        <style>

            table, thead, th, td, tr{
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <div>

HTML;

}

function cerrar_documento(){

return <<<HTML

    </body>
</html>
HTML;

}

function construir_tabla_provincia($province, $ciudades){


    $html .= "<h2>Cities of ". $province . "</h2>";

    $html .= "<table>";
    $html .= "<tbody><tr>";
    $html .= "<th>City's name</th>";
    $html .= "</tr>";

    foreach($ciudades as $ciudad){
        $html .= "<tr><td>" . $ciudad[1]  . "</td></tr>";
    }

    $html .= "</tbody></table>";

    return $html;

}

iniciar();

?>



