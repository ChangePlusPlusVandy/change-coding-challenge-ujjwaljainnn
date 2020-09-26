<?php
    /**
     * The following if loop checks if the user is in
     * a session which start by visiting our index.php page, 
     * if yes, it continues to play the game
     * if not, it redirects the user to the main page first
     */
    session_start();
    if(!isset($_SESSION['attempt'])){
        header("Location: ./index.php");
    }

    include "randomTwo.php";
    if(isset($_POST["submit"])){
        $user1 = $_POST['user1'];
        $user2 = $_POST['user2'];
        
        $user1_array = fetchTweets($user1);
        $user2_array = fetchTweets($user2);
        
        if(empty($user1_array)){
            echo '<h1>User 1 not valid. Please enter again.</h1>';
            header("Location: /chooseUsers.php");
        } else if(empty($user2_array)) {
            echo '<h1>User 2 not valid. Please enter again.</h1>';
            header("Location: /chooseUsers.php");
        } else {
            header("Location: guessRandom.php");
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/chooseUsersStyle.css">

    <title>Guess the Tweeter</title>
    </head>
    <body>
        What two twitter users do want to choose? 
        <form method = "post">
            User 1: <input type = "text" name = "user1">
            User 2: <input type = "text" name = "user2">
            <input type = "submit" name = "submit">
        </form>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>