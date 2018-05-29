<!DOCTYPE html>
<html>
   <head>
       <title>First Results</title>
   </head>
   <body>
   <h1>Scripture Results</h1>
      <?php
      $dbUrl = getenv('DATABASE_URL');

      $dbopts = parse_url($dbUrl);

      $dbHost = $dbopts["host"];
      $dbPort = $dbopts["port"];
      $dbUser = $dbopts["user"];
      $dbPassword = $dbopts["pass"];
      $dbName = ltrim($dbopts["path"],'/');

      $book = "John";
      $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'SELECT * FROM scriptures where book = :book';
      $stmt = $db->prepare($sql);
      $stmt->bindValue(':book', $book, PDO::PARAM_STR);

      $stmt->execute();
      $rowsChanged = $stmt->rowCount();
      $stmt->closeCursor();


      foreach ($rowsChanged as $row)
      {
        echo "<b>".$row['book']." ".$row['chapter'].":".$row['verse']." - </b>"."\"".$row['content'].".\"";
        echo '<br/>';
      }
       ?>

       <form action="index.php" method="post">
         Book:
         <input type="text" name="book"><br>
         Chapter:
         <input type="text" name="chapter"><br>
         Verse:
         <input type="text" name="verse"><br>
         Content:<br>
         <textarea type="text" name="content"></textarea><br>
       </form>
   </body>
</html>
