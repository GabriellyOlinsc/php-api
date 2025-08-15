<?php
class CategoriaController {
    private $categoria;

    public function __construct(PDO $pdo) {
        $this->categoria = new Categoria($pdo);
    }

    public function getAll() {
        $result = $this->categoria->getAll();
        sendResponse($result);
    }

    public function create() {
        $data = json_decode(file_get_contents("php://input"), true);

        if (empty($data['nome'])) {
            sendError('Campo obrigatório: nome', 400);
        }

        if ($this->categoria->create($data)) {
            sendResponse(["mensagem" => "Categoria criada com sucesso"], 201);
        } else {
            sendError("Falha ao criar categoria", 500);
        }
    }
}
