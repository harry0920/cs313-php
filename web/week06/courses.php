<?php
    require_once("dbConnect.php");
    $db = get_db();

    if(!isset($db)){
        die("DB Connection was not set");
    }

    $query = "SELECT id, name, number FROM course";
    $statement = $db->prepare($query);

    $statement->execute();

    $courses = $statement->fetchAll(PDO::FETCH_ASSOC);
   // $db->execute();

?>
<!DOCTYPE html>
<html>
   <head>
       <title>Courses</title>
   </head>
   <body>
   <h1>Courses</h1>

   <ul>
       <?php
            foreach ($courses as $course)
            {
                $name = $cours["name"];
                $number = $course["number"];

                echo"<li>$number - $name</li>";
            }

       ?>
   </ul>
   </body>
</html>
