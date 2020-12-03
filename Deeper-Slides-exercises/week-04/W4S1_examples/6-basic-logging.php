<?php

$array = [
    'key' => 'value',
    'anotherKey' => 'anotherValue',
    'intKey' => 123,
    'nestedArray' => ['orange', 'apple', 'blueberry'],
];

var_dump($array);


if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $logMsg = time() . ' - NEW SUBSCRIPTION: ' . $name . ', email: ' . $email . PHP_EOL;
    file_put_contents('logfile.log', $logMsg, FILE_APPEND | LOCK_EX);

    // Continue with system logic
}

?>

<form action="" method="post">
  <input name="name">

  <input name="email">

  <button type="submit" name="button">Submit</button>
</form>
