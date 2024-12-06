<?php $pdo = new PDO('pgsql:host=postgres;user=keploy-user;dbname=keploy-test;port=5432;password=keploy');


$_POST = json_decode(file_get_contents("php://input"), true);
$st = $pdo->prepare(<<<EOF
insert into employees (email, first_name, last_name, timestamp) values (:email, :first_name, :last_name, :timestamp);
EOF
);
$st->bindValue('email', $_POST['email']);
$st->bindValue('first_name', $_POST['firstName']);
$st->bindValue('last_name', $_POST['lastName']);
$st->bindValue('timestamp', $_POST['timestamp'], PDO::PARAM_INT);

$st->execute();

$query = $pdo->prepare('SELECT * FROM employees WHERE email = :email');
$query->execute(['email' => $_POST['email']]);

header("HTTP/1.1 200 Ok");
header("Content-Type: application/json");
echo json_encode($query->fetch());