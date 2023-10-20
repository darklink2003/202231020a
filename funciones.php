<?php
/**
 * Esta función se encarga de consultar y mostrar las personas de una base de datos.
 *
 * @param int  $u  Un identificador de persona.
 * @param string  $c  Una clave de persona.
 * @param bool  $p  Un parámetro para realizar el conteo.
 * @param int  $l  Un parámetro para establecer el limite de busqueda.
 * @param string  $z  Un parámetro para establecer la primera fila.
 * @param string  $x  Un parámetro para establecer la segunda fila .
 * @return string  Los datos de las personas de la base de datos, separados por pipe (|).
 *
 */

 function consultar($u = null, $c = null, $p = null, $l=null, $z = null, $x=null) 
 {
     // Declaramos una variable para almacenar la salida de la función.
     $salida = "";
     // Realizamos la conexión a la base de datos.
     $conexion = mysqli_connect('localhost', 'root', '', 'aa');
 
     // Creamos la consulta SQL para seleccionar todos los registros de la tabla `productos`.
     $sql = "SELECT $z,$x FROM productos limit $l;";
 
     // Si se ha proporcionado un identificador de persona, lo agregamos a la consulta SQL.
     if ($u != null) {
         $sql .= " WHERE id = $u";
     }
 
     // Si se ha proporcionado una clave de persona, la escapamos antes de agregarla a la consulta SQL.
     if ($c != null) {
         $clave = mysqli_real_escape_string($conexion, $c);
         $sql .= " AND clave = '$clave'";
     }
 
     // Si se ha proporcionado un parámetro para realizar el conteo, se reemplaza la consulta SQL básica con una consulta que cuenta el número de filas en la tabla `personas`.
     if ($p != null) {
         $sql = "SELECT COUNT(*) AS contar FROM productos";
     }
 
     // Ejecutamos la consulta SQL y almacenamos el resultado en una variable.
     $resultado = mysqli_query($conexion, $sql);
 
     // Si la consulta devuelve algún resultado, lo recorremos y almacenamos los datos de cada persona en la variable `salida`.
     if (mysqli_num_rows($resultado) > 0) {
         if ($sql != "SELECT COUNT(*) AS contar FROM productos") {
             while ($fila = mysqli_fetch_assoc($resultado)) {
                 //muestra la columna deseada
                 $salida .= $fila[$z]." ";
                 $salida .= $fila[$x]."<br>";

             }
         } else {
             while ($fila = mysqli_fetch_assoc($resultado)) {
                 //muestra un conteo
                 $salida .= $fila['contar']."<br> ";
             }
         }
     } else {
         $salida .= "error"; // un mensaje de error
     }
 
     // Cerramos la conexión a la base de datos.
     mysqli_close($conexion);
 
     // Devolvemos la variable `salida`.
     return $salida;
 }
 
 
 ?>