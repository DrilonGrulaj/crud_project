<!DOCTYPE html>
<html>
    <body>
        <?php
        require "crud_class.php";
        $edit = new crud_class();
        echo $edit->edit();
        ?>
        <button><a href="index.php">Back to the home page</a></button>
    </body>
</html>