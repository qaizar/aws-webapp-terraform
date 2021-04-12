<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db-config.php';


function validate(PDO $PDO){
    if(!isset($_POST["title"]) || empty($_POST["title"])) {
        echo '<p style="color: red; font-weight: bold;">Missing Article Title</p>';
    }
    elseif(!isset($_POST["title"]) || empty($_POST["author"])) {
        echo '<p style="color: red; font-weight: bold;">Missing Author Name</p>';
    }
    elseif(!isset($_POST["content"]) || empty($_POST["content"])) {
        echo '<p style="color: red; font-weight: bold;">Missing Article Content</p>';
    }else{
        $request = $PDO->prepare("INSERT INTO articles (title, author, content) VALUES (:title, :author, :content)");
        $request->bindValue(":title", $_POST["title"]);
        $request->bindValue(":author", $_POST["author"]);
        $request->bindValue(":content", $_POST["content"]);
        $request->execute();
        header('Location: index.php'); 
    }

    echo '<p><a href="index.php">Home</a></p>';
   
}

$PDO = new PDO(DB_DSN, DB_USER, DB_PASS, $options);
validate($PDO);