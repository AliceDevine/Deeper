<?php
$db = new PDO('mysql:host=mysql;dbname=project;charset=utf8', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);