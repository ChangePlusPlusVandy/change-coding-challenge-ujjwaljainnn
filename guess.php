<?php    
    function newTweet(){

        require('./api/elon.php');
        require('./api/kanye.php');
        /**
         * Shuffling the array that contain only tweet-texts of 
         * the tweets that fulfill our requirements 
         * Then storing the first elements of the shuffled arrays into another
         * array
         */
        shuffle($filtered_kanye);
        shuffle($filtered_elon);
        $responses = array(
            $filtered_elon[0],
            $filtered_kanye[0]
        );
        /**
         * Shuffling the array with the first elements and that contain one tweet from 
         * Kanye and another from Elon
         */
        shuffle($responses);
        
        return $responses[0];
    }

    $score = 0;
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
    <div class = "container" id = "tweet">
        <p id = "tweet-text">Have you hugged a tunnel today?</p>
    </div>
    <div class="container" id = "options">
            <h1 id = "result"></h1>
            <form method = "post">
                <button name = "elon-btn" class="option">
                    ELON MUSK
                </button>  
                <button name = "kanye-btn" class="option">
                    KANYE WEST
                </button>
            </form>        
    </div>
    <button id = "next-btn">
        Next
    </button>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        
    </script>
  </body>
</html>

<?php



?>