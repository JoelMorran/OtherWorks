<!doctype html>
<html>
     <head>
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <title>Legion: XX Valeria Victrix</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<div class = "banner">
Legion: XX Valeria Victrix
</div>
<div class = "navbar">
<h1> Nav Bar </h1>
Current page: Legion: XX Valeria Victrix
<br>
<br><a href = "assign.php" target = "_parent">REMOPAL-Home</a><br>
<br><a href = "currentEmperor.php" target = "_parent">Current Emperor</a><br>
<br><a href = "bread.php" target = "_parent">Bread</a><br>
<br><a href = "orderProduct.php" target = "_parent">Creat Order</a><br>
<br><a href = "customerOrderList.php" target = "_parent">Customer Order History</a><br>
<br><a href = "newProduct.php" target = "_parent">New Product</a><br>
<br><a href = "legions.php" target = "_parent">Legions</a><br>
<br><a href = "references.php" target = "_parent">References</a><br>
</div>
<br>
<div class = "banner4">
<a href="bread.php" title="Bread" 
style="background-image:url(Bread2.JPG);display:block;height:1070px;text-indent:-9999px;width:200px">
Bread</a>
</div>
<br>
<div class = "main">
<img src="XXValeriaVictrix.jpg" alt="XX Valeria Victrix" height="600" width="463" class = "pic">

<!--http://en.wikipedia.org/wiki/Legio_XX_Valeria_Victrix-->
     <p>
	 "Legio vigesima Valeria Victrix (Twentieth Victorious Valerian Legion) was a Roman legion, raised by 
	  Augustus some time after 31 BC. It served in Hispania, Illyricum, and Germania before participating in 
	  the invasion of Britannia in 43 AD. The legion, which had a boar as its emblem, was based at the fortress
	  of Deva Victrix."
	  </p>
	  <p>
	  "XX Valeria Victrix was part of the great army that campaigned against the Cantabrians in Hispania 
	  Tarraconensis from 25 to 13 BC."
	  </p>
      <p>
      "The legion then moved to Illyricum, and is recorded in the army of Tiberius operating against the 
	  Marcomanni in AD 6. From there, they were withdrawn to fight the Pannonian uprising. In Illyria they were
	  led by the governor of Illyricum Marcus Valerius Messalla Messallinus, who may have given his clan (gens)
	  name Valeria to the legion. Although understrength, they managed to defeat the rebels led by Bato of the
	  Daesitiates."
	  </p>
      <p>
      "In one battle the legion cut through the enemy lines, was surrounded, and cut its way out again."
	  </p>
      <p>
      "After the disaster of Varus in AD 9, XX Valeria Victrix moved to Germania Inferior and was based at 
	  Oppidum Ubiorum, then moved to Novaesium at the site of modern Neuss during Tiberius' reign."
	  </p>
      <p>
      "The legion was one of the four with which Claudius invaded Britain in 43. It was also one of the two 
	  legions that defeated Caratacus at the Battle of Caer Caradoc, after which, from the AD 50s, it was 
	  encamped at Camulodunum, with a few units at Kingsholm in Gloucester and a garrison at Wroxeter. In AD 60
	  or 61 the XX helped put down the revolt of queen Boudica, after having routed the Ordovice by crossing 
	  Menai Strait in Wales to destroy the Druids sacred groves in 58."
	  </p>
      <p>
      "In the year of the four emperors, the legion sided with Vitellius. Some units went with him to Rome. In
	  AD 78–84, the legion was part of Gnaeus Julius Agricola's campaigns in northern Britania and Caledonia, 
	  and built the base at Inchtuthil. In AD 88 the legion returned south and occupied Castra Devena."
	  </p>
      <p>
      "The Twentieth was among the legions involved with the construction of Hadrian's Wall, and the discovery
	  of stone altars commemorating their work in Caledonia suggests that they had some role in building the 
	  Antonine Wall."
	  </p>
<br> 
<h2>Comments</h2>
<div class = "commentboxdisplay">
<?php
if(isset( $_POST['name1']) && isset( $_POST['comment']))
{

   $name = $_POST['name1'].PHP_EOL;
   $comment = $_POST['comment'].PHP_EOL.PHP_EOL;
   $fileName = "comments.txt";
   $fp = fopen( $fileName, "a" );
   if ( !$fp )
   {
      die ("Cannot open $fileName" );
   }
   else
   {

      fwrite($fp, '<div class = comment2>');
      fwrite($fp, $name);
      fwrite($fp, '<br>');
      fwrite($fp, $comment);
      fwrite($fp, '<br>');
      fwrite($fp, '</div>');
      fclose($fp);

   }

}
echo file_get_contents ("comments.txt");
?>
</div>
<br>
<div class = "commentbox">


<form method = "post" >
<input type = "text"  name = "name1" placeholder = "Username" required>
<br>
<textarea type = "text"  name = "comment" placeholder = "Comment" rows = "4" style = "width: 99%" required>
</textarea>
<br>
<input type = "submit" value = "Submit comment">
<input type = "reset">

</form>
<br>
</div>

<div class = "hitcount" align = "center">
<?php

$fileName = "count.txt";
$fp = fopen( $fileName, "r" );
if ( !$fp )
{
   die ("Cannot open $fileName" );
}
else
{
   $value = fgets($fp);
   fclose($fp);
   $value++;
}
$fp = fopen("count.txt", "w");
fwrite($fp, $value);
fclose($fp);

echo $value;

?>
</div>
</div>
     </body>
</html>

