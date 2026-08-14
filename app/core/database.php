<?php

class Database{
   public function connexionDB(): PDO
{

    try {
        $pdo = new PDO(
            "pgsql:host=localhost;dbname=gestiondette;port=5432",
            "postgres",
            "1234"
        );

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (Exception $ex) {
        die('Erreur:' . $ex->getMessage());
    }

}


public function deconnecteDB(): PDO
{
    $config = require_once "env.php";
    static $pdo = null;

    if ($pdo == null) {

        $chaine = "pgsql:host={$config['host']};dbname={$config['dbname']};port={$config['port']}";

        $pdo = new PDO(
            $chaine,
            $config['user'],
            $config['password']
        );

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    }

    return $pdo;
}


public function query(PDO $pdo, string $sql, bool $single = true): array
{
    $query = $pdo->query($sql);
    return $single ? $query->fetch() : $query->fetchAll();


}

public function prepare(PDO $pdo, string $sql, array $datas)
{
    $prepare = $pdo->prepare($sql);
    $prepare->execute($datas);
    return $prepare;
}

public function executeQuery(PDO $pdo, string $sql, array $datas, bool $single = true): array
{
    $statement = $this->prepare($pdo, $sql, $datas);
    $result = $single ? $statement->fetch() : $statement->fetchAll();

    return $result ?: [];
}

public function executeUpdate(PDO $pdo, string $sql, array $datas): int
{
    $this->prepare($pdo, $sql, $datas);

    return (str_starts_with(strtoupper($sql), 'INSERT')) ? $pdo->lastInsertId() : $prepare->rowCount();
}

public function getAllTable(string $tableName):array{
    $pdo = $this->deconnecteDB();
    $sql = "SELECT * FROM $tableName";
    return $this->query($pdo, $sql, false);
}

}
