<?php
include "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$client = new Client();
define('TOKEN', 'MGnt7X0n96lKFbf3ORHp0NzKh50TWUyd');
define('MANTISHUB_URL', 'https://ipt10-2022.mantishub.io/');

$client = new Client();
$headers = [
  'Authorization' => 'MGnt7X0n96lKFbf3ORHp0NzKh50TWUyd',
  'Content-Type' => 'application/json'
];
$body = '{
  "summary": "Gabriel Rhobert P. Dy",
  "description": "Description for sample REST issue.",
  "additional_information": "More info about the issue",
  "project": {
    "id": 1,
    "name": "MyProject"
  },
  "category": {
    "id": 5,
    "name": "bugtracker"
  },
  "handler": {
    "name": "vboctor"
  },
  "view_state": {
    "id": 10,
    "name": "public"
  },
  "priority": {
    "name": "normal"
  },
  "severity": {
    "name": "trivial"
  },
  "reproducibility": {
    "name": "always"
  },
  "sticky": false,
  "tags": [
    {
      "name": "mantishub"
    }
  ]
}';
$request = new Request('POST', 'https://ipt10-2022.mantishub.io/api/rest/issues', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();
