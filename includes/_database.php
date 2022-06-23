<?php

$user = "root";
$database = "sigma";
$hostname = "localhost";
$password = "";

try {
    $pdo = new PDO("mysql:dbname=$database;host=$hostname", $user, $password);
} catch (PDOException $e) {
    print("Unable to establish connection ".$e->getMessage());
}  catch (Exception $e) {
    print("Error ".$e->getMessage());
}

function query($pdo, $sql, $params) {
    $query = $pdo->prepare($sql);

    if (isset($params) && is_array($params) && count($params) >= 1) {
        foreach ($params as $_ => $parametersValues) {
            foreach ($parametersValues as $k => $v) {
                $query->bindValue($k, $v);
            }
        }
    }

    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

// Example
// $query = query($pdo, "SELECT * FROM test WHERE name = :name AND id = :id", [
//     [
//         "name" => "Jose",
//     ],
//     [
//         "id" => 3
//     ]
// ]);