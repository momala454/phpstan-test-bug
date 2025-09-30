<?php declare(strict_types = 1);

use function PHPStan\dumpType;
use function PHPStan\Testing\assertType;

function blah(\PDOStatement $truc): void
{
    $array = [];
    /** @var int */
    $stepCount = $truc->fetchColumn();
    $array[rand(1, 10)] = 1 - $stepCount;

    $stepId = rand(1, 10);
    \PHPstan\dumpType($array);
    \PHPstan\dumpType($stepCount);

    if (!isset($array[$stepId])) {
        return;
    }
    \PHPstan\dumpType($array);
    
    echo 'REDUCE ' . $stepId . ' to ' . $array[$stepId] . "\n";
    echo 'REDUCE ' . $stepId . ' to ' . $array[$stepId] . "\n";
    $array[$stepId]--;

    echo 'REDUCE ' . $stepId . ' to ' . $array[$stepId] . "\n";

}