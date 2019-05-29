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
 <form action="p44.php">
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
<h3> Contact </h3>
<br>
<h2>Caloian Andrei George -andrei.caloian@uaic.ro<br>
Ghiran Andrei -andrei.ghiran@uaic.ro</h2>
</section>

</main>

</body>


</html>
<?php
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
?>