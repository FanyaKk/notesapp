<?php
include 'config.php';

$title="";
$content="";
$update = false;

//check if edit button click and id is found in DB
if (isset($_GET['edit'])) 
{
    $id = $_GET['edit'];
    $update = true;
    $note = $connect->query("SELECT * FROM notes WHERE note_id = $id") or die($mysqli->error());
    
    if ($note) 
    {
        $row = $note->fetch_array();
        $title = $row['title'];
        $content = $row['content'];
        
    }
}
if(isset($_POST['update']))
{
    $id=$_GET['note_id'];
    $title=$_POST['title'];
    $content=$_POST['contentField'];
    $updateNote=$content->query("UPDATE notes SET title = '$title' AND contentField = '$content' WHERE note_id = '$id'") or die($mysqli->error());

    header('Location: index.php');
}

//delete notes
$delSuccess="";

//check if delete button click and id is found in DB - delete it
if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $delete=$connect->query("DELETE FROM notes WHERE note_id = $id") or die($mysqli->error());

    if($delete)
    {
        $delSuccess = "success";
    }
    else
    {
        $delSuccess = "not succes";
    }
    
    header('Location: index.php');
    
}