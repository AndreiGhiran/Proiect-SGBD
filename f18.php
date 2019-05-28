<?php
 require_once "config.php";
$idm=$_POST['idm'];
$ids=$_POST['ids'];
$text=$_POST['text'];
  if(empty(trim($_POST["idm"])) || empty(trim($_POST["ids"])) || empty(trim($_POST["text"]))) 
{}
else
{
$idm=$_POST['idm'];
$ids=$_POST['ids'];
$text=$_POST['text'];
 $stid = oci_parse($conn, 'begin adaugareview(:idm,:ids,:text); end;');
                oci_execute($stid);
}
oci_close($conn);
exit;
?>