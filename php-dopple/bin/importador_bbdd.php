<?php

class Dopple_mysqli extends mysqli{

     public function __construct($host, $usuario, $contraseña, $bd) {
     
        parent::init();
    
        if (!parent::real_connect($host, $usuario, $contraseña, $bd)) {
        
            die('Error de conexión (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        }
    }

}

function importar($script_sql){

    if(!file_exists($script_sql)){
        die("El fichero $script_sql no existe en el sistema de archivos");
    }

    $sentencias_sql = file_get_contents($script_sql);

    $bd = new Dopple_mysqli(

        "db",

        $_ENV[MYSQL_USER],

        $_ENV[MYSQL_PASSWORD],

        $_ENV[MYSQL_DATABASE]

    );

    if(!$bd->multi_query($sentencias_sql)){
        printf("Error en importacion %s", $bd->error);
    }

    $bd->close();
    
}


importar($argv[1]);

?>
