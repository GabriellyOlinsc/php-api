<?php

class Database
{
    private static $pdo = null;

    public static function getConnection()
    {
        if (self::$pdo) return self::$pdo;

        $env = self::loadEnv(__DIR__ . '/../../.env');

        $host = $env['DB_HOST'] ?? '127.0.0.1';
        $port = $env['DB_PORT'] ?? '5432';
        $dbname = $env['DB_NAME'] ?? '';
        $user = $env['DB_USER'] ?? '';
        $pass = $env['DB_PASS'] ?? '';

        try {
            $dsn = "pgsql:host={$host};port={$port};dbname={$dbname}";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];

            self::$pdo = new PDO($dsn, $user, $pass, $options);
            return self::$pdo;
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode([
                "erro" => "Falha na conexão com o banco de dados",
                "detalhes" => $e->getMessage()
            ]);
            exit;
        }
    }

    private static function loadEnv($path)
    {
        if (!file_exists($path)) return [];

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $env = [];

        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || strpos($line, '#') === 0) continue;
            if (strpos($line, '=') === false) continue;
            list($key, $value) = explode('=', $line, 2);
            $env[trim($key)] = trim($value);
        }

        return $env;
    }
}
