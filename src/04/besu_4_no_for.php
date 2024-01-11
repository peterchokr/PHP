<?php
    $count = 0;
    for ($i = 500; $i <= 700; $i++)
    {
      if($i %4 != 0)
      {
          echo $i." ";
          $count++;

          if ($count % 10 == 0)
            echo "<br>";
      }
    }
?>


