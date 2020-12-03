<?php

class EntityHydrator
{
    public function hydrateProduct(): Product
    {
        // ...
    }

    public function hydrateCheckIn(): CheckIn
    {
        // ...
    }

    public function hydrateProductWithCheckIns(): Product
    {
        // ...
    }
}

$productAndCheckInData = []; // i.e. from query...

$hydrator = new EntityHydrator();
$product = $hydrator->hydrateProductWithCheckIns(
  $productAndCheckInData
);
