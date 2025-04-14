<?php
class crud_class{

   public function insert(){
    require "class_database.php";
    $conn = new Database();
    if($conn){
        $results = mysqli_connect("localhost", "root", "", "project_db");
            if(isset($_POST["title"]) && $_POST["description"]){
            $title = mysqli_real_escape_string($results, $_POST["title"]);
            $description = mysqli_escape_string($results, $_POST["description"]);

            $query = "INSERT INTO project_posts (title_text, description_text) VALUES ('$title', '$description')";
            $query_run = mysqli_query($results, $query);
                if($query_run){
                   header("Location: index.php");   
                }
            }
    }
    else{
        echo "The entered values can not be inserted into the database!";
        }
    }

    public function store(){
        require "class_database.php";
        $query = "SELECT * FROM project_posts";
        
        $result = mysqli_connect("localhost", "root", "", "project_db");
        $query_run = mysqli_query($result, $query);
        foreach($query_run as $posts){
           ?>
        <label> <strong><?= $posts['title_text']; ?></strong> </label>
        <p> <?= $posts['description_text']; ?> </p>
        <button name="posts_delete"> <a href="delete.php?id=<?= $posts['posts_id']; ?>">Delete </a></button>
        <button name="posts_edit"><a href="edit.php?id=<?= $posts['posts_id']; ?>">Edit </a></button>
        <hr>
        <?php
        }
    }

    public function edit() {
        require "class_database.php";
        if(isset($_GET['id'])){
        $result = mysqli_connect("localhost", "root", "", "project_db");
           $edit_id = mysqli_real_escape_string($result, $_GET['id']);
            
           $query = "SELECT * FROM project_posts WHERE posts_id = '$edit_id'";
           $query_run = mysqli_query($result, $query);

           if(mysqli_num_rows($query_run) > 0){
                $edit = mysqli_fetch_array($query_run);
                ?>
            <form method="post" action="update.php">
            <input type="hidden" name="posts_id" value="<?= $edit["posts_id"]; ?>">
            <input type="text" placeholder="Enter your title here" name="title"  value="<?= $edit["title_text"]; ?>" size="50" required>
            <input type="text" placeholder="Enter your description/post here" name="description" value="<?= $edit["description_text"]; ?>" size="50" required>
            <input type="submit" value="update" name="update_value">
                <?php
           }else{
            echo "The ID is not available!";
           }
        }
    }

    public function update(){
        require "class_database.php";
        if(isset($_POST["update_value"])){
            $result = mysqli_connect("localhost", "root", "", "project_db");
            
            $post_id = mysqli_real_escape_string($result, $_POST['posts_id']);
            $title = mysqli_real_escape_string($result, $_POST['title']);
            $description = mysqli_real_escape_string($result, $_POST['description']);

            $query = "UPDATE `project_posts` SET `title_text`='$title',`description_text`='$description' WHERE posts_id = $post_id";
            $query_run = mysqli_query($result, $query);

            if($query_run){
                header('Location: index.php');
            }else{
                echo "The ID can not be updated!";
            }
        }
    }

    public function delete(){
        if(isset($_GET['id'])){
            require "class_database.php";
            $result = mysqli_connect("localhost", "root", "", "project_db");
            $delete_id = mysqli_real_escape_string($result, $_GET['id']);
            
            $query = "DELETE FROM project_posts WHERE posts_id='$delete_id'";
            $query_run = mysqli_query($result, $query);

            if($query_run){
                header("Location: index.php");
            }
        }else{
            echo "The Post could not be deleted";
        }
    }
}
?>