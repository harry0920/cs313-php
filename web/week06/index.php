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

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          // The request is using the POST method

          $book = $_POST['book'];
          $chapter = $_POST['chapter'];
          $verse = $_POST['verse'];
          $content = $_POST['content'];

       //   echo $book.$chapter.$verse.$content;

          $sql =  'INSERT INTO scriptures (book,chapter,verse,content) VALUES (:book, :chapter, :verse,:content)';



          $stmt = $db->prepare($sql);

          $stmt->bindValue(':book', $book, PDO::PARAM_STR);
          $stmt->bindValue(':chapter', $chapter, PDO::PARAM_INT);
          $stmt->bindValue(':verse', $verse, PDO::PARAM_INT);
          $stmt->bindValue(':content', $content, PDO::PARAM_STR);


          $stmt->execute();

          echo 'After Execute';
          $rowsChanged = $stmt->rowCount();
          $stmt->closeCursor();

          echo 'After closing';

          if($rowsChanged > 0)
          {
            echo 'Rows Inserted';
          }
          else{
              echo "Something Went wrong";
          }



      }


      $sql = 'SELECT * FROM scriptures';
      $stmt = $db->prepare($sql);
     // $stmt->bindValue(':book', $book, PDO::PARAM_STR);

      $stmt->execute();
      $rowsChanged = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

           <input type="submit" Value="Submit">
       </form>
   </body>
</html>
