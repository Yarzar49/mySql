<?php

//Example1Start
//Connesting Database and Database server 
//constructor -> DSN, username, password, option array
//Fetch with associative array
try {
    $db = new PDO('mysql:dbhost=localhost;dbname=projectz', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    
    ]);
} catch(PDOException $e) {
    echo "Connection failed: ".$e->getMessage();
}


// **Three Fetch Method in PDO
// fetch(), fetchAll(), fetchObject()

$statement = $db->query("SELECT * FROM roles");
$result = $statement->fetchAll();
print_r($result);
echo '<br>';
foreach($result as $role) {
    echo count($role);
    echo $role['name'];
    echo '<br>';
}
// Example1End

//Example2Start
//Connesting Database and Database server 
//constructor -> DSN, username, password, option array
//Fetch with object array
// $db = new PDO('mysql:dbhost=localhost;dbname=projectz', 'root', '', [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,

// ]);

//**Three Fetch Method in PDO
//fetch(), fetchAll(), fetchObject()
// $statement = $db->query("SELECT * FROM roles");
// $result = $statement->fetchAll();
// print_r($result);
// echo '<br>';
// foreach($result as $obj) {
//     echo $obj->name;
//     echo '<br>';
// }
//Example2End

// //Example3Start is NOT GOOD
// //Connesting Database and Database server 
// //constructor -> DSN, username, password, option array
// //Fetch default
// $db = new PDO('mysql:dbhost=localhost;dbname=projectz', 'root', '', [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
   

// ]);

// //**Three Fetch Method in PDO
// //fetch(), fetchAll(), fetchObject()
// $statement = $db->query("SELECT * FROM roles");
// $result = $statement->fetchAll();
// print_r($result);
// echo '<br>';
// foreach($result as $arr) {
//     echo count($arr);
//     echo $arr['name'];
//     echo '<br>';
// }
// //Example3End


//fetchObject() -> if fetchmode is not object

///END

//Data Insert

// $sql = "INSERT INTO roles (name, value) VALUES ('Supervisor', 4)";

// $db->query($sql);

// echo $db->lastInsertId(); //db
// echo '<br>';

//Prepare Statement is good for SQL Injection

$sql = "INSERT INTO roles (name, value) VALUES (:name, :value)";

$statement = $db->prepare($sql);

$statement->execute([
    ':name' => 'ROO',
    ':value' => 999,
]);

echo $db->lastInsertId();
echo '<br>';

// Data Update

$sql = "UPDATE roles SET name=:name WHERE value = 999";

$statement = $db->prepare($sql);

$statement->execute([
    ':name' => 'Ironman'
]);

echo $statement->rowCount();
echo '<br>';

// Data Delete

$sql = "DELETE FROM roles WHERE id>10";

$statement = $db->prepare($sql);

$statement->execute();

echo $statement->rowCount();


