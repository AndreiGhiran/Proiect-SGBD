<?php
$conn = oci_connect("nume", "parola", "host");
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
?>