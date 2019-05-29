<?php
 session_start(); 
 if($_SESSION['user'] == NULL) {
  header('Location: index.php'); 
                                    } 
	$conn = oci_connect('STUDENT','STUDENT','localhost/XE') or die;


function Afiseaza_informatii()
{
			global $conn;
	$id = $_SESSION['id'];
   $sql = "select * from clienti where id=".$id."";
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


function Schimba_telefon()
{
		global $conn;
$schimb_telefon = $_POST['schimb_telefon'];
$schimb_telefon_password = $_POST['schimb_telefon_password'];
	 $id = $_SESSION['id'];
	 echo "<p>" . $id . "</p>"; 

	 $sql = 'BEGIN schimbare_telefon(:id, :schimb_telefon_password, :schimb_telefon); END;';
	 $stmt = oci_parse($conn, $sql);
	 oci_bind_by_name($stmt,':id',$id,32);
	 oci_bind_by_name($stmt,':schimb_telefon',$schimb_telefon,32);
	 oci_bind_by_name($stmt,':schimb_telefon_password',$schimb_telefon_password,32);
	 oci_execute($stmt);
	
}

function Adauga_furnizor()
{
		global $conn;
$nume_furnizor = $_POST['nume_furnizor'];
$id_furnizor = $_POST['id_furnizor'];
$ora1="08:00";
$ora2="20:00";
$trust=5;
	 $sql = 'BEGIN add_furnizor(:nume_furnizor, :id_furnizor, :ora1, :ora2, :trust); END;';
	 $stmt = oci_parse($conn, $sql);
	 oci_bind_by_name($stmt,':id_furnizor',$id_furnizor,32);
	 oci_bind_by_name($stmt,':nume_furnizor',$nume_furnizor,32);
	  oci_bind_by_name($stmt,':ora1',$ora1,32);
	 oci_bind_by_name($stmt,':ora2',$ora2,32);
	  oci_bind_by_name($stmt,':trust',$trust,32);
	 oci_execute($stmt);
}

function Adauga_serviciu()
{
		global $conn;
$nume_serviciu = $_POST['nume_serviciu'];
$time=30;
 $sql = 'BEGIN add_serviciu(:nume_serviciu, :time); END;';
	 $stmt = oci_parse($conn, $sql);
	 oci_bind_by_name($stmt,':nume_serviciu',$nume_serviciu,32);
	 oci_bind_by_name($stmt,':time',$time,32);
	 oci_execute($stmt);
	
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
<?php
if(isset($_POST['afiseazainformatii']))
{
	Afiseaza_informatii();
}
?>
<br>
</h3>
<h2>Schimba parola </h2>
 <form action="p33.php">
 <input type="password" name="oldpassword" placeholder="Vechea parola"><br><br>
  <input type="password" name="newpassword" placeholder="Noua parola"><br><br>
  <input type="submit" name="pass_chng_submit" value="Submit">
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
      <input type="user" name="id_furnizor" placeholder="ID serviciu"><br><br>
  <input type="submit" name="adaugafurnizor" value="Submit">
</form>

<h2>Adauga serviciu </h2>
 <form action="p33.php">
  <input type="user" name="nume_serviciu" placeholder="Nume serviciu"><br><br>
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
 

if (isset($_POST['pass_chng_submit']))
{
	ChangePass();
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