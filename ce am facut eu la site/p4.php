<?php 
error_reporting(E_ERROR | E_PARSE);
session_start(); //starts all the sessions 
        if($_SESSION['user'] != NULL) {
            header('Location: indexx.php'); //take user to the details page if already logged in
        } ?>
		

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styleSheet.css">
<title>LineUp</title>
</head>


<body>

<main>


<input type="checkbox" id="newsButton">

<label for="newsButton">  </label>


<nav>

<input type="checkbox" id="menuButton">

<label for="menuButton">  </label>


<ul>
<li><a href="index.php"> Acasa</a></li>
<li><a href="p1.php"> Programari</a></li>
<li><a href="p2.php"> Cauta</a></li>
<li><a href="p3.php">Cont</a></li>
<li><a href="p4.php"> Contact</a></li>

</ul>


</nav>

<aside>


<h2>Autentificare </h2>
 <form action="p4.php" method="post">
  <input type="text" name="login_username" placeholder="Nume"><br>
  <input type="password" name="login_password" placeholder="Parola"><br><br>
  <button type="submit" name="login_submit">Log In</button>
</form> 
<p><h2>Inregistrare</h2></p>
 <form action="p4.php" method="post">
  <input type="text" name="register_username" placeholder="Nume"><br>
  <input type="text" name="register_userpname" placeholder="Prenume"><br>
  <input type="text" name="register_email" placeholder="Email"><br>
  <input type="text" name="register_telefon" placeholder="Teledfon"><br>
  <input type="password" name="register_password" placeholder="Parola"><br>
  <input type="password" name="register_passwordd" placeholder="Confirm Parola"><br><br>
  <button type="submit" name="register_submit">Register</button>
</form>


</aside>

<section>
<h3> Contact </h3>
<br>
<h2>Caloian Andrei George -andrei.caloian@uaic.ro<br>
Ghiran Andrei -andrei.ghiran@uaic.ro</h2>
</section>

</main>

</body>


</html>

 <?php
 $conn = oci_connect('STUDENT','STUDENT','localhost/XE') or die;
	//	include("Header.php");
	//	include("Navbar.php");
function LogIn ()
{
	global $conn;
	$res = 0;
	$user = $_POST['login_username'];
	$pass = $_POST['login_password'];	
	$sql = 'BEGIN :res := login(:username, :password); END;';
	$stmt = oci_parse($conn,$sql);
	oci_bind_by_name($stmt,':res',$res,32);
	oci_bind_by_name($stmt,':username',$user,32);
	oci_bind_by_name($stmt,':password',$pass,32);
	oci_execute($stmt);
    if ($res>1)
                    {
                        session_start();
                        $_SESSION['user'] = $user;
                        $_SESSION['id'] = $res;
                        /*    put before !DOCTYPE this:
                         * 
                         *          session_start(); //starts all the sessions 
                                    if($_SESSION['user'] == NULL) {
                                        header('Location: login.php'); //take user to the login page if there's no information stored in session variable
                                    } 
                         * 
                         *     this should mantain login status */
                        header('location: indexx.php');
                    }
                    else
                    {
                        echo '<p class="error">Username or Password incorrect</p>';
                    }
}

function Register()
{
	global $conn;
	$res = 0;
	$name = $_POST['register_username'];
	$pname = $_POST['register_userpname'];
	$email = $_POST['register_email'];
	$tel = $_POST['register_telefon'];
	$pass = $_POST['register_password'];
    $passd = $_POST['register_passwordd'];
	if ($pass == $passd)
	{
	$sql = 'BEGIN add_client(:username, :userpname, :password, :email, :tel); commit; END;';
	$stmt = oci_parse($conn,$sql);
	oci_bind_by_name($stmt,':username',$name,32);
	oci_bind_by_name($stmt,':userpname',$pname,32);
	oci_bind_by_name($stmt,':password',$pass,32);
	oci_bind_by_name($stmt,':email',$email,32);
	oci_bind_by_name($stmt,':tel',$tel,32);
	oci_execute($stmt);
	echo "<p> register succesful </p>";
	}
	else
		echo "<p> Wrong password </p>";
}

if(isset($_POST['login_submit']))
{
	LogIn();
}
else
if(isset($_POST['register_submit']))
{
	Register();
}
?>