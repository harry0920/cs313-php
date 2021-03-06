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

      $book = $_POST['book'];

      //echo $book;

      $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'SELECT * FROM scriptures where book = :book';
      $stmt = $db->prepare($sql);
      $stmt->bindValue(':book', $book, PDO::PARAM_STR);

      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stmt->closeCursor();

      //echo 'after the databse query';
      // var_dump($rows);

      foreach ($rows as $row)
      {
          echo "<a href=\"scripturedetail.php?id=".$row[id]."\">";
          echo "<b>".$row['book']." ".$row['chapter'].":".$row['verse']."</b>";
          echo '</a>';
          echo '<br/>';
      }

       ?>
   </body>
</html>
