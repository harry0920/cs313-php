<!DOCTYPE html>
<html lang="en">
    
    <body>
        <?php


                if(ifset($URL["username"])){
                    echo "Welcome $url['username']";
                }
                for($i = 0; $i < 10; $i++){

                    if($i%2 == 0) {
                        echo "<div id=$i style='color:red;'> DIV $i</div>";
                    }
                    else{
                        echo "<div id=$i> DIV $i </div>";
                    }
                }

        ?>
    </body>
    
</html>
