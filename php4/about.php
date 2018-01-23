<?php 

$next_data = [];
function get_weather($filename, $api, $requestBy, $city, $apid, $if_metric_or_imperial = '', $formatOfDate = ''){
	$requestData = $api . $requestBy . '=' . $city . '&' . $if_metric_or_imperial . $formatOfDate . '&APPID=' . $apid;
	$content = file_get_contents($requestData);
	file_put_contents($filename, $content);
	$data = json_decode($content, true);
	global $next_data;
	$next_data = $data;
}

function have_weather($filename){
	$jsonString = file_get_contents($filename);
	$data = json_decode($jsonString, true);
	global $next_data;
	$next_data = $data;
}

function show_weather(){
	global $next_data;

	print <<<HTML
	<!DOCTYPE html>
	<html>
		<head>
		<title>Погода в Москве</title>
		<meta charset="utf-8">
	</head>
	<body>
	<style>
		td{
			height: 20px;
			width: 100px;
			border: 1px solid black;
			text-align: center;
		}
	</style>
		<h1>Погода в Москве</h1>
		<table>
			<tr>
				<td>Текущая температура</td>
				<td>Скорость ветра</td>
				<td>Влажность</td>
				<td>Давление</td>
			</tr>
			<tr>
				<td>{$next_data['main']['temp']}</td>
				<td>{$next_data['wind']['speed']}</td>
				<td>{$next_data['main']['humidity']}</td>
				<td>{$next_data['main']['pressure']}</td>
			</tr>
		</table>
	</body>
	</html>
HTML;

}

//Параметры запроса
$api = 'http://api.openweathermap.org/data/2.5/weather?';
$requestBy = 'q';
$city = 'Moscow,RU';
$if_metric_or_imperial = 'units=';
$formatOfDate = 'metric';
$apid = 'a13020b8efb43f553275a23adb4440cb';
///////////////////

$filename = 'cache.txt';
$time = time() - 3600;

if (file_exists($filename)){
	if(!touch($filename, $time)){
		get_weather($filename, $api, $requestBy, $city, $apid, $if_metric_or_imperial, $formatOfDate);
		show_weather();
	}else{
		have_weather($filename);
		show_weather();
	}
}else{
	get_weather($filename, $api, $requestBy, $city, $apid, $if_metric_or_imperial, $formatOfDate);
	show_weather();
}

?>
