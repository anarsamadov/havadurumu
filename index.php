<?php
/**
 * Created by Anar Samadov.
 * User: user
 * Date: 1/19/2019
 * Time: 23:47
 */
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include_once "class.weather.php";

$weather = new Weather();

echo $weather->getWeatherData("izmir, tr");


