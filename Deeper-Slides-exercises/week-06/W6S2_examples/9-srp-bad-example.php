<?php declare(strict_types=1);

class Calculator
{
    public function add(float $a, float $b): void
    {
        $total = $a + $b;

        echo 'The total is ' . $total;
    }

    public function multiply(float $a, float $b): void
    {
        $total = $a * $b;

        echo 'The total is ' . $total;
    }
}

$c = new Calculator();
$c->add(1, 5);
