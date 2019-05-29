<?php
 session_start(); //starts all the sessions 
 if($_SESSION['id'] == NULL) {
  header('Location: index.php'); //take user to the login page if there's no information stored in session variable
      } 
	

	$conn = oci_connect('STUDENT','STUDENT','localhost/XE') or die; 


function Afiseaza_programri()
{
		global $conn;
		$id = $_SESSION['id']; 
		$sql = "select (select nume from furnizori where id=id_furnizor)\"Furnizor\",(select tip from servicii where id=id_serviciu)\"Serviciu\",to_char(data_programare,'dd-mm-yy')\"Data Programarii\",to_char(ora_programare,'HH24:MI')\"Ora Programarii\" from programari where id_client = 267 order by\"Data Programarii\",\"Ora Programarii\"";
	    $stmt = oci_parse($conn,$sql);
		$r = oci_execute($stmt);
		if (!$r) {
		$m = oci_error($stmt);
		trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
		}
 
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
    echo "</tr>\n";
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

<?php


if(isset($_POST['afiseazaprogramari']))
{
	Afiseaza_programri();
}


?>


</sectionn>

</main>

</body>


</html>
<?php

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

if(isset($_POST['adaugaprogramare']))
{
	Adauga_programare();
}

if(isset($_POST['stergeprogramare']))
{
	Sterge_programare();
}
?>