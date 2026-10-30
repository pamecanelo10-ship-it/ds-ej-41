-- Script de creación de Base de Datos y Tabla Recetas
-- Base de Datos
CREATE DATABASE IF NOT EXISTS autos;
USE autos;

-- Tabla Recetas
CREATE TABLE IF NOT EXISTS autos (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Marca VARCHAR(100) NOT NULL,
    Modelo VARCHAR(100) NOT NULL UNIQUE,
    Rodado INT NOT NULL,
    CantidadCambios INT NOT NULL,
    Color INT NOT NULL,
    Precio INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

