<?php
 session_start(); 
 if($_SESSION['user'] == NULL) {
  header('Location: index.php'); 
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

<li><a href="indexx.php"> Acasa</a></li>
<li><a href="p11.php"> Programari</a></li>
<li><a href="p22.php"> Cauta</a></li>
<li><a href="p33.php">Cont</a></li>
<li><a href="p44.php"> Contact</a></li>

</ul>


</nav>

<sectionn>
<h3> Cont </h3>
<h3>Informatii:<br>
 <form action="p33.php">
  <input type="submit" name="afiseazainformatii" value="Afiseaza informatii">
</form> 
<br>
</h3>
<h2>Schimba parola </h2>
 <form action="p33.php">
 <input type="password" name="oldpassword" placeholder="Vechea parola"><br><br>
  <input type="password" name="newpassword" placeholder="Noua parola"><br><br>
  <input type="submit" name="pass_chng_submit" value="Submit">
</form> 
<h2>Schimba emailul </h2>
 <form action="p33.php">
  <input type="text" name="schimb_email" placeholder="Noul email"><br><br>
  <input type="password" name="schimb_email_password" placeholder="Parola"><br><br>
  <input type="submit" name="schimbaemail" value="Submit">
</form>

<h2>Schimba usernameul </h2>
 <form action="p33.php">
  <input type="user" name="schimb_nume" placeholder="Noul nume"><br><br>
    <input type="password" name="schimb_nume_password" placeholder="Parola"><br><br>
  <input type="submit" name="schimbauser" value="Submit">
</form>

<h2>Schimba numarul de telefon </h2>
 <form action="p33.php">
  <input type="user" name="schimb_telefon" placeholder="Noul telefon"><br><br>
    <input type="password" name="schimb_telefon_password" placeholder="Parola"><br><br>
  <input type="submit" name="schimbatelefon" value="Submit">
</form>

<h2>Adauga furnizor </h2>
 <form action="p33.php">
  <input type="user" name="nume_furnizor" placeholder="Nume furnizor"><br><br>
  <input type="submit" name="adaugafurnizor" value="Submit">
</form>

<h2>Adauga serviciu </h2>
 <form action="p33.php">
  <input type="user" name="nume_serviciu" placeholder="Nume serviciu"><br><br>
    <input type="user" name="id_furnizor" placeholder="ID furnizor"><br><br>
  <input type="submit" name="adaugaserviciu" value="Submit">
</form>

<br><br>
 <form action="indexx.php" method="post">
  <input type="submit"  name="submit" value="Log out">
</form>

</sectionn>

</main>

</body>


</html>
<?php
 $conn = oci_connect('STUDENT','STUDENT','localhost/XE') or die;


function Afiseaza_informatii()
{
		global $conn;
	
}

function Schimba_email()
{
		global $conn;
$schimb_email = $_POST['schimb_email'];
$schimb_email_password = $_POST['schimb_email_password'];


	
}

function Schimba_user()
{
		global $conn;
$schimb_nume = $_POST['schimb_nume'];
$schimb_nume_password = $_POST['schimb_nume_password'];

	
}

function Schimba_telefon()
{
		global $conn;
$schimb_telefon = $_POST['schimb_telefon'];
$schimb_telefon_password = $_POST['schimb_telefon_password'];

	
}

function Adauga_furnizor()
{
		global $conn;
$nume_furnizor = $_POST['nume_furnizor'];

	
}

function Adauga_serviciu()
{
		global $conn;
$nume_serviciu = $_POST['nume_serviciu'];
$id_furnizor = $_POST['id_furnizor'];

	
}
 function ChangePass()
 {
	 global $conn;
	 $id = $_SESSION['id'];
	 echo "<p>" . $id . "</p>"; 
	 $old_pass = $_POST['oldpassword'];
	 $new_pass = $_POST['newpassword'];
	 $sql = 'BEGIN schimbare_parola(:id, :old_pass, :new_pass); END;';
	 $stmt = oci_parse($conn, $sql);
	 oci_bind_by_name($stmt,':id',$id,32);
	 oci_bind_by_name($stmt,':old_pass',$old_pass,32);
	 oci_bind_by_name($stmt,':new_pass',$new_pass,32);
	 oci_execute($stmt);
 }

if (isset($_POST['pass_chng_submit']))
{
	ChangePass();
}
else
if(isset($_POST['afiseazainformatii']))
{
	Afiseaza_informatii();
}
else
if(isset($_POST['schimbaemail']))
{
	Schimba_email();
}
else
if(isset($_POST['schimbauser']))
{
	Schimba_user();
}
else
if(isset($_POST['schimbatelefon']))
{
	Schimba_telefon();
}
else
if(isset($_POST['adaugafurnizor']))
{
	Adauga_furnizor();
}
else
if(isset($_POST['adaugaserviciu']))
{
	Adauga_serviciu();
}
?>