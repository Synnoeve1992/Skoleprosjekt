<?php  /* slett-klasse */ 
/* 
/*  Programmet lager et skjema for å kunne slette en klasse 
/*  Programmet sletter den valgte klassen 
*/ 
?>  
 
<script src="funksjoner.js"> </script> 
 
<h3>Slett klasse</h3> 
 
<form method="post" action="" id="slettklasseSkjema" name="slettklasseSkjema" onSubmit="return bekreft()"> 
  klassekode <input type="text" id="klassekode" name="klassekode" required /> <br/> 
<input type="submit" value="Slett klasse" name="slettklasseKnapp" id="slettklasseKnapp" />  
</form> 
 
<?php 
  if (isset($_POST ["slettklasseKnapp"]))  
    { 
      include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */ 
    
      $klassekode=$_POST ["klassekode"]; 
   
      $sqlSetning="DELETE FROM studium WHERE klassekode='$klassekode';"; 
      mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen"); 
        /* SQL-setning sendt til database-serveren */ 
   
      print ("F&oslash;lgende studium er n&aring; slettet: $klassekode  <br />"); 
    } 
   
?> 
<h1>Brukerfunksjoner</h1>
<ul>
    <li><a href="registrerer-klasse.php" target="_blank">Registrerer klasse</a></li>
    <li><a href="vis-alle-klasser.php" target="_blank">Vis alle klasser</a></li>
    <li><a href="slett-klasse.php" target="_blank">Slett klasse </a></li>

    <li><a href="registrerer-student.php" target="_blank">Registrer student </a></li>
    <li><a href="vis-alle-studenter.php target="_blank>Vis alle studenter</a></li>
    <li><a href="Slett-student.php" target="_blank">Slett student </a></li>
</ul>
<h3>&nbsp;</h3>