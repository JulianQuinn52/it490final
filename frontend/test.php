#!/usr/bin/php
<?php
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}

$request = array();
$request['type'] = "test";
$request['testmessage'] = "bruh";
$request['username'] = "julian";
$request['password'] = "iloveIT490";
$request['email'] = "evil@evil.net";
$request['phonenumber'] = "6116626063";


$response = $client->send_request($request);

if ($response == 1)
	echo 'incredible!';
else
	echo 'thats rough buddy';

echo "client received response: ".PHP_EOL;
print_r($response);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;