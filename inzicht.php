<!-- DB connectie? -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uren registratie systeem</title>
</head>
<body>
	<div>
		<div>
    			<?php
                try {
                        
                        foreach($dbh->query('SELECT * from entity where `author` == "$username"') as $row) {
                            $content = $row;
                            $begin = new DateTime($content[2]);
                            $eind = new DateTime($content[3]);
                            $tottijd = date_diff($begin,$eind);
                            echo '
                                <div class="Logboek">
                                    <p>' . $content[1] . '</p> author
                                    <p>' . $content[6] . '</p> datum
                                    <p>' . $content[2] . '</p> begin tijd
                                    <p>' . $content[3] . '</p> eind tijd
                                    <p>' . $tottijd->format('%h:%i:%s') . '</p> totale tijd
                                    <p>' . $content[4] . '</p> bezigheid
                                    <p>' . $content[5] . '</p> comments

                                    
                                </div>
                            ';    
                            
                        }

                    } catch (PDOException $e) {
                        print "Error!: " . $e->getMessage() . "<br/>";
                        die();
                    }
            ?>
        </div>
    </div>
</body>
</html>