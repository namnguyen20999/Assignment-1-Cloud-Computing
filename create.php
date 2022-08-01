<?php require_once 'crud_function.php'?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
    <body>
        <h1>Adding new data into CSV file</h1>
        <form method="post">
        <?php 
            createCSV();
        ?>
        <button type="submit">Submit</button>
        </form>
    </body>
</html>