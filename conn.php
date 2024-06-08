<?php
function OpenCon()
{
    $username='root';
    $password='';
    $host='127.0.0.1';
    $database='medical_care';
    $con= new mysqli($host,$username,$password,$database) or die("Connect failed: %s\n". $con -> error) ;
   
    return $con;
}

function CloseCon($conn)
{
    $conn -> close();
}

?>
