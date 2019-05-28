<?php
 require_once "config.php";
 if(empty(trim($_POST["idm"])) || empty(trim($_POST["ids"])) || empty(trim($_POST["idp"])))
 {}
else
{
$idm=$_POST['idm'];
$ids=$_POST['ids'];
$idp=$_POST['idp'];
 $stid = oci_parse($conn, 'begin stergprogramare(:idm, :ids, :idp); end;');
                oci_execute($stid);

}
oci_close($conn);
exit;
?>