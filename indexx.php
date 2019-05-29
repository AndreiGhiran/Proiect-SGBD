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

<aside>


<h2>Schimba parola </h2>
 <form action="indexx.php">
 <input type="password" name="oldpassword" placeholder="Vechea parola"><br><br>
  <input type="password" name="newpassword" placeholder="Noua parola"><br><br>
  <input type="submit" name="pass_chng_submit" value="Submit">
</form> 
<br><br>
 <form action="indexx.php" method="post">
  <input type="submit"  name="submit" value="Log out">
</form>
</aside>

<section>
<h3> Descriptie </h3>
<br>
<h4><li>	Aplicatia face viata clientilor magazinelor/cabinetelor partenere mai usoara ,aceasta prezentand statistici folositoare pentru serviciul dorit de 
client precum si cel mai potrivit magazin(cele mai mari review-uri + ca magazinul sa fie liber in perioada selectata de client),furnizori de servicii pot vedea
cand este ora de varf pentru fiecare serviciu al magazinului/cabinetului astfel pot adauga mai multe servicii de acelasi tip sau tipuri diferite. Fiecare client in parte
va avea un trust factor(daca nu merge la o programare facuta ,trust factor scade, altfel, creste pana la un maxim). Fiecare magazin/cabinet va avea un trust factor minim(daca un client are trust factor-ul
sub minim nu poate face programare la acel magazin/cabinet). Fiecare magazin/cabinet va avea statistici cu cati clienti au dat review ,precum si cati au dat o stea ,una ,..
Clientul poate sterge programari viitoae.
	</h4><h4><li>De asemenea aplicatia ofera functionalitati si pentru propietarii magazinelor/cabinetelor inscrise in aplicatie. Aplicatia le poate arata cel mai solicitat serviciu, 
asfel propietarii isi pot dedica resurse asupra inbunatatirii acelui serviciu sau pot ridica pretul acestuia, de asemenea aplicatia calculeaza "ora/orele de varf" ale magazinului/cabinetului, adica orele 
la care sunt cele mai multe solicitari de servicii. 
</h4>

</section>

</main>

</body>


</html>
<?php
 
 function LogOut ()
 {
	 session_start();
	 unset($_SESSION['user']);
	 unset($_SESSION['id']);
	 header('location: index.php');
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
 
if(isset($_POST['submit']))
{
	LogOut();
}
else
if (isset($_POST['pass_chng_submit']))
{
	ChangePass();
}
?>