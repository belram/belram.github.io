<?php

$cachetime = 3600;
$cachefile = 'cachedData.txt';
$data = [];

//Параметры запроса
$api = 'http://api.openweathermap.org/data/2.5/weather?';
$requestBy = 'q';
$city = 'Moscow,RU';
$if_metric_or_imperial = 'units=';
$formatOfDate = 'metric';
$apid = 'a13020b8efb43f553275a23adb4440cb';
///////////////////

if(file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)){
	$jsonString = file_get_contents($cachefile);
	$data = json_decode($jsonString, true);
}else{
	$requestData = $api . $requestBy . '=' . $city . '&' . $if_metric_or_imperial . $formatOfDate . '&APPID=' . $apid;
	$content = file_get_contents($requestData);
	$data = json_decode($content, true);
	file_put_contents($cachefile, $content);
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Погода в Москве</title>
	<meta charset="utf-8">
</head>
<body>
<style>
	table{
		border-collapse: collapse;
	}
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
		<td><?php echo $data['main']['temp'] ?></td>
		<td><?php echo $data['wind']['speed'] ?></td>
		<td><?php echo $data['main']['humidity'] ?></td>
		<td><?php echo $data['main']['pressure'] ?></td>
	</tr>
</table>
<p>Последнее обновление данных: <?php echo date('H:i', filemtime($cachefile)) ?></p>

</body>
</html>
