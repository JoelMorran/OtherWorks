<!-- 
     This file is called product.php

     So what we will do is just put the whole line into the
     drop down select list.

     Later we will take a selction from the list and explode that
     to extract the price.

     That is in another file - parts.php
-->
<!doctype html>
<html>
     <head>
          <title>Product File Reading Example  </title>
     </head>
     <body>
       <fieldset>
          <legend>Product List</legend>
          <label for = "pList">List of Products</label>
          <br>
          <select id = "pList" name = "prodList" size = "4">
          <?php
             $fin = fopen("product.txt", "r");
             if( !$fin )
             {
                   echo "Unable to open \"product.txt\" !!";
                   fwrite( STDERR, "An error occurred opening file\n");
                   exit( 1 );
             }

             // if we get here then the file is open
             // first read a line from the file
             while( $line = fgets( $fin ) )
             {
                 // now use PHP echo the html code to add an option
                 // to the list.
                 
                 echo "<option>$line</option>";

                 // So its as though we typed in the HTML ourselves.
             }
            ?>
           </select>
       </fieldset>
     </body>
</html>

