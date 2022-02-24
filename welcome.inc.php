<?php
    include_once 'config.php';
    //ADD NOTE ------------------------------------------------------------------------------------------------
    if(isset($_POST['btnadd']))
    {
        include 'login.inc.php';

        $title = $_POST['title'];
        $content = $_POST['contentField'];
        $user_id = $_SESSION['user_id'];
        $titleLength = strlen($title);
        $contentLength = strlen($content);

        require_once 'functions.inc.php';

        if(emptyInputNote($title, $content) !== false)
        {
            header("Location: index.php?error=emptyinput");
            exit();
        }
        if($titleLength > 20)
        {
            header("Location: index.php?error=tooLongTitle");
            exit();
        }
        if($contentLength > 2000)
        {
            header("Location: index.php?error=tooLongContent");
            exit();
        }

        $success = $connect->query("INSERT INTO notes (note_id, userID, title, content) VALUES(NULL, '$user_id', '$title', '$content')");
        $fail = !$success;
        if ($fail)
        {
            die($mysqli->error);
        }
        else if($success)
        {
            header('Location: index.php');
        }
    }
    //UPDATE NOTE ---------------------------------------------------------------------------------------------
    $title="";
    $content="";
    $update = false;

    if (isset($_GET['edit'])) 
    {
        $id = $_GET['edit'];
        $update = true;
        $note = $connect->query("SELECT * FROM notes WHERE note_id = $id") 
        or die($mysqli->error());
        
        if ($note) 
        {
            $row = $note->fetch_array();
            $title = $row['title'];
            $content = $row['content'];    
        }
    }
    if(isset($_POST['btnupdate']))
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['contentField'];
        $titleLength = strlen($title);
        $contentLength = strlen($content);
        
        require_once 'functions.inc.php';

        if(emptyInputNote($title, $content) !== false)
        {
            header("Location: index.php?error=emptyinput");
            exit();
        }
        if($titleLength > 20)
        {
            header("Location: index.php?error=tooLongTitle");
            exit();
        }
        if($contentLength > 2000)
        {
            header("Location: index.php?error=tooLongContent");
            exit();
        }

        $updateNote = $connect->query("UPDATE notes SET title = '$title', content = '$content' WHERE note_id = $id");


        header('Location: index.php');
    }


    //DELETE NOTE ---------------------------------------------------------------------------------------------
    $delSuccess="";

    //check if delete button click and id is found in DB - delete it
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        $delete=$connect->query("DELETE FROM notes WHERE note_id = $id") or die($mysqli->error());
    
        if($delete)
        {
            $delSuccess = "success";
            header("Location: index.php");
            exit();
        }
        else
        {
            $delSuccess = "not success";
            header("Location: index.php?error=notSuccess");
            exit();
            
        }
        // echo $delSuccess;
        // header('Location: index.php');
    }
