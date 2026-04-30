<?php
// Configurações do Banco de Dados
$host = 'localhost';
$dbname = 'car_veiculos';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode(["error" => "Falha na conexão: " . $e->getMessage()]));
}
?>
