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
    

$hotelsList = $hotels;

if (isset($_GET["parking"])){
    $parking = $_GET["parking"];

    if($parking == 1){
        $tempArray = [];

        foreach($hotelsList as $hotel){

            if($hotel["parking"] === true){
                $tempArray[] = $hotel;
            }
        }

        $hotelsList = $tempArray;
    }
}

if (isset($_GET["stars"])){
    $stars = $_GET["stars"];

    if($stars >= 1 && $stars <= 5){
        $tempArray = [];

        foreach($hotelsList as $hotel){

            if($hotel["vote"] >= $stars){
                $tempArray[] = $hotel;
            }
        }

        $hotelsList = $tempArray;
    }
}

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <form action="./index.php" method="GET">
        <div>
            <label for="parking">With parking?</label>
            <select name="parking" id="parking">
                <option value="" selected>No</option>
                <option value="1">Yes</option>
            </select>
        </div>
        <div>
            <label for="stars">Minimum stars?</label>
            <input type="number" name="stars" id="stars" min="1" max="5" required>
        </div>
        <div>
            <button type="submit">
                Filter
            </button>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <!-- foreach ($hotels[0] as $key => $property) -->
                <th scope="col"> 
                    Name<!--  echo $key -->
                </th>
                <th>
                    Description
                </th>
                <th>
                    Parking
                </th>
                <th>
                    Vote
                </th>
                <th>
                    Distance to center
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hotelsList as $hotel) { ?>
                <tr>
                    <th scope="row"> 
                        <?php echo $hotel["name"] ?> 
                    </th>
                    <td> 
                        <?php echo $hotel["description"] ?> 
                    </td>
                    <td> 
                        <?php echo $hotel["parking"] ?> 
                    </td>
                    <td> 
                        <?php echo $hotel["vote"] ?> 
                    </td>
                    <td> 
                        <?php echo $hotel["distance_to_center"] ?> 
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

