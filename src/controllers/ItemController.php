<?php
class ItemController {
    private $item;

    public function __construct(PDO $pdo) {
        $this->item = new Item($pdo);
    }

    public function getAll() {
        $result = $this->item->getAll();
        sendResponse($result); // usa utils/Response
    }

    public function create() {
        $data = json_decode(file_get_contents("php://input"), true);

        // Verifica campos obrigatórios
        $required = ['nome', 'descricao', 'imagem', 'categoria_id'];
        foreach ($required as $field) {
            if (empty($data[$field])) {
                sendError("Campo obrigatório: $field", 400);
            }
        }

        if ($this->item->create($data)) {
            sendResponse(["mensagem" => "Item criado com sucesso"], 201);
        } else {
            sendError("Falha ao criar item", 500);
        }
    }
}
