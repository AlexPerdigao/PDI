<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$student = new Student(
    null,
    'Alex Perdigão',
    new \DateTimeImmutable('1972-09-14')
);

echo $student->age();
