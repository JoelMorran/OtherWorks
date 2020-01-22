<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Creat Order</title>

<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<div class = "banner">
Creat Order
</div>
<div class = "navbar">
<h1> Nav Bar</h1>
Current page: Creat Order
<br>

<br><a href = "assign.php" target = "_parent">Home</a><br>
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
<!--img src="RomanFlag.jpg" alt="Roman Flag" height="514" width="800" class = "pic"-->

<!--http://www.romanempirestore.com/P9150415_800x514.jpg-->

<?php

if(empty($_POST['name1']))
{
	?>
	<div class = "form" align = "center">
	<form method = "post">
	
	<br><br>Customer Information
	<br> Customer Name: &nbsp;
	<input name = "name1" placeholder = "Bob" required>
	<br><br>Order &nbsp;
	<br><br>
	<label for="sList">Product List</label><br>
	<select id="sList" name="fList" size="4" required>
	<?php
		$lines = file ('items.txt');
		natcasesort($lines);
		foreach($lines as $line_num => $line)
		{
			$line = trim($line);
			echo " <option value = '$line'> $line </option>";
		}
	
	?>
	
	</select>
	<br><br>Quantity &nbsp;
	
	<input type = "number" name = "quantity" min = "1" step = "1" value = "0" required >
	
	<br><br> Regular Customer &nbsp;
	<input type = "checkbox" name = "regularCustomer">
	
	
	<br>
	<br>
	<input type = "submit" value = "Show Order">
	<input type="reset">
	</form>
	</div>
	
	<?php
}
else
{
?>
<div class = "form2" align = "center">
<?php
	//include 'orderdetails.php';
	$parts = explode( " ", $_POST[ 'fList' ] );
$price = (double)($parts[1]);
$prodName = $parts[0];
$prodCity = $parts[2];


$total = $price * $_POST[ 'quantity' ];
$GST = $total * 0.10;
$total = $total + $GST;
$quantity = $_POST[ 'quantity' ];
echo "<br>Product Name: $parts[0]";
echo "<br>Product Price: $$price";
echo "<br>Product Quantity: $quantity<br>";

if(isset($_POST['regularCustomer']))
{
   $lines = file ('customerOrder.txt');
   $discountStatus1 = 0;
   foreach($lines as $line_num => $line)
   {
      $parts1 = explode( " ", $line);
      $var1 = $_POST[ 'name1' ];
      $var2 = $parts1[0];
		
      if(strcasecmp($var1, $var2) === 0)
      {
         $discountStatus1 = 1;
         $discount1 = $total * 0.10;
         $total = $total - $discount1; 
         echo "10% regular customer discount aplied.";
         echo "<br>";
         break;
      }
      
   }
   if($discountStatus1 == 0)
    {
       $discountStatus1 = 0;
       echo "10% regular customer discount NOT aplied.";
       echo "<br>";
       

    }
}
else if(!isset($_POST['regularCustomer']))
{
$discountStatus1 = 0;
   $lines = file ('customerOrder.txt');
   foreach($lines as $line_num => $line)
   {
      $parts1 = explode( " ", $line);
      $var1 = $_POST[ 'name1' ];
      $var2 = $parts1[0];

      if(strcasecmp($var1, $var2) === 0)
      {
         $discountStatus1 = 1;
         $discount1 = $total * 0.10;
         $total = $total - $discount1;
         echo
            "10% regular customer discount aplied.";
         echo
            "<br>";
         break;
      }
	  }
      if($discountStatus1 == 0)
      {

         $discountStatus1 = 0;
         echo "10% regular customer discount NOT aplied.";
         echo "<br>";
		 

      }
   }



if ( $_POST[ 'quantity' ] >= '100')
{
   $discountStatus2 = 1;
   $discount2 = $total * 0.10;
   $total = $total - $discount2;
   echo "10% Large order discount aplied.";
   echo "<br>";
}
else
{
   $discountStatus2 = 0;
   echo "10% Large order discount NOT aplied.";
   echo "<br>";
}
echo "10% GST Included in total.";
echo "<br>Total = $$total";

$customerName1 = $_POST['name1'];
$productName1 = $prodName;
$productPrice1 = $price;
$productCity1 = $prodCity;
$productQuantity1 = $quantity;
$totalCost1 = $total;
$fileName = "customerOrder.txt";
$fp = fopen( $fileName, "a" );
if ( !$fp )
{
   die ("Cannot open $fileName" );
}
else
{

   fwrite($fp, $customerName1.' ');
   fwrite($fp, $productPrice1.' ');
   fwrite($fp, $productName1.' ');
   fwrite($fp, $productCity1.' ');
   fwrite($fp, $productQuantity1.' ');
   fwrite($fp, $discountStatus1.' ');
   fwrite($fp, $discountStatus2.' ');
   fwrite($fp, $totalCost1.PHP_EOL);
   fclose($fp);

}

?>
<br>
<form>
<input type = "submit" value = "Return">
</form>
</div>
<?php
}
?>
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

