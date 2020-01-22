<!doctype html>
<html>
     <head>
		 <meta http-equiv = "X-UA-Compatible" content = "IE=edge">	 
         <title>Bread</title>
         <link rel = "stylesheet" type = "text/css" href = "style.css">
	 </head>
	 <body>
		 <div class = "banner">
			 Bread
		 </div>
		 <div class = "navbar">
			 <h1> Nav Bar </h1>
			 Current page: Bread
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
			 <a href = "bread.php" title = "Bread" style = "background-image:url(Bread2.JPG);display:block;height:1070px;text-indent:-9999px;width:200px">Bread</a>
		 </div>
		 <br>
		 <div class = "main">
			 <img src="Bread5.jpg" alt="Bread" height="300" width="400" class = "pic">		 
			 <p>
				 Buy Roman Bread and support thr empire, Roman bread is a great source of fiber and will help 
				 you get trought the day. 
			 </P>
			 <p>
				 Buy Roman Bread Today!!!!!
			 </p>
			 <br> 
			 <h2>Comments</h2>
			 <div class = "commentboxdisplay">
				 <?php
					 if(isset($_POST['name1']) && isset($_POST['comment']))
					 {					 
						 $name = $_POST['name1'].PHP_EOL;
						 $comment = $_POST['comment'].PHP_EOL.PHP_EOL;
						 $fileName = "comments.txt";
						 $fp = fopen( $fileName, "a" );
						 if (!$fp)
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
				 <form method = "post">
					 <input type = "text"  name = "name1" placeholder = "Username" required>
					 <br>
					 <textarea type = "text"  name = "comment" placeholder = "Comment" rows = "4" style = "width: 99%" required></textarea>
					 <br>
					 <input type = "submit" value = "Submit Comment">
					 <input type = "reset">		 
				 </form>
				 <br>
			 </div>			 
			 <div class = "hitcount" align = "center">
				 <?php			 
					 $fileName = "count.txt";
					 $fp = fopen( $fileName, "r" );
					 if (!$fp)
					 {
						 die("Cannot open $fileName" );
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