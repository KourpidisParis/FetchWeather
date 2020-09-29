<?php require_once("location.php"); ?>
<?php require_once("global.php"); ?>
<?php
if (isset($_GET['location'])) {

      
      session_start();

      $location_url ="http://api.weatherapi.com/v1/current.json?key=510eb7be47904818b8a174646202809&q=".urlencode($_GET['location']);
      $response = file_get_contents($location_url);

      $location_array = json_decode($response, true);
      
      //Destruction of the data
      $name_arr = array_values($location_array)[0];
      $current_arr = array_values($location_array)[1];
  
      //name_arr
      $name = $name_arr["name"];
      $region = $name_arr["region"];
      $country = $name_arr["country"];
      $localtime = $name_arr["localtime"];
  
      //current_arr
      $tempc = $current_arr["temp_c"];
      $condition = $current_arr["condition"]["text"];
      $image = $current_arr["condition"]["icon"];
      
      
      //Creating a new object with the information tha fetched
      $location = new Location($name, $region,$country,$localtime,$tempc,$condition,$image);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
      integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"
    />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style2.css" />
    <title>Document</title>
</head>
<body>
    <!-- Show the results -->
  <!-- Card -->
<div class="container mt-2">
    <h1 class="display-4">Weather in <?php echo $location->get_name();?></h1>
    <div class="card weather-card">

    <!-- Card content -->
    <div class="card-body pb-3">
    
    <div class="d-flex justify-content-between mb-3">
        <div>
            <h4 class="card-title font-weight-bold"><?php echo $location->get_name(); ?></h4>
            <p class="card-text"><?php echo $location->get_localtime();?>,<?php echo $location->get_condition();?></p>
        </div>
        <p><?php echo $location->get_country()."<br>".$location->get_region(); ?></p>

    </div>

    <div class="d-flex justify-content-between">
        <p class="display-1 degree"><?php echo $location->get_tempc()." C"; ?></p>
        <img src="<?php echo $location->get_image();?>" alt="">
    </div>
</div>

</div>
<!-- Card -->
    <!--end of col-->
</div>


<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"
  ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"
      integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g=="
      crossorigin="anonymous"
    ></script>
</body>
</html>