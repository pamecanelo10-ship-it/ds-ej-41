<?php
require_once __DIR__ . '/../core/Database.php';

class Auto {

    
    public $Id;
    public $Marca;
    public $Modelo;
    public $Rodado;
    public $CantidadCambios;
    public $Color;
    public $Precios;

    public function __construct() {
        // Constructor vacío para que FETCH_CLASS funcione correctamente
    }

    /**
     * Obtener todas las Autos desde la BD
     * Usando FETCH_CLASS para mapear automáticamente a objetos Auto (ORM)
     */
    public static function obtenerTodas() {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT Id, Marca, Modelo , Rodado, CantidadCambios, Color, Precio FROM Autos ORDER BY Id DESC');
            $stmt->execute();
            
            // PDO mapea automáticamente las columnas a las propiedades de la clase
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Auto');
        } catch (PDOException $e) {
            error_log("Error al obtener Autos: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Obtener una Auto por ID
     * Usando FETCH_CLASS para mapear automáticamente a objeto Auto (ORM)
     */
    public static function obtenerPorId($Id) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT Id, Marca, Modelo , Rodado, CantidadCambios, Color, Precio FROM Autos WHERE Id = :id');
            $stmt->execute([':id' => $Id]);
            
            // PDO mapea automáticamente las columnas a las propiedades de la clase
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Auto');
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Error al obtener Auto: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Agregar una nueva Auto
     */
    public static function agregar($Marca, $Modelo, $Rodado, $CantidadCambios, $Color, $Precio) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('INSERT INTO Autos (Marca, Modelo , Rodado, CantidadCambios, Color, Precio) VALUES (:marca, :modelo, :rodado, :cantidadCambios, :color, :precio)');
            
            return $stmt->execute([
                ':marca' => $Marca,
                ':modelo' => $Modelo,
                ':rodado' => $Rodado,
                ':cantidadCambios' => $CantidadCambios,
                ':color' => $Color,
                ':precio' => $Precio

            ]);
        } catch (PDOException $e) {
            error_log("Error al agregar Auto: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Editar una Auto existente
     */
    public static function editar($Id,  $Marca, $Modelo, $Rodado, $CantidadCambios, $Color, $Precio) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('UPDATE Autos SET Marca = :marca, Modelo = :modelo, Rodado = :rodado, CantidadCambios = :cantidadCambios, Color = :color, Precio = :precio WHERE Id = :id');
            
            return $stmt->execute([
                ':id' => $Id,
                ':marca' => $Marca,
                ':modelo' => $Modelo,
                ':rodado' => $Rodado,
                ':cantidadCambios' => $CantidadCambios,
                ':color' => $Color,
                ':precio' => $Precio
            ]);
        } catch (PDOException $e) {
            error_log("Error al editar Auto: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Eliminar una Auto
     */
    public static function eliminar($Id) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('DELETE FROM Autos WHERE Id = :id');
            
            return $stmt->execute([':id' => $Id]);
        } catch (PDOException $e) {
            error_log("Error al eliminar Auto: " . $e->getMessage());
            return false;
        }
    }
}
?>
