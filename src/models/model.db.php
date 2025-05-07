<?php
    class Db{
         // Configurações de conexão
        private static $host = 'localhost';
        private static $db   = 'nome_do_banco';
        private static $user = 'root';
        private static $pass = '';
        private static $charset = 'utf8mb4';

        // Cria nova conexão a cada chamada
        public static function connect()
        {
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=" . self::$charset;

            try {
                return new PDO($dsn, self::$user, self::$pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            } catch (PDOException $e) {
                die('Erro de conexão: ' . $e->getMessage());
            }
        }
    }
?>