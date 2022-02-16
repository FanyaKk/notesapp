<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <title>Welcome page</title>
</head>
<body>

    <?php 
        include_once 'header.php';
        include 'welcome.inc.php';

        //check if the user is logged in or not
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true):
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
                    }
                ?>
            </div>
            
            <input class="title" name="title" value="<?php echo $title; ?>" placeholder="Title*" autofocus> </br>
            <textarea class="contentField" name="contentField" placeholder="Content*"><?php echo $content; ?></textarea> </br>
            
            <?php if($update == true): ?>
                <button type="submit" class="btnupdate" name="btnupdate" a href="index.php">Edit</button>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            <?php else: ?>
                <button type="submit" class="btnadd" name="btnadd" a href="index.php">Add</button>
            <?php endif; ?>
        </form>
        <form class="searchBar" action="search.php" method="POST">
            <input type="text" name="btnsearch" placeholder="Search">
            <button type="submit" name="submit-search" a href="index.php">Search</button>
        </form>
    <!-- TABLE CONTAINS USER NOTES-->
        <div class="userdata">
            <h2 class="title">My notes</h2>
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <!-- <td>ID</td> -->
                    <td class="header-table-title" width="50" >Date</td>
                    <td class="header-table-title" width="50" >Title</td>
                    <td class="header-table-title" width="150">Content</td>
                    <td class="action header-table-title" >Action</td>
                </tr>
        </div>

        <script>
            $(document).ready(function()
            {
                $("tr:odd").css({
                    "background-color":"rgb(141, 141, 141)",
                    "color":"#fff"});
            });
        </script>

        <?php
            // save user_id from current session in variable
            $user_id = $_SESSION['user_id'];
            // fetch notes data from database for current user, using UserID in table notes
            $records = mysqli_query($connect,"SELECT * FROM notes WHERE UserID = '$user_id'"); 
        ?>    
        
        <?php while($row = mysqli_fetch_array($records)): ?>
            <tr>
                <!-- <td><?php echo $row['note_id']; ?></td> -->
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['content']; ?></td>
                <td>
                    <div class="table-buttons-contianer">
                        <!-- <button class="edit_btn" name="edit_btn" >Edit</button>  -->
                        <a href="index.php?edit=<?php echo $row['note_id']; ?>" class="edit_btn" name="edit_btn" >Edit</a>
                        <!-- <button class="delete_btn" name="delete_btn" >Delete</button> -->
                        <a href="index.php?delete=<?php echo $row['note_id']; ?>" class="delete_btn" name="delete_btn">Delete</a>
                    </div>
                </td>
               
            </tr>	
        <?php endwhile; ?>
        </table>
        <?php 

            if($delSuccess == "success")
            {
                echo "Delete succesfully!";
            }
            else if($delSuccess == "not succes")
            {
                echo "Note has not been deleted!";
            }
        ?>
        <?php mysqli_close($connect); // Close connection ?>
    <?php endif; ?>
    </div>
</body>
</html>