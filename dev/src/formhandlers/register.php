<?php

if($_SERVER["REQUEST_METHOD"] != "POST") {
   header("Location: ../../index.php");
   exit();
}

$firstname = htmlentities($_POST['firstname']);
$prefixes = htmlentities($_POST['prefixes']);
$lastname = htmlentities($_POST['lastname']);
$street = htmlentities($_POST['street']);
$house_number = htmlentities($_POST['housenumber']);
$number_addition = htmlentities($_POST['addition']);
$zipcode = htmlentities($_POST['zipcode']);
$city = htmlentities($_POST['city']);
$email = htmlentities($_POST['email']);
$password = htmlentities($_POST['password']);
$password_confirm = htmlentities($_POST['password_confirm']);

$sql = "
         INSERT INTO customers(firstname, prefixes, lastname, street, house_number, addition, zipcode, city, email, password)
         VALUES('$firstname', '$prefixes', '$lastname', '$street', $house_number, '$number_addition', '$zipcode', '$city', '$email', '$password')
";
require_once '../Database/Database.php';
Database::query($sql);
