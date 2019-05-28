<?php
 require_once "config.php";

if(empty(trim($_POST["username"])) || empty(trim($_POST["password"])))
{
	echo '<h1>Introduceti un username sau parola</h1>';
}
else
{ $username = trim($_POST["username"]);
$password = trim($_POST["password"]);
$stid = oci_parse($conn, 'begin :code := login(:username, :password); end;');
        oci_bind_by_name($stid, ':username', $username);
        oci_bind_by_name($stid, ':password', $password);
        oci_bind_by_name($stid, ':code', $code);

        oci_execute($stid);
		if ($code >= 1){
            session_start();
                                    
            $_SESSION["loggedin"] = true;
            $_SESSION["user_id"] = $code;
			$_SESSION["password"]=$password;
            $_SESSION["username"] = $username;                            
            
            header("location: indexx.php");
        }elseif($code == 0){
            $password_err = "Parola gresita.";
        }elseif($code == -1){
            $username_err = "Username gresit.";
        }
    }
	
oci_close($conn);
exit;
?>