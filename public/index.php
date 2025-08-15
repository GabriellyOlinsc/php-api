<?php
// Habilitar exibição de erros no ambiente de desenvolvimento
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configurar cabeçalhos padrão da API
header('Content-Type: application/json; charset=utf-8');

// // Autoload das classes via Composer
// require_once __DIR__ . '/../vendor/autoload.php';

// Conexão e controllers
require_once __DIR__ . '/../src/config/Database.php';
require_once __DIR__ . '/../src/utils/Response.php';
require_once __DIR__ . '/../src/controllers/ItemController.php';
require_once __DIR__ . '/../src/controllers/CategoryController.php';
require_once __DIR__ . '/../src/models/Item.php';
require_once __DIR__ . '/../src/models/Category.php';

// Conectar ao banco
$pdo = Database::getConnection();

// Instanciar controllers
$itemController = new ItemController($pdo);
$categoriaController = new CategoriaController($pdo);

// Captura URI e método
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$method = $_SERVER['REQUEST_METHOD'];

// Roteamento simples
switch ($uri) {
    // CATEGORIAS
    case 'categorias':
        if ($method === 'GET') $categoriaController->getAll();
        elseif ($method === 'POST') $categoriaController->create();
        else sendError(405, 'Método não permitido');
        break;

    // ITENS
    case 'items':
        if ($method === 'GET') $itemController->getAll();
        elseif ($method === 'POST') $itemController->create();
        else sendError(405, 'Método não permitido');
        break;

    // Rota raiz
    case '':
        jsonResponse([
            'message' => 'API rodando. Endpoints: /categorias (GET,POST), /items (GET,POST)'
        ]);
        break;

    // Qualquer outra rota
    default:
        sendError(404, 'Rota não encontrada');
        break;
}
