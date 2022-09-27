<?php 
try {
    $db=new PDO("mysql:host=localhost;dbname=student_database;charset=utf8",'root','12345678');
    //echo"connected!";
} catch (PDOExpception $e) {
    echo $e->getMessage();
}
// username: testusername
// password: test123
?>