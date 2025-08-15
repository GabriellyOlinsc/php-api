<?php
class Categoria {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM categoria ORDER BY id ASC");
        return $stmt->fetchAll();
    }

    public function create($data) {
        $sql = "INSERT INTO categoria (nome, descricao) 
                VALUES (:nome, :descricao)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nome' => $data['nome'],
            ':descricao' => $data['descricao']
        ]);
    }
}
