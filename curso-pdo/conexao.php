<?php

$dataBasePath = __DIR__ . '/banco.sqlite';

$pdo = new PDO('sqlite:' . $dataBasePath);
echo 'Conectei';

$pdo->exec("INSERT INTO phones (areaCode, number, student_id) VALUES ('16', '997586887', '1') , ('16', '997586880', '1')");
exit();

$createTableSql = '
CREATE TABLE IF NOT EXISTS students (
    id INTEGER PRIMARY KEY,
    name TEXT, 
    birth_date TEXT
);

CREATE TABLE phones (
    id INTEGER PRIMARY KEY,
    areaCode TEXT,
    number TEXT,
    student_id INTEGER,
    FOREIGN KEY (student_id) REFERENCES students(id)
);
';

$pdo->exec($createTableSql);