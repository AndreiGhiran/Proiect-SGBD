<?php 
error_reporting(E_ERROR | E_PARSE);
session_start(); 
        if($_SESSION['user'] != NULL) {
            header('Location: indexx.php');
        } 
		
		
		 $conn = oci_connect('STUDENT','STUDENT','localhost/XE') or die;

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

function Cautmagazinnume()
{
	global $conn;
	$nume_magazin = $_POST['nume_magazin'];
	$sql = "select id,tip from servicii where id=(select id_serviciu from furnizori where nume='".$nume_magazin."' and rownum=1)";
	$stmt = oci_parse($conn,$sql);
	$r = oci_execute($stmt);
	
	
	
	echo "<table border='1'>\n";
$ncols = oci_num_fields($stmt);
echo "<tr>\n";
for ($i = 1; $i <= $ncols; ++$i) {
    $colname = oci_field_name($stmt, $i);
    echo "  <th><b>".htmlspecialchars($colname,ENT_QUOTES|ENT_SUBSTITUTE)."</b></th>\n";
}
echo "</tr>\n";
 
	
while (($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "<td>";
        echo $item!==null?htmlspecialchars($item, ENT_QUOTES|ENT_SUBSTITUTE):"&nbsp;";
        echo "</td>\n";
    }
}
echo "</table>\n";
}
function Cautmagazinid()
{
	global $conn;
	$id_magazin = $_POST['id_magazin'];
   $sql = "select id,tip from servicii where id=(select id_serviciu from furnizori where id=".$id_magazin." and rownum=1)";
	$stmt = oci_parse($conn,$sql);
	$r = oci_execute($stmt);
	
	
	
	echo "<table border='1'>\n";
$ncols = oci_num_fields($stmt);
echo "<tr>\n";
for ($i = 1; $i <= $ncols; ++$i) {
    $colname = oci_field_name($stmt, $i);
    echo "  <th><b>".htmlspecialchars($colname,ENT_QUOTES|ENT_SUBSTITUTE)."</b></th>\n";
}
echo "</tr>\n";
 
	
while (($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "<td>";
        echo $item!==null?htmlspecialchars($item, ENT_QUOTES|ENT_SUBSTITUTE):"&nbsp;";
        echo "</td>\n";
    }
}
echo "</table>\n";
}

?>
		

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
 <form action="p2.php" method="post">
  <input type="text" name="login_username" placeholder="Nume"><br>
  <input type="password" name="login_password" placeholder="Parola"><br><br>
  <button type="submit" name="login_submit">Log In</button>
</form> 
<p><h2>Inregistrare</h2></p>
 <form action="p2.php" method="post">
  <input type="text" name="register_username" placeholder="Nume"><br>
  <input type="text" name="register_userpname" placeholder="Prenume"><br>
  <input type="text" name="register_email" placeholder="Telefon"><br>
  <input type="text" name="register_telefon" placeholder="Email"><br>
  <input type="password" name="register_password" placeholder="Parola"><br>
  <input type="password" name="register_passwordd" placeholder="Confirm Parola"><br><br>
  <button type="submit" name="register_submit">Register</button>
</form>

</aside>

<section>
<br><br>
<form action="p2.php" method="post">
  <input type="text" name="nume_magazin" placeholder="Numele magazinului"><br>
  <input type="submit" name="caut_magazin_nume" value="Submit">
</form> 

<form action="p2.php" method="post">
  <input type="text" name="id_magazin" placeholder="Id-ul magazinului"><br>
  <input type="submit" name="caut_magazin_id" value="Submit">
</form> 
<?php
if(isset($_POST['caut_magazin_nume']))
{
	Cautmagazinnume();
}

if(isset($_POST['caut_magazin_id']))
{
	Cautmagazinid();
}


?>
</section>

</main>

</body>


</html>

 <?php

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