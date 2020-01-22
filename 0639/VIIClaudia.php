<!doctype html>
<html>
     <head>
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <title>Legion: VII Claudia</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<div class = "banner">
Legion: VII Claudia
</div>
<div class = "navbar">
<h1> Nav Bar </h1>
Current page: Legion: VII Claudia
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
<img src="VIIClaudia.jpg" alt="VII Claudia" height="279" width="600" class = "pic">

<!--http://en.wikipedia.org/wiki/Legio_VII_Claudia-->
     <p>
	 "Legio septima Claudia Pia Fidelis (Seventh Claudian Legion) was a Roman legion. Its emblem, like that 
	 of all Caesar's legions, was the bull, together with the lion."
	 </p>
	 <p>
	 "The Seventh, the Sixth, the Eighth and the Ninth were all founded by Pompey in Spain in 65 BC. With the 
	 Eighth, Ninth, and Tenth legions, the Seventh was among the oldest units in the imperial Roman army. They 
	 were ordered to Cisalpine Gaul around 58 BC by Julius Caesar, and marched with him throughout the entire 
	 Gallic Wars. The Roman commander mentions the Seventh in his account of the battle against the Nervians, 
	 and it seems that it was employed during the expedition through western Gaul led by Caesar's deputy 
	 Crassus. In 56, the Seventh was present during the Venetic campaign. During the crisis caused by 
	 Vercingetorix, it fought in the neighborhood of Lutetia it must have been active at Alesia and it was 
	 certainly involved in the mopping-up operations among the Bellovaci."
	 </p>
	 <p>
	 "Legio VII was one of the two legions used in Caesar's invasions of Britain, and played a crucial role in 
	 the Battle of Pharsalus in 48 BC." 
	 </p>
	 <p>
	 "Tiberius Claudius Maximus the Roman soldier who brought the head of Decebalus to the emperor Trajan, was 
	 serving in Legio VII Claudia."
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

