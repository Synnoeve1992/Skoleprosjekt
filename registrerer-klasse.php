<?php /* registrerer-klasse */
/*
/* programmet lager et html-skjema for å registrere studium
/* programmet registrerer data (klasse, vis alle klasser og slett klasser) i databasen
*/
?>

<h1>Registrer klasse </h1>

<form method="post" action="" id="registrerklassekode" name="registrerklassekode"> 
  klassekode <input type="text" id="klassekode" name="klassekode" required /> <br/> 
  klassenavn <input type="text" id="klassenavn" name="klassenavn" required /> <br/>
studiumkode <input type="text" id="studiumkode" name="studiumkode" required /> <br/>
  <input type="submit" value="Registrer klasse" id="registrerklassekodeKnapp" name="registrerstudiumKnapp" />  
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br /> 
</form> 

<?php  
  if (isset($_POST ["registrerklasseKnapp"]))  
    { 
      $studiumkode=$_POST ["studiumkode"]; 
      $studiumnavn=$_POST ["studiumnavn"];
      $studiumkode=$_POST ["studiumkode"]; 
 
      if (!$klassekode || !$klassenavn || !$studiumkode ) 
        { 
          print ("Alle felt m&aring; fylles ut");  
        } 
      else 
        { 
          include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */ 
 
          $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';"; 
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen"); 
          $antallRader=mysqli_num_rows($sqlResultat);  
 
          if ($antallRader!=0)  /* studiet er registrert fra før */ 
            { 
              print ("Studiet er registrert fra f&oslashr"); 
            } 
          else 
            { 
              $sqlSetning="INSERT INTO klasse (klassekode,studiumkode) 
                VALUES('$klassekode','$klassenavn','$studiumkode');"; 
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen"); 
                /* SQL-setning sendt til database-serveren */ 
 
              print ("F&oslash;lgende klasse er n&aring; registrert: $klassekode $klassenavn $studiumkode"); 
            } 
        } 
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