<?php
 require_once "config.php";
 if(empty(trim($_POST["idm"])) || empty(trim($_POST["ids"])) || empty(trim($_POST["data"])) || empty(trim($_POST["ora"])))
 {}
else
{
$idm=$_POST['idm'];
$ids=$_POST['ids'];
$date=$_POST['data'];
$ora=$_POST['ora'];
 $stid = oci_parse($conn, 'begin adaugprogramare(:idm, :ids, :data, :ora); end;');
                oci_execute($stid);

}
oci_close($conn);
exit;

?>