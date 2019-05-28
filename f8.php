<?php
 require_once "config.php";
$id=$_SEDION['user_id'];
$stid = oci_parse($conn, 'begin :cursor=reviewuri(:id); end;');
 oci_bind_by_name($stid, ':cursor', $cursor);
                oci_execute($stid);
oci_close($conn);
exit;
?>