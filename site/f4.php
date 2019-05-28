<?php
 require_once "config.php";
 if(empty(trim($_POST["oldpassword"])) || empty(trim($_POST["newpassword"])) || trim($_POST["oldpassword"])==$_SESSION['password'])
{}
else
{
$old=$_POST['oldpassword'];
$new=$_POST['newpassword'];
$_SESSION["password"]=$new;
 $stid = oci_parse($conn, 'begin schimbparola(:oldpassword, :newpassword); end;');
                oci_execute($stid);
}
oci_close($conn);
exit;
?>