<?php    
    session_start();
    if(!isset($_SESSION['attempt'])){
        header("Location: index.php");
    }
    function newTweet(){
        require('./api/elon.php');
        require('./api/kanye.php');
        /**
         * Shuffling the array that contain only tweet-texts of 
         * the tweets that fulfill our requirements 
         * Then storing the first elements of the shuffled arrays into another
         * array
         */
        shuffle($filtered_elon);
        shuffle($filtered_kanye);
        $responses = array(
            $filtered_elon[0],
            $filtered_kanye[0]
        );
        /**
         * Shuffling the array with the first elements and that contain one tweet from 
         * Kanye and another from Elon
         */
        shuffle($responses);
        
        if(in_array($responses[0], $filtered_elon)){
            return array(
                $responses[0],
                "elon"
            );
        } else {
            return array(
                $responses[0],
                "kanye"
            );
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
    <link rel="stylesheet" href="./style/guessStyle.css">

    <title>Guess the Tweeter</title>
    </head>
    <body>
    <div class="container">
        <h1>Guess the tweet given in the blue box</h1>
    </div>
    <div class = "container" id = "tweet">
        <?php
            $tweetInfo = newTweet(); 
            $tweet = $tweetInfo[0];
            $tweetOwner = $tweetInfo[1];
        ?>
        <p id = "tweet-text"><?php echo $tweet; ?></p>
    </div>
    <div class="container" id = "options">
            <h1 id = "result"></h1>
            <?php
                echo '<form method = "post">
                    <button name = "elon-btn" class="option">
                        ELON MUSK
                    </button>  
                    <button name = "kanye-btn" class="option">
                        KANYE WEST
                    </button>
                </form>';    
            ?>    
    </div>
    <?php
        $message = "";

        /**
         * This block of if code below is to handle all the 
         * post requests that can be made through the page
         * It includes post requests through 'elon musk' button,
         * 'kanye west' button and 'show results' button
         */
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['elon-btn'])){
                if($tweetOwner == "elon"){
                    $message = "Spot on! Now try this one";
                    $_SESSION['score']++;
                } else {
                    $message = "Sorry! That's not the right answer. :( Try this one";
                }
                $_SESSION['attempt']++;
            } else if(isset($_POST['kanye-btn'])){
                if($tweetOwner == "kanye"){
                    $message = "Spot on! Now try this one";
                    $_SESSION['score']++;
                } else {
                    $message = "Sorry! That's not the right answer. :( Try this one";
                }
                $_SESSION['attempt']++;
            } else if(isset($_POST['result-btn'])){
                header("Location: ./result.php");
                exit();
            }
            echo "<h1 id = 'result-status'></h1>";
            echo '<script>
                document.getElementById("result-status").innerHTML = "' . $message . '";
            </script>';
            
        }
    ?>
    <?php
        echo '<form method = "post">
            <button name = "result-btn" id = "result-btn">
                Show Results
            </button>  
        </form>';
    ?>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>

