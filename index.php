<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],
    ];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotels</title>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous'/>
</head>
<body>

<h1>
    Hotels
</h1>
<form action="index.php" method="get" class="mb-5">
    <label for="parking">L'hotel deve avere un parcheggio?</label>
    <select name="parking">
        <option value="false">NO</option>
        <option value="true">SI</option>
    </select>
    <br>
    <label for="voto">Voto minimo?</label>
    <select name="voto">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <br>
    <button>Filtra</button>
</form>
<table class="table">
    <thead>
        <tr>
            <?php
            $keys = array_keys($hotels[0]);
            foreach ($keys as $head){
                if ($head != "distance_to_center"){
                    echo "<th scope='col'> {$head} </th>";
                } else {
                    echo "<th scope='col'> distance to center </th>";
                }
            }
            ?>
        </tr>
    </thead>
    <tbody>
    <?php
    
    $parkRequired = $_GET["parking"] ?? "false";
    $minimumVote = $_GET["voto"] ?? 0;
    foreach($hotels as $stucture){
        $print = true;
        if($parkRequired == "true"){
            if ($stucture["parking"] == false)
            {
                $print = false;
            }
        }
        if ($print) {
            if($stucture["vote"]>=$minimumVote){
                echo "<tr>";
                foreach ($stucture as $attributes => $value){
                    if ($attributes == "parking"){
                        if ($value){
                            echo "<td> SI </td>";
                        } else {
                            echo "<td> NO </td>";
                        }
                    } else {
                        echo "<td> {$value} </td>";
                    }
                }
                echo "</tr>";
            }
        }
    }


    ?>
    </tbody>

</table>

<style>
    th{
        text-transform: uppercase;
        text-align: center;
        border: 1px solid black;
        padding-inline: 10px;
    }
    td{
        text-align: center;
        padding-inline: 10px;
    }
</style>
    
</body>
</html>