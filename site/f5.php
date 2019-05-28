<?php 
 require_once "config.php";
  if(empty(trim($_POST["nume"])) || empty(trim($_POST["password"])) || trim($_POST["password"])==$_SESSION['password'] ) 
{}
else
{
$nume=$_POST['nume'];
 $stid = oci_parse($conn, 'begin schimbnume(:nume); end;');
                oci_execute($stid);
}
oci_close($conn);
exit;
?>