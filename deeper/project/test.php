<?php

$db = new PDO('mysql:host=mysql;dbname=lecture', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_GET['id'])) {

    $statement = $db->query('SELECT `product`.`id`, `product`.`title`
  FROM `product` where `id` = $_GET['id']');

$results = $statement->fetchAll();

var_dump($results);

echo "the title is " . $results[0]['title'];
echo $_GET['id'];
}


