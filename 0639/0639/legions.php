<!doctype html>
<html>
     <head>
          <title>Legions</title>

<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<div class = "banner">
Legions
</div>
<div class = "navbar">
<h1> Nav Bar</h1>
Current page: Legions
<br>
<br/>
<br><a href = "assign.php" target = "_parent">Home</a><br/>
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
     <form method = "post">
     <br><br>Legion Information
     <br> Legion Number: &nbsp;
     <input type = "text" name = "name1" placeholder = "Legion Number" required>
     <br>
     <input type = "submit" value = "Search Records">
     <br>
     <?php
     $lines = file ('legions.txt');
     //natcasesort($lines);
    $var3 = 0;
     if(!empty( $_POST[ 'name1' ] ) )
     {

foreach($lines as $line_num => $line)
{
   $parts = explode( ", ", $line);
   $var1 = $_POST[ 'name1' ];
   $var2 = $parts[0];
   

   
   if(strcasecmp($var1, $var2) === 0)
   {
   $var3 = 1;
   echo "<br>Legion Name: $parts[0] <br>City Name: $parts[1]<br> ";
      
   }
}
if( $var3 === 1)
{
}
else
{
   echo "<br>Legion does not exist.";
   }
   }

?>
</form>
<form action ="http://homepage.cs.latrobe.edu.au/jamorran/assignment/0639/customerOrderList.php">
<br>
<input type = "submit" value = "Clear" >
</form>
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

