#!/usr/bin/php
<?php
//check to see if user is already logged in

require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

//starts the request
$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}

//login information

$request = array();
$request['type'] = "register";
$request['username'] = $_POST["uname"];
$request['phonenumber'] = $_POST["email"];
$request['phonenumber'] = $_POST["pnumber"];
$request['password'] = $_POST["psw"];
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);
//??we need to validate this information 
//check response

if($response==1){
//successful response
//??we need to log the user in with their new info
	$_SESSION["loggedin"] = true;           
	$_SESSION["id"] = $id;
	$_SESSION["uname"] = $username;
}
else {
//unsuccessful response

	echo "login failed";
}

//stupid crap
echo "client received response: ".PHP_EOL;
print_r($response);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;
?>