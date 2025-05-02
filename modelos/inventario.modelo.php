<?php

require "conexion.php";

class ModeloRegistro {

    /*=============================================
    Registrar usuario
    =============================================*/
    static public function mdlRegistro($tabla, $datos){

        $sql = "INSERT INTO {$tabla} (inve_nombre_producto, inve_cantidad_producto, inve_precio_producto, inve_fecha_producto) VALUES (:nombre, :cantidad, :precio)";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":nombre",   $datos["inve_nombre_producto"],   PDO::PARAM_STR);
        $stmt->bindParam(":cantidad", $datos["inve_cantidad_producto"], PDO::PARAM_STR);
        $stmt->bindParam(":precio",   $datos["inve_precio_producto"],   PDO::PARAM_STR);


        $ok = $stmt->execute();
        $stmt->closeCursor();
        return $ok ? "ok" : "error";
    }

}
