<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = ' ';
$DATABASE_NAME = 'ita';

$conn= mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if(mysqli_connect_error()) {

exit('Error connecting to the databse '.mysqli_connect_error());
}
if(!isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['phn'], $_POST['adr'])) {

exit('Empty Field(s)');

}
if (empty($_POST['username'] || empty($_POST['password']) || empty($_POST['email'])|| $_POST['phn'] || $_POST['adr'])) {

exit('Values Empty');

}

if($stmt = $conn->prepare('SELECT username, password,email,phn,adr FROM register WHERE username = ?')) 
{

$stmt->bind_param('s', $_POST['username']);

$stmt->execute();

$stmt->store_result();

if($stmt->num_rows>0) {

echo 'Username Already Exists. Try Again';

}
else {
if($stmt = $con->prepare('INSERT INTO register (username,password,email,phn,adr) VALUES (?, ?, ?,?,?)'))
    { 
    $password =password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $stmt->bind_param('sssss', $_POST['username'], $password, $_POST['email'],$_POST['phn'],$_POST['adr']); 

    $stmt->execute();
    echo 'Succesfully Registered';
    }
else {
echo 'Error Occurred';
}

}

$stmt->close();
}
else{
    echo 'Error Occurred';
}
 $con->close();
header("location:index.html");
?>
