<?php 

$next_data = [];
function get_weather($filename){
	$content = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Moscow,RU&units=metric&APPID=a13020b8efb43f553275a23adb4440cb');
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
	print '<!DOCTYPE html><html><head><title>Погода в Москве</title><meta charset="utf-8"></head><body><style>td{height: 20px;width: 100px;border: 1px solid black;text-align: center;}</style><h1>Погода в Москве</h1><table><tr><td>Текущая температура</td><td>Скорость ветра</td><td>Влажность</td><td>Давление</td></tr><tr>';
	print "<td>{$next_data['main']['temp']}</td>";
	print "<td>{$next_data['wind']['speed']}</td>";
	print "<td>{$next_data['main']['humidity']}</td>";
	print "<td>{$next_data['main']['pressure']}</td>";
	print '</tr></table></body></html>';
}

$filename = 'cache.txt';
$time = time() - 3600;

if (file_exists($filename)){
	if(!touch($filename, $time)){
		get_weather($filename);
		show_weather();
	}else{
		have_weather($filename);
		show_weather();
	}
}else{
	get_weather($filename);
	show_weather();
}

?>
