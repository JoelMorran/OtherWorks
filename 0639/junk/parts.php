<!--
    This file is called parts.php and is the "action"
    file for listFromFile01.php

    Note that we are using PHP echo statements to write the
    HTML parts that are displayed.

    There are times where we need " as part of the HTML.
    We have to escape the " so that PHP does not think that
    it is the end of the echo statement.

    We escape the " by putting a \ in front of them, the whole
    thing becomes \" which tells PHP that the " are doing a 
    different job from their normal start and end job.
    That other job is just to be a " character and that is
    what is printed (echo).

    Exactly the same thing works in C, Java, C++ and many other
    computer languages.
-->
<!doctype html>
<html>
     <head>
          <title>Parts  </title>
          <?php
             // just get the whole line passed over when
             // the user selects something from the list
             // in listFromFile01.php

             $line = $_POST[ 'fList' ];
          ?>
     </head>
     <body>
        <h1>Parts</h1>
        <br>
        <?php
           // now we need to use the PHP explode function to
           // split the line into its individual parts.
           // The first bit of the explode function is the
           // separator. That is, how are the individual parts
           // separated on the line. In this case by a space

           // The second bit is the variable that has the line
           // to split, in this case, $line

           // $parts has all the bits. To access each bit, use the
           // [ ] after $parts and put in the number of the bit you
           // want. Start counting from 0 for the first bit,
           // 1 for the second bit and so on.

           $parts = explode( " ", $line );
           
           echo "<label for = \"part1\">First Part&nbsp;</label>";
           echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
           echo "<input id = \"part1\"";
           echo " name = \"firstPart\" value = $parts[0]></input>";
           echo "<br>";
           // cast the text into int, as we did in the hit counter
           $num = (int)($parts[1]);
           echo "<label for = \"part2\">The number&nbsp;</label>";
           echo "<input id = \"part2\"";
           echo " name = \"numPart\" value = $num></input>";
           echo "<br>";
         ?>
        <br>
     </body>
</html>

