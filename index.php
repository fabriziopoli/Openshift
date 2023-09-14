<?php
require 'core/bootstrap.php';

$routes = [
	'/werkstatt' => 'WerkstattController@Werkstatt',
	'/' => 'WerkstattController@Werkstatt',
];

$db = [
	'name'     => 'werkstatt',
	'username' => 'root',
	'password' => '',
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');