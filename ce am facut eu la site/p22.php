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

<aside>

<h2>Schimba parola </h2>
 <form action="p22.php" method="post">
 <input type="password" name="oldpassword" placeholder="Vechea parola"><br><br>
  <input type="password" name="newpassword" placeholder="Noua parola"><br><br>
  <input type="submit" value="Submit">
</form> 
<br><br>
  <form action="indexx.php" method="post">
  <input type="submit"  name="submit" value="Log out">
</form>


</aside>

<section>
<h2> Cauta magazin</h2>
<form action="p22.php" method="post">
  <input type="text" name="caut_idm" placeholder="Numele magazinului"><br><br>
  <input type="text" name="caut_ids" placeholder="Tipul maganului"><br><br>
  <input type="submit" name="cautmagazin" value="Submit">
</form> 

<h2>Afiseaza review</h2>
 <form action="p22.php" method="post">
  <input type="user" name="afiseaza_idm" placeholder="Id magazin"><br><br>
    <input type="user" name="afiseaza_ids" placeholder="Id serviciu"><br><br>
  <input type="submit" name="afiseazareview" value="Submit">
</form>

<h2>Afiseaza review cenzurat</h2>
 <form action="p22.php" method="post">
  <input type="user" name="afiseaza_cenzurat_idm" placeholder="Id magazin"><br><br>
    <input type="user" name="afiseaza_cenzurat_ids" placeholder="Id serviciu"><br><br>
  <input type="submit" name="afiseazareviewcenzurat" value="Submit">
</form>

<h2>Verifica ora libera magazin</h2>
 <form action="p22.php" method="post">
  <input type="user" name="verific_idm" placeholder="Id magazin"><br><br>
    <input type="user" name="verific_ids" placeholder="Id serviciu"><br><br>
	    <input type="user" name="ora" placeholder="Ora"><br><br>
  <input type="submit" name="verificaoralibere" value="Submit">
</form>

<h2>Adauga review </h2>
 <form action="p22.php" method="post">
  <input type="user" name="adaug_idm" placeholder="Id magazin"><br><br>
    <input type="user" name="adaug_ids" placeholder="Id serviciu"><br><br>
	   <input type="user" name="adaug_text" placeholder="Review"><br><br>
  <input type="submit" name="adaugareview" value="Submit">
</form>

<h2>Sterge review </h2>
 <form action="p22.php" method="post">
	   <input type="user" name="sterge_idr" placeholder="Id review"><br><br>
  <input type="submit" name="stergereview" value="Submit">
</form>

<h2>Vezi ce review-uri ai dat </h2>
 <form action="p22.php" method="post">
  <input type="submit" name="vezireview" value="Submit">
</form>


<h2>Procentaj clienti ce au dat review </h2>
 <form action="p22.php" method="post">
  <input type="submit" name="procentajclienti" value="Submit">
</form>

<h2>Procentaj clienti ce au dat review la un magazin </h2>
 <form action="p22.php" method="post">
  <input type="user" name="procentaj_idm" placeholder="Id magazin"><br><br>
    <input type="user" name="procentaj_ids" placeholder="Id serviciu"><br><br>
  <input type="submit" name="procentajclientimagazin" value="Submit">
</form>



</section>

</main>

</body>


</html>
<?php
 $conn = oci_connect('STUDENT','STUDENT','localhost/XE') or die;
	//	include("Header.php");
	//	include("Navbar.php");

function Caut_magazin()
{
	global $conn;
	$caut_idm = $_POST['caut_idm'];
$caut_ids = $_POST['caut_ids'];

	
}

function Afiseaza_review()
{
	global $conn;
		$afiseaza_idm = $_POST['afiseaza_idm'];
$afiseaza_ids = $_POST['afiseaza_ids'];

}

function Afiseaza_review_cenzurat()
{
	global $conn;
			$afiseaza_cenzurat_idm = $_POST['afiseaza_cenzurat_idm'];
$afiseaza_cenzurat_ids = $_POST['afiseaza_cenzurat_ids'];

}

function Verifica_ora_libera()
{
	global $conn;
			$verific_idm = $_POST['verific_idm'];
$verific_ids = $_POST['verific_ids'];
$ora = $_POST['ora'];

}

function Adauga_review()
{
	global $conn;
			$adaug_idm = $_POST['adaug_idm'];
$adaug_ids = $_POST['adaug_ids'];
$adaug_text = $_POST['adaug_text'];

}

function Sterge_review()
{
	global $conn;
			$sterge_idr = $_POST['sterge_idr'];
}

function Vezi_review()
{
	global $conn;
}

function Procentaj_clienti()
{
	global $conn;
}

function Procentaj_clienti_magazin()
{
	global $conn;
			$procentaj_idm = $_POST['procentaj_idm'];
$procentaj_ids = $_POST['procentaj_ids'];

}

if(isset($_POST['cautmagazin']))
{
	Caut_magazin();
}
else
if(isset($_POST['afiseazareview']))
{
	Afiseaza_review();
}
else
if(isset($_POST['afiseazareviewcenzurat']))
{
	Afiseaza_review_cenzurat();
}
else
if(isset($_POST['verificaoralibere']))
{
	Verifica_ora_libera();
}
else
if(isset($_POST['adaugareview']))
{
	Adauga_review();
}
else
if(isset($_POST['stergereview']))
{
	Sterge_review();
}
else
if(isset($_POST['vezireview']))
{
	Vezi_review();
}
else
if(isset($_POST['procentajclienti']))
{
	Procentaj_clienti();
}
else
if(isset($_POST['procentajclientimagazin']))
{
	Procentaj_clienti_magazin();
}
?>