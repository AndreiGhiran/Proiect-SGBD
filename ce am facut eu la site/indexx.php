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

<li><a href="indexx.html"> Acasa</a></li>
<li><a href="p11.html"> Programari</a></li>
<li><a href="p22.html"> Cauta</a></li>
<li><a href="p33.html">Cont</a></li>
<li><a href="p44.html"> Contact</a></li>

</ul>


</nav>

<aside>


<h2>Schimba parola </h2>
 <form action="#f4.php">
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

if(isset($_POST['submit']))
{
	LogOut();
}
?>