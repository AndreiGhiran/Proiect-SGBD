<?php
 require_once "config.php";
 if(empty(trim($_POST["nui"])) || empty(trim($_POST["tui"])))
 {}
else
{
$nume=$_POST['nui'];
$tip=$_POST['tui'];
 $stid = oci_parse($conn,'select  from users where ' );
                oci_execute($stid);
$stidd=oci_parse($conn, 'begin cautreview(:nui, :tui); end;');
            oci_execute($stidd);
                while ($row = oci_fetch_array($stid, OCI_BOTH)) {
                    print('Nume: ');
                    print($row['USERNAME']." ");
                    print('Score: ');
                    print($row['SCORE']." ");
                    $_SESSION['score'] = $row['SCORE'];
                    print("Correct answers: ");
                    print($row['CORRECT_ANSWERS']);
                }
}
oci_close($conn);
exit;
?>