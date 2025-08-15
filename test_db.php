<?php
// Teste básico de conexão
try {
    // Teste 1: Verificar extensões
    if (!extension_loaded('pdo_pgsql')) {
        throw new Exception('Extensão pdo_pgsql não está carregada');
    }
    echo "✅ Extensão pdo_pgsql carregada\n";

    // Teste 2: Conexão direta (substitua pelos seus dados)
    $dsn = "pgsql:host=127.0.0.1;port=5432;dbname=postgres;";
    $pdo = new PDO($dsn, 'postgres', 'postgres', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    echo "✅ Conexão com PostgreSQL estabelecida\n";

    // Teste 3: Query simples
    $stmt = $pdo->query("SELECT version()");
    $version = $stmt->fetchColumn();
    echo "✅ PostgreSQL Version: " . $version . "\n";

} catch (Exception $e) {
    echo "❌ Erro: " . $e->getMessage() . "\n";
}
?>