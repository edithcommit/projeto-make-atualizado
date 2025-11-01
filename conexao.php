<?php
abstract class Conexao {
    private static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO("mysql:host=localhost;dbname=bdmake", "root", "");
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $erro) {
                echo "Erro na conexão: " . $erro->getMessage();
            }
        }
        return self::$instance;
    }
}
?>
