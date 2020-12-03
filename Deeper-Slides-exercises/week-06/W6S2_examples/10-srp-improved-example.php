<?php declare(strict_types=1);

class Calculator
{
    public function add(float $a, float $b): float
    {
        return $a + $b;
    }

    public function multiply(float $a, float $b): float
    {
        return $a * $b;
    }
}

$c = new Calculator();
$c->add(1, 5);
