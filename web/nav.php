<ul id="menu">
        <li><a href="index.php">Home</a></li>
        <li>
            <a href="week02/about.php">About</a>
        </li>
        <li>
            <a href="#">Categories ￬</a>
            <ul class="hidden">
                <?php

                    $dbUrl = getenv('DATABASE_URL');

              $dbopts = parse_url($dbUrl);

              $dbHost = $dbopts["host"];
              $dbPort = $dbopts["port"];
              $dbUser = $dbopts["user"];
              $dbPassword = $dbopts["pass"];
              $dbName = ltrim($dbopts["path"],'/');

              $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

              $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              foreach ($db->query('SELECT * FROM categories') as $row)
              {
                  echo "<li><a href=\"category.php/id=".$row['id']."\">".$row['categoryName']."</a></li>";
              }
                ?>

            </ul>
        </li>
        <li>
            <a href="week02/assignments.php">Assignments  ￬</a>
            <ul class="hidden">
                <li><a href="#">Assignment1</a></li>
                <li><a href="#">Assignment2</a></li>
                 <li><a href="~/week03/prove/browse.php">Assignment3</a></li>
                 <li><a href="#">Assignment4</a></li>
                 <li><a href="~/week05/prove/index.php">Assignment5</a></li>
                 <li><a href="/shoes/">SHOES</a></li>
                
            </ul>
        </li>
        <li><a href="contact.php">Contact</a></li>
</ul>