<?php
 session_start(); //starts all the sessions 
 if($_SESSION['user'] == NULL) {
  header('Location: index.php'); //take user to the login page if there's no information stored in session variable
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
<h3> Programari </h3>
<h2>Adauga programare </h2>
 <form action="p11.php" method="post">
  <input type="user" name="adaug_idm" placeholder="Id magazin"><br><br>
    <input type="user" name="adaug_ids" placeholder="Id serviciu"><br><br>
	    <input type="user" name="adaug_data" placeholder="Data"><br><br>
	   <input type="user" name="adaug_ora" placeholder="Ora"><br><br>
  <input type="submit" name="adaugaprogramare" value="Submit">
</form>

<h2>Sterge programare </h2>
 <form action="p11.php" method="post">
  <input type="user" name="sterg_idm" placeholder="Id magazin"><br><br>
    <input type="user" name="sterg_ids" placeholder="Id serviciu"><br><br>
	   <input type="user" name="sterg_idp" placeholder="Id programare"><br><br>
  <input type="submit" name="stergeprogramare" value="Submit">
</form>
<br><br>
 <form action="p11.php" method="post">
  <input type="submit" name="afiseazaprogramari" value="Afiseaza programari">
</form>


</sectionn>

</main>

</body>


</html>
<?php
 $conn = oci_connect('STUDENT','STUDENT','localhost/XE') or die;
	//	include("Header.php");
	//	include("Navbar.php");

function Adauga_programare()
{
		global $conn;
$adaug_idm = $_POST['adaug_idm'];
$adaug_ids = $_POST['adaug_ids'];
$adaug_data = $_POST['adaug_data'];
$adaug_ora = $_POST['adaug_ora'];
	
}

function Sterge_programare()
{
		global $conn;
$sterg_idm = $_POST['sterg_idm'];
$sterg_ids = $_POST['sterg_ids'];
$sterg_idp = $_POST['sterg_idp'];

	
}

function Afiseaza_programri()
{
		global $conn;

	
}

if(isset($_POST['adaugaprogramare']))
{
	Adauga_programare();
}
else
if(isset($_POST['stergeprogramare']))
{
	Sterge_programare();
}
else
if(isset($_POST['afiseazaprogramari']))
{
	Afiseaza_programri();
}
?>