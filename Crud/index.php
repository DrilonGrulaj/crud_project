<!DOCTYPE html>
<html>
    <body>
    <button><a href="create.php">Create a Post</a></button>
    <hr>
        <form method="POST">
       <?php
      require "crud_class.php";
      $store = new crud_class();
       $store->store();
       ?>
        </form>
    </body>
</html>