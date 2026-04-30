<?php
header('Content-Type: application/json');
require_once 'config.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    // Inserção de Veículo
    $data = json_decode(file_get_contents('php://input'), true);

    if (!$data) {
        $data = $_POST;
    }

    try {
        $sql = "INSERT INTO veiculos (placa, marca, modelo, ano_fabricacao, ano_modelo, cor, combustivel, quilometragem, chassi, renavam, data_cadastro, observacoes) 
                VALUES (:placa, :marca, :modelo, :ano_fabricacao, :ano_modelo, :cor, :combustivel, :quilometragem, :chassi, :renavam, :data_cadastro, :observacoes)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':placa' => $data['placa'],
            ':marca' => $data['marca'],
            ':modelo' => $data['modelo'],
            ':ano_fabricacao' => $data['ano_fabricacao'],
            ':ano_modelo' => $data['ano_modelo'],
            ':cor' => $data['cor'],
            ':combustivel' => $data['combustivel'],
            ':quilometragem' => $data['quilometragem'],
            ':chassi' => $data['chassi'],
            ':renavam' => $data['renavam'],
            ':data_cadastro' => $data['data_cadastro'],
            ':observacoes' => $data['observacoes']
        ]);

        echo json_encode(["success" => true, "message" => "Veículo cadastrado com sucesso!"]);
    } catch (PDOException $e) {
        echo json_encode(["success" => false, "message" => "Erro ao cadastrar: " . $e->getMessage()]);
    }

} elseif ($method === 'GET') {
    // Consulta de Veículos
    try {
        $stmt = $pdo->query("SELECT * FROM veiculos ORDER BY id DESC");
        $veiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($veiculos);
    } catch (PDOException $e) {
        echo json_encode(["error" => "Erro ao consultar: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["error" => "Método não permitido"]);
}
?>
