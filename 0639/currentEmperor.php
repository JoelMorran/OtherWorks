<!doctype html>
<html>
	 <head>
		 <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
		 <title>Current Emperor</title>
		 <link rel = "stylesheet" type = "text/css" href = "style.css">
	 </head>
	 <body>
		 <div class = "banner">
			 Current Emperor: Publius Aelius Hadrianus Buccellanus
		 </div>
		 <div class = "navbar">
			 <h1> Nav Bar </h1>
			 Current page: Current Emperor
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
			 <img src = "Hadrian5" alt = "Roman Flag" height = "852" width = "854" class = "pic">		 
			 <p>
				 "Hadrian was born Publius Aelius Hadrianus to an ethnically Italian family,
				 either in Italica or in Rome on the 24 January 76AD. His 
				 predecessor Trajan was a maternal cousin of Hadrian's father. Trajan never
				 officially designated an heir, but according to his wife Pompeia Plotina, Trajan
				 named Hadrian emperor immediately before his death. Trajan's wife and his friend
				 Licinius Sura were well-disposed towards Hadrian, and he may well have owed his
				 succession to them. He became Emperor on the 10 August 117 and has been Emperor
				 for 8 years."
			 </p>
			 <!--http://en.wikipedia.org/wiki/Hadrian#Emperor_.28117.29-->   
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
						 if ( !$fp )
						 {
							 die("Cannot open $fileName" );
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
					 echo file_get_contents("comments.txt");
				 ?>
			 </div>
			 <br>
			 <div class = "commentbox">			 
				 <form method = "post" >
					 <input type = "text"  name = "name1" placeholder="Username" required>
					 <br>
					 <textarea name = "comment" placeholder = "Comment" rows = "4" style = "width: 99%" required></textarea>
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
					 if ( !$fp )
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