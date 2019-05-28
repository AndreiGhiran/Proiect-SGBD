<?php
 require_once "config.php";
  if(empty(trim($_POST["nume"]))) 
{}
else
{
$nume=$_POST['nume'];
 $stid = oci_parse($conn, 'begin adaugfurnizor(:nume); end;');
                oci_execute($stid);
}
oci_close($conn);
exit;
?>