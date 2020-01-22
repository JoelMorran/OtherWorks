<!--
    This file is called listFromFile01.php
    It is a small example of how to create a drop down list
    from a text file.

    Read one line from the text file and that becomes the
    <option></option>
    in the list.

    This file extends the original example by calling another PHP
    file - parts.php - which displays the line in its individual parts

    Note that other than making this a form and supplying the submit
    and reset buttons there is nothing more to add to this file

    The work is done by the parts.php file

-->
<!doctype html>
<html>
     <head>
          <title>list from reading a file in PHP  </title>
     </head>
     <body>
         <form method = "post" action = "parts.php">
        <label for = "sList">List from file</label>
        <br>
        <select id = "sList" name = "fList" size = "4">
        <?php
           // try to open the text file
           $fin = fopen( "items.txt", "r");
           if( !$fin )
           {
              echo "unable to open \"items.txt\"<br>";
              fwrite(STDERR, "An error occurred trying to open file\n");
              exit( 1 );
           }

           // if we get to here then the text file is open
           // while we can read a line from the file
           while( $line = fgets( $fin ) )
           {
              // make the line an option in the select list

              echo "<option value = \"$line\">$line</option>";

              // once again, we are getting the PHP echo function
              // to "write" the HTML code
           }

           // now make sure to close the file
           fclose( $fin );
        ?>
        </select>
        <br>
        <br>
        <input type = "submit" value = "Process order"></input>
        <br>
        <br>
        <input type = "reset" value = "Cancel order"></input>
        <br>
        </form>
     </body>
</html>

