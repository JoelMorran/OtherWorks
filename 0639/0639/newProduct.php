<!doctype html>
<html>
<head>
<title>New Product</title>

<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<div class = "banner">
Product Order
</div>
<div class = "navbar">
<h1> Nav Bar
</h1>
Current page: Order Product
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

<?php

if(!empty( $_POST['productName1']) && !empty( $_POST['productPrice1']) && !empty( $_POST['productCity1']))
{

   $productName1 = $_POST['productName1'];
   $productPrice1 = $_POST['productPrice1'];
   $productCity1 = $_POST['productCity1'].PHP_EOL;
   $fileName = "items.txt";
   $fp = fopen( $fileName, "a" );
   if ( !$fp )
   {
      die ("Cannot open $fileName" );
   }
   else
   {

      fwrite($fp, $productName1.' ');
      fwrite($fp, $productPrice1.' ');
      fwrite($fp, $productCity1);
      fclose($fp);

   }

}
?>
<div class = "form" align = "center">
<form method = "post">

<br><br>Product Information
<br> Product Name: &nbsp;
<input type = "text" name = "productName1" placeholder = "Bread" required >
<br><br>
Product Price: &nbsp;
<input type = "number" name = "productPrice1" min = "0.001" step = "0.001"  placeholder = "0.15" required>
<br><br>
Product City: &nbsp;
<select id = "dBox" name = "productCity1" required>
<?php
$fin = fopen( "citys.txt", "r");
if( !$fin )
{
   echo "unable to open \"citys.txt\"";
   fwrite(STDERR, "An error occurred trying to open file\n");
   exit( 1 );
}
while($line = fgets($fin))
{
   echo " <option value = '$line'> $line </option>";
}
fclose( $fin );

?>
</select>
<br>
<br>

<input type = "submit" value = "Add New Item">
<input type="reset">
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
<textarea type = "text"  name = "comment" placeholder = "Comment" rows = "4" cols = "59" >
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

