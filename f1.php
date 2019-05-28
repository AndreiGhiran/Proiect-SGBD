<?php
 require_once "config.php";
 $username = $_POST['username'];
 $password = $_POST['password'];
if($username=="" || $password=="")
{
	echo '<!DOCTYPE html>
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

<h2>Introduceti un nume sau o parola</h2><br>
<h2>Autentificare </h2>
 <form action="f1.php">
  <input type="text" name="username" placeholder="Nume"><br>
  <input type="password" name="password" placeholder="Parola"><br><br>
  <input type="submit" value="Submit">
</form> 
<p><h2>Inregistrare</h2></p>
 <form action="f2.php">
  <input type="text" name="username" placeholder="Nume"><br>
  <input type="text" name="email" placeholder="Email"><br>
  <input type="text" name="telefon" placeholder="Teledfon"><br>
  <input type="password" name="password" placeholder="Parola"><br>
   <input type="password" name="passwordd" placeholder="Confirm Parola"><br><br>
  <input type="submit" value="Submit">
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


</html>';
}
else
{ 
$stid = oci_parse($conn, 'begin :code := login(:username, :password); end;');
        oci_bind_by_name($stid, ':password', $password);
        oci_bind_by_name($stid, ':code', $code);

        oci_execute($stid);
		if ($code >= 1){
            session_start();
                                    
            $_SESSION["loggedin"] = true;
            $_SESSION["user_id"] = $code;
			$_SESSION["password"]=$password;
            
            header("location: indexx.php");
        }elseif($code == 0){
			echo '<!DOCTYPE html>
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

<h2>Parola gresita</h2><br>
<h2>Autentificare </h2>
 <form action="f1.php">
  <input type="text" name="username" placeholder="Nume"><br>
  <input type="password" name="password" placeholder="Parola"><br><br>
  <input type="submit" value="Submit">
</form> 
<p><h2>Inregistrare</h2></p>
 <form action="f2.php">
  <input type="text" name="username" placeholder="Nume"><br>
  <input type="text" name="email" placeholder="Email"><br>
  <input type="text" name="telefon" placeholder="Teledfon"><br>
  <input type="password" name="password" placeholder="Parola"><br>
   <input type="password" name="passwordd" placeholder="Confirm Parola"><br><br>
  <input type="submit" value="Submit">
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


</html>';
        }elseif($code == -1){
			echo '<!DOCTYPE html>
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

<h2>Username gresit</h2><br>
<h2>Autentificare </h2>
 <form action="f1.php">
  <input type="text" name="username" placeholder="Nume"><br>
  <input type="password" name="password" placeholder="Parola"><br><br>
  <input type="submit" value="Submit">
</form> 
<p><h2>Inregistrare</h2></p>
 <form action="f2.php">
  <input type="text" name="username" placeholder="Nume"><br>
  <input type="text" name="email" placeholder="Email"><br>
  <input type="text" name="telefon" placeholder="Teledfon"><br>
  <input type="password" name="password" placeholder="Parola"><br>
   <input type="password" name="passwordd" placeholder="Confirm Parola"><br><br>
  <input type="submit" value="Submit">
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


</html>';
        }
    }

oci_close($conn);
?>