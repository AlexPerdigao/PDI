<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Insfrastructure\Repository\PdoStudentRepository;

require 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository(connection: $connection);

$connection->beginTransaction();

try {
    $aStudent = new Student(
    null,
    'Nico Steppa',
    new DateTimeImmutable('1985-05-01')
);
    $studentRepository->save($aStudent);

    $anotherStudent = new Student(
    null,
    'João Victor',
    new DateTimeImmutable('1985-05-01'),
);
    $studentRepository->save($anotherStudent);

    $connection->commit();

} catch (\PDOException $e) {
    echo $e->getMessage();
    $connection->rollBack();
}
