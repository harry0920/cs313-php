<!DOCTYPE html>
<html lang="en">
    
    <body>
        <?php

                for($i = 0; $i < 10; $i++){

                    if($i%2 != 0) {
                        echo "<div id=$i style='color:red;'> DIV $i</div>";
                    }
                    else{
                        echo "<div id=$i> DIV $i </div>";
                    }
                }
        
        ?>
    </body>
    
</html>
