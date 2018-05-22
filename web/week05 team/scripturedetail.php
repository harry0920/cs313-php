<!DOCTYPE html>
<html>
   <head>
       <title>Scripture Detail</title>
   </head>
   <body>
   <h1>Scripture Detail</h1>
      <?php
      $dbUrl = getenv('DATABASE_URL');

      $dbopts = parse_url($dbUrl);

      $dbHost = $dbopts["host"];
      $dbPort = $dbopts["port"];
      $dbUser = $dbopts["user"];
      $dbPassword = $dbopts["pass"];
      $dbName = ltrim($dbopts["path"],'/');

      $id = $_GET['id'];

      //echo $book;

      $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'SELECT * FROM scriptures where id = :id';
      $stmt = $db->prepare($sql);
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);

      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stmt->closeCursor();

      //echo 'after the databse query';
      // var_dump($rows);

      foreach ($rows as $row)
      {
          echo "<b>".$row['book']." ".$row['chapter'].":".$row['verse']."</b>"."\"".$row['content'].".\"";
          echo '<br/>';
      }


      ?>
   </body>
</html>
