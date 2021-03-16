<?php
$apiKey = "1819709c7f3efa3fdd71639d422ceb6b";
$cityId = "6454034";
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>

<div class="report-container">
            <h2 class="text-white"> Hello Sir Here's the Weather Status</h2>
            <h2 class="text-white"><?php echo $data->name; ?></h2>
            <div class="text-white time">
                <div><?php echo date("l g:i a", $currentTime); ?></div>
                <div><?php echo date("jS F, Y",$currentTime); ?></div>
                <div><?php echo ucwords($data->weather[0]->description); ?></div>
            </div>
            <div class="text-white weather-forecast">
                <img
                    src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                    class="weather-icon" /> max. temp. <?php echo $data->main->temp_max; ?>°C  <span
                    class="min-temperature">min. temp. <?php echo $data->main->temp_min; ?>°C</span>
            </div>
            <div class="time">
                <div class="text-white">Humidity: <?php echo $data->main->humidity; ?> %</div>
                <div class="text-white">Wind: <?php echo $data->wind->speed;?>km/h</div>
            </div>
</div>