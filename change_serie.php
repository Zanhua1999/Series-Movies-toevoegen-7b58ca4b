<?php
$host = 'localhost';
$db   = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

var_dump($_POST);

$id = $_POST['id'];

$query = <<<EOT
                        UPDATE netland.series 
                        SET
                            country = '${_POST['country']}',
                            description = '${_POST['description']}',
                            language = '${_POST['language']}',
                            rating = '${_POST['rating']}',
                            seasons = '${_POST['seasons']}',
                            title = '${_POST['title']}'
                        WHERE 
                            id = '${id}'
                        ;
                    EOT
;

var_dump($query);

$result = $pdo->query($query)->fetch();

var_dump($result);
?>