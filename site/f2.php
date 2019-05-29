<?php
 require_once "config.php";
if(empty(trim($_POST["username"])) || empty(trim($_POST["password"])) || empty(trim($_POST["passwordd"])) || empty(trim($_POST["telefon"])) || empty(trim($_POST["email"])) || trim($_POST["password"])!=trim($_POST["passwordd"]))
{}
else
{
$username=$_POST['username'];
$password=$_POST['password'];
$nrtel=$_POST['telefon'];
$passwordd=$_POST['passwordd'];
$email=$_POST['email'];
$stid=oci_parse($conn, 'begin add_clien(:username, :password, :telefon, :email); end;');
 oci_execute($stid);
}
oci_close($conn);
exit;
?>