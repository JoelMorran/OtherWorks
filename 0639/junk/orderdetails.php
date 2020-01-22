<!doctype html>
<html>
<head>
<title>  </title>
</head>
<body>
<?php
if( empty( $_POST[ 'name1' ] ) )
{
   echo "You must enter a name";
}
else
{
   $name1 = $_POST[ 'name1' ];
   echo "Order for Customer: $name1 <br>";
}


if( !isset( $_POST[ 'fList' ] ) )
{
   echo "<br><br>You must select at least one item";
   echo "<br>";
}
else
{
   echo "Order";
   echo "<br>";
   $sList = $_POST[ 'fList' ];
}
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
      else
      {
         $discountStatus1 = 0;
         echo "10% regular customer discount NOT aplied.";
         echo "<br>";
         break;

      }
   }
}
else if(!isset($_POST['regularCustomer']))
{
   $lines = file ('customerOrder.txt');
   foreach($lines as $line_num => $line)
   {
      $parts1 = explode( " ", $line);
      $var1 = $_POST[ 'name1' ];
      $var2 = $parts1[0];

      if(strcasecmp($var1, $var2) === 0)
      {
         $discountStatus1 = 1;
         $discount1 = $total *
            0.10;
         $total = $total - $discount1;
         echo "10% regular customer discount aplied.";
         echo "<br>";
         break;
      }
      else
      {
         $discountStatus1 = 0;
         echo "10% regular customer discount NOT aplied.";
         echo "<br>";

      }
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
<form
action="http://homepage.cs.latrobe.edu.au/jamorran/assignment/0639/orderProduct.php">
<input type = "submit" value = "Return">
</form>
</body>
</html>

