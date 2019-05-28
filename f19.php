<?php
 require_once "config.php";
  if(empty(empty(trim($_POST["idr"]))) 
{}
else
{

$idr=$_POST['idr'];
 $stid = oci_parse($conn, 'begin stergereview(:idr); end;');
                oci_execute($stid);
}
oci_close($conn);
exit;
?>