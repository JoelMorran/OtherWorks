<!--
    This file is called listFromFile.php
    It is a small example of how to create a drop down list
    from a text file.

    Read one line from the text file and that becomes the
    <option></option>
    in the list.
-->
<!doctype html>
<html>
     <head>
          <title>list from reading a file in PHP  </title>
     </head>
     <body>
        <label for = "sList">List from file</label>
        <br>
        <select id = "sList" name = "fList" size = "4">
        <?php
           // try to open the text file
           $fin = fopen( "items.txt", "r");
           if( !$fin )
           {
              echo "unable to open \"items.txt\"<br>";
              die;
           }

           // if we get to here then the text file is open
           // while we can read a line from the file
           while( $line = fgets( $fin ) )
           {
              // make the line an option in the select list
              echo "<option value = \"$line\">$line</option>";
           }

           // now make sure to close the file
        ?>
        </select>
     </body>
</html>

