<!DOCTYPE html>
<html>
<head>
	<title>Погода в Москве</title>
	<meta charset="utf-8">
</head>
<body>

<?php 

$content = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Moscow,RU&units=metric&APPID=a13020b8efb43f553275a23adb4440cb');

file_put_contents('weather.json', $content);

$data = json_decode($content, true);

// print_r($data);
?>

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
		<td><?php print $data['main']['temp']; ?></td>
		<td><?php print $data['wind']['speed']; ?></td>
		<td><?php print $data['main']['humidity']; ?></td>
		<td><?php print $data['main']['pressure']; ?></td>
	</tr>
</table>

</body>
</html>
