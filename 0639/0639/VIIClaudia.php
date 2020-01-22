<!doctype html>
<html>
     <head>
          <title>Legion: VII Claudia</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<div class = "banner">
Product Order
</div>
<div class = "navbar">
<h1 {font-size:250%}> Nav Bar
</h1>
Current page: Legion: VII Claudia
<br>
<br/>
<br><a href = "assign.php" target = "_parent">REMOPAL-Home</a><br/>
<br><a href = "currentEmperor.php" target = "_parent">Current Emperor</a><br/>
<br><a href = "bread.php" target = "_parent">Bread</a><br/>
<br><a href = "orderProduct.php" target = "_parent">Creat Order</a><br/>
<br><a href = "customerOrderList.php" target = "_parent">Customer Order History</a><br/>
<br><a href = "newProduct.php" target = "_parent">New Product</a><br/>
<br><a href = "legions.php" target = "_parent">Legions</a><br/>
<br><a href = "references.php" target = "_parent">References</a><br/>
</div>
<div class = "banner4">
this is for ads
</div>
<br>
<div class = "main">
<!--img src="RomanFlag.jpg" alt="Roman Flag" height="514" width="800" class = "pic"-->

<!--http://www.romanempirestore.com/P9150415_800x514.jpg-->
     <div class = "form" align = "center">
     
	 
	 
	 </div>
<br> 
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
main area end
<br>
</div>
<br>
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
<input type = "text"  name = "name1" placeholder = "Username">
<br>
<textarea type = "text"  name = "comment" placeholder = "Comment" rois = "4" cols = "59" >
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
     </body>
</html>

