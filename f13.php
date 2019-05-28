<?php
 require_once "config.php";
$nume=$_POST['nume'];
 if(empty(trim($_POST["nume"])) )
 {}
else
{
$nume=$_POST['nume'];
$furnizor=$_SESION['id_furnizor'];
 $stid = oci_parse($conn, 'begin adaugserviciu(:nume,:furnizor); end;');
                oci_execute($stid);
}
oci_close($conn);
exit;

?>