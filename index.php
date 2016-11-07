<?php
    $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
    $sql = "select * from weather.forecast where woeid in (select woeid from geo.places(1) where text='izmir, tr' )and u='c'";
    echo $URL = $BASE_URL . "?q=" . urlencode($sql) . "&format=json";
    $data=file_get_contents($URL);

    $parse=json_decode($data);
    foreach ($parse->query->results->channel->item->forecast as $key => $value)
    {
      echo "<ul>";
      echo '<li>'.$value->date.' - '.$value->code.' - '.$value->text.' - '.$value->high.'&degC - '.$value->low.'&degC</li>';
      echo "</ul>";
    }
?>