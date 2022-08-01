<?php
include 'classes/list.php'

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte Surprise</title>
    <link href="carte.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Surprise !</h1>
    <p>Choisis une carte pour faire une suprise à ton/ta partenaire</p>
    <ul class="cartes">

        <?php
        $n=1 ;
        
        while ($n <= $total) : 
            $i = rand(0, ($total-1));
        ?>
                <section class="pattern1">
                    <li class="carte"> 
                        <?php
                            echo ($surprises[$i]); 
                        ?>
                    </li>
                </section>
            <?php 
        $n = $n +1 ;
        endwhile; 
        ?>

    </ul>
    <script src="carte.js"></script>
</body>
</html>