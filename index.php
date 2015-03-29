<?php

define('GIT_WEBHOOK', true);

/* gitlab deploy webhook */
$access_token = 'oGN3YTBuPizLa5Pwgx8ICvoNn3OqFVFKBOxtwchjs2a8z8vOdEqcUiLWsvjfz5j';

$client_token = isset($_GET['token']) ? $_GET['token'] : '';
$client_project = isset($_GET['project'] ? $_GET['project']) : '';

$projects = [
	'mp' => '/home/webroot/mp'
];

if ($client_token !== $access_token) {
    echo "error 403";
    exit(0);
}

if (array_key_exists($client_project, $projects)){
	require_once('./Git.php');
	$repo = Git::open($projects[$client_project]);
	$repo->pull('origin','master');
}

