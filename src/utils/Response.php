<?php
function sendError($mensagem, $codigo = 400) {
    http_response_code($codigo);
    echo json_encode(["erro" => $mensagem]);
    exit;
}

function sendResponse($dados, $codigo = 200) {
    http_response_code($codigo);
    echo json_encode($dados);
    exit;
}

function jsonResponse($data, $status = 200) {
    http_response_code($status);
    echo json_encode($data);
    exit;
}