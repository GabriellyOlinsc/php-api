<?php
class Item {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM itens ORDER BY id ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO itens (nome, descricao, imagem, categoria_id) 
                VALUES (:nome, :descricao, :imagem, :categoria_id)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nome' => $data['nome'],
            ':descricao' => $data['descricao'],
            ':imagem' => $data['imagem'],
            ':categoria_id' => $data['categoria_id']
        ]);
    }
}
