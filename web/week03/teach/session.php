<?php
session_start();

if(isset($_SESSION["Counter"])){
    $_SESSION["Counter"]++;
}
else{
    $_SESSION["Counter"] = 1;
}

$counter = $_SESSION["Counter"];
?>
<html>
<body>
<?php

    echo "Counter: $counter";

?>
</body>
</html>


