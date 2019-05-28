<?php
$conn = oci_connect("STUDENT", "STUDENT", "localhost/XE");
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
?>