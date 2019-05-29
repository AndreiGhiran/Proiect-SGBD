<?php
 session_start();
 if($_SESSION['user'] == NULL) {
  header('Location: index.php'); 
                                    } 
									
		$conn = oci_connect('STUDENT','STUDENT','localhost/XE') or die;


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


function Afiseaza_review()
{
	global $conn;
$afiseaza_ids = $_POST['afiseaza_ids'];

}

function Afiseaza_review_cenzurat()
{
	global $conn;
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
 <form action="indexx.php">
 <input type="password" name="oldpassword" placeholder="Vechea parola"><br><br>
  <input type="password" name="newpassword" placeholder="Noua parola"><br><br>
  <input type="submit" name="pass_chng_submit" value="Submit">
</form> 
<br><br>
<form action="p22.php" method="post">
  <input type="text" name="nume_magazin" placeholder="Numele magazinului"><br>
  <input type="submit" name="caut_magazin_nume" value="Submit">
</form> 

<form action="p22.php" method="post">
  <input type="text" name="id_magazin" placeholder="Id-ul magazinului"><br>
  <input type="submit" name="caut_magazin_id" value="Submit">
</form> 


</aside>

<section>
<h2> Cauta magazin</h2>
<form action="p22.php" method="post">
  <input type="text" name="nume_magazin" placeholder="Numele magazinului"><br>
  <input type="submit" name="caut_magazin_nume" value="Submit">
</form> 

<form action="p22.php" method="post">
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

<h2>Afiseaza review</h2>
 <form action="p22.php" method="post">
    <input type="user" name="afiseaza_ids" placeholder="Id serviciu"><br><br>
  <input type="submit" name="afiseazareview" value="Submit">
</form>

<h2>Afiseaza review cenzurat</h2>
 <form action="p22.php" method="post">
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
else
if (isset($_POST['pass_chng_submit']))
{
	ChangePass();
}

?>