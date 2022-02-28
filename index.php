<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- INTEGRATE A TINYMCE FOR RICHTEXT EDITOR IN TEXTAREA -->
    <script src="https://cdn.tiny.cloud/1/agfgtjjwpoqlys6lw2kj3my9amslaf5k1ps2raq6ggdkd95e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
    tinymce.init({
        selector:'textarea',
        menubar: false,
        content_style: '{ word-break: break-word; width: 100%; height: 35ch; border: 1px solid #cc9603; background: #e7e7e7; border-radius: 2px; outline: none; }'
    });
    </script>
    <script src="sort-table.js"></script>

    <title>Welcome page</title>
</head>
<body>
    
    <?php 
        include_once 'header.php';
        include 'welcome.inc.php';
        $search="";
        
        //check if the user is logged in or not
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true): ?>
        <div class="welcomeText">
            <a>Welcome to our website.</br>Here you can add and manage your daily <span class="customText"> NOTES</span>!</a>
        </div>
        
        <?php
        else: 
    ?>
    <div class="main-container">
    <!-- FORM -->
        <form class="note-form" action="welcome.inc.php" method="POST">
            <h1 class="title">Create note</h1>
            <div class="error-messages">
                <?php
                    if(isset($_GET["error"]))
                    {
                        if($_GET["error"] == "emptyinput")
                        {
                            echo "Please fill all fields!";
                        }
                        if($_GET["error"] == "tooLongTitle")
                        {
                            echo "Title could be maximum 20 characters!";
                        }
                        if($_GET["error"] == "tooLongContent")
                        {
                            echo "Content could be maximum 1000 characters!";
                        }
                        if($_GET["error"] == "notSuccess")
                        {
                            echo "The note has not been deleted!";
                        }
                    }
                ?>
            </div>
            
            <input class="title" name="title" value="<?php echo $title; ?>" placeholder="Title*" autofocus> </br>
            <textarea id="content" class="contentField" name="contentField" placeholder="Content*"><?php echo $content; ?></textarea> </br>
            
            <?php if($update == true): ?>
                <button type="submit" class="btnupdate" name="btnupdate" a href="index.php">Edit</button>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            <?php else: ?>
                <button type="submit" class="btnadd" name="btnadd" a href="index.php">Add</button>
            <?php endif; ?>
        </form>

        <!-- SEARCH BAR -->
        <div class="searchContainer">
            <form class="searchBar" action="index.php" method="POST">
                <input class="searchfield" name="searchfield" placeholder="Search">
                <button class="btnsearch" name="btnsearch">Search</button>
            </form>
        </div>
        

    <!-- TABLE CONTAINS USER NOTES-->
        <div class="userdata">
            <h2 class="title">My notes</h2>
            <table class="js-sort-table" cellspacing="0" cellpadding="0">
                
                <tr>
                    <!-- <td>ID</td> -->
                    <th class="header-table-title js-sort-date" width="50" >Date</th>
                    <th class="header-table-title" width="50" >Title</th>
                    <th class="header-table-title" width="150">Content</th>
                    <th class="action header-table-title" >Action</th>
                    
                </tr>    
                <!-- <script>
                    $(document).ready(function()
                    {
                        $("tr:odd").css({
                            "background-color":"rgb(141, 141, 141)",
                            "color":"#fff"});
                    });
                </script> -->

                <?php
                    // save user_id from current session in variable
                    $user_id = $_SESSION['user_id'];
                    // fetch notes data from database for current user, using UserID in table notes
                    $records = mysqli_query($connect,"SELECT * FROM notes WHERE UserID = '$user_id'");   
                ?>    
                
                <?php 
                if(isset($_POST["btnsearch"]))
                {
                    $search = $_POST['searchfield']; 
                    $user_id = $_SESSION['user_id'];
                    $searchResults = mysqli_query($connect, "SELECT * FROM notes WHERE UserID = '$user_id' && ((`title` LIKE '%".$search."%') OR (`content` LIKE '%".$search."%'))") 
                    or die($mysqli->error());
                    $numberOfResult = mysqli_num_rows($searchResults);

                    if($numberOfResult > 0){
                        echo "$numberOfResult search result found!";
                        while($row = mysqli_fetch_array($searchResults)): ?>
                        <tr>
                        <!-- <td><?php echo $row['note_id']; ?></td> -->
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['content']; ?></td>
                            <td>
                                <div class="table-buttons-container">
                                    <!-- <button class="edit_btn" name="edit_btn" >Edit</button>  -->
                                    <a href="index.php?edit=<?php echo $row['note_id']; ?>" class="edit_btn" name="edit_btn" >Edit</a>
                                    <!-- <button class="delete_btn" name="delete_btn" >Delete</button> -->
                                    <a href="index.php?delete=<?php echo $row['note_id']; ?>" class="delete_btn" name="delete_btn">Delete</a>
                                </div>
                            </td>
                        </tr>                        	
                    <?php endwhile; 
                    } 
                    else{
                        echo "No search result found!";
                    }    
                }
                else {
                    while($row = mysqli_fetch_array($records)): ?>
                        <tr>
                            <!-- <td><?php echo $row['note_id']; ?></td> -->
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['content']; ?></td>
                            <td>
                                <div class="table-buttons-container">
                                    <!-- <button class="edit_btn" name="edit_btn" >Edit</button>  -->
                                    <a href="index.php?edit=<?php echo $row['note_id']; ?>" class="edit_btn" name="edit_btn" >Edit</a>
                                    <!-- <button class="delete_btn" name="delete_btn" >Delete</button> -->
                                    <a href="index.php?delete=<?php echo $row['note_id']; ?>" class="delete_btn" name="delete_btn">Delete</a>
                                </div>
                            </td>
                        </tr>                        	
                    <?php endwhile;
                    } ?>
            </table>
        </div>
        <?php mysqli_close($connect); // Close connection ?>
    <?php endif; ?>
    </div>
</body>
</html>