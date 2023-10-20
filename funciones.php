


<?php



function consultar()
{
    $salida = "";//inicializa la variable

    $conexion = mysqli_connect('localhost', 'root', '', 'aa'); //establece la conexion

    $sql = "SELECT * FROM productos";//ejecuta el sql

    $resultado = mysqli_query($conexion, $sql);

    while ($fila = mysqli_fetch_assoc($resultado)) {//muestra la base de datos 
        $salida .= $fila['id']." |";//llama a la fila id
        $salida .= $fila['nombre']." |";//llama a la fila nombre
        $salida .= $fila['clave']." |";//llama a la fila clave
        $salida .= $fila['sitio']." |";//llama a la fila sitio
        $salida .= $fila['invitacion']." |";//llama a la fila invitacion
    }

    mysqli_close($conexion);//cierra la conexion 
    return $salida;//retorna la variable 
}

/** 
 * Esta funcion se encarga de mostrar los datos del usuario
 * @param  $numero es un numero para sumar 
 * 
 */

 


?>