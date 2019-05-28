<?php
 require_once "config.php";
  if(empty(trim($_POST["email"])) || empty(trim($_POST["password"])) || trim($_POST["password"])==$_SESSION['password'] ) 
{}
else
{
$email=$_POST['email'];
 $stid = oci_parse($conn, 'begin schimbemail(:email); end;');
                oci_execute($stid);
}
oci_close($conn);
exit;

?>