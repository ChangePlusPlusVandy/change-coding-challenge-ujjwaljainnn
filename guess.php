<?php
    require('./api/elon.php');
    require('./api/kanye.php');
    
    shuffle($filtered_kanye);
    shuffle($filtered_elon);
    $responses = array(
        $filtered_elon[0],
        $filtered_kanye[0]
    );

    shuffle($responses);
    
    echo $responses[0];

    // if(in_array($responses[0], $filtered_elon)){
    //     echo 'Elon<br>';
    // } else {
    //     echo 'Kanye<br>';
    // }

    echo '<br><button>Elon</button><br>';
    echo '<button>Kanye</button>';


    echo '
        
    ';
?>