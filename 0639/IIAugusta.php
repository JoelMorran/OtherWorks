<!doctype html>
<html>
     <head>
		 <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
         <title>Legion: II Augusta</title>
		 <link rel = "stylesheet" type = "text/css" href = "style.css">
	 </head>
	 <body>
		 <div class = "banner">
			 Legion: II Augusta
		 </div>
		 <div class = "navbar">
			 <h1> Nav Bar </h1>
			 Current page: Legion: II Augusta
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
		 <br>
		 <div class = "banner4">
			 <a href = "bread.php" title = "Bread" style = "background-image:url(Bread2.JPG);display:block;height:1070px;text-indent:-9999px;width:200px">Bread</a>
		 </div>
		 <br>
		 <div class = "main">
			 <img src = "IIAugusta.JPG" alt = "II Augusta" height = "600" width = "800" class = "pic">			 
			 <!--http://en.wikipedia.org/wiki/Legio_II_Augusta-->			 
			 <p>
				 "Legio secunda Augusta (Second Augustan Legion), was a Roman legion, levied by Gaius Vibius Pansa 
				 Caetronianus in 43 BC. Its emblems were the Capricornus, Pegasus and Mars."
			 </P>
			 <p>
				 "II Augusta was originally raised by Octavian and consul Gaius Vibius Pansa Caetronianus in 43 BC, 
				 to fight against Mark Antony, II Augusta fought in the battle of Philippi and in the battle of Perugia."
			 </p>
			 <p>
				 "At the beginning of Augustus rule, in 25 BC, this legion was relocated in Hispania, to fight in the 
				 Cantabrian Wars, which definitively established Roman power in Hispania, and later camped in Hispania 
				 Tarraconensis. With the annihilation of Legio XVII, XVIII and XIX in the Battle of the Teutoburg Forest
				 (AD 9), II Augusta moved to Germania, possibly in the area of Mainz. After 17, it was at Argentoratum."
			 </p>
			 <p>
				 "The legion participated in the Roman conquest of Britain in 43. Future emperor Vespasian was the legion's 
				 commander at the time, and led the campaign against the Durotriges and Dumnonii tribes. Although it was 
				 recorded as suffering a defeat at the hands of the Silures in 52, the II Augusta proved to be one of the 
				 best legions, even after its disgrace during the uprising of queen Boudica, when its praefectus castrorum, 
				 who was then its acting commander (its legatus and tribunes probably being absent with the governor 
				 Suetonius Paulinus), contravened Suetonius' orders to join him and so later committed suicide."
			 </p>
			 <p>
				 "After the defeat of Boudica, the legion was dispersed over several bases; from 66 to around 74 it was 
				 stationed at Glevum, and then moved to Isca Augusta, building a stone fortress that the soldiers occupied."
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
						 $fp = fopen( $fileName, "a");
						 if (!$fp)
						 {
							 die ("Cannot open $fileName");
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
					 $fp = fopen($fileName, "r");
					 if (!$fp)
					 {
						 die("Cannot open $fileName");
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