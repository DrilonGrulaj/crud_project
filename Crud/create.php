<!DOCTYPE html>
<html>
    <body>
    <?php
        require "crud_class.php";
        $insert = new crud_class();
        ?>
        <form method="post" action="<?php $insert->insert();?>">
            <input type="hidden" name="posts_id">
            <input type="text" placeholder="Enter your title here" name="title" size="50" required>
            <input type="text" placeholder="Enter your description/post here" name="description"  size="50" required>
            <input type="submit" value="submit" name="submit_value">
        </form>

    </body>
</html>