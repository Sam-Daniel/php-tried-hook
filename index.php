<?php
$method = $_SERVER['REQUEST_METHOD'];
// PROCESS only when method is POST
if ($method == "POST"){
	$requestBody = $_POST['text'];
	$json = json_decode($requestBody);
	
	$text = $json->result->action;
	echo $text;
	switch ($text) {
		case 'hotel':
			$speech = "Hi, Nice to meet you";
			break;
		case 'boss':
			$speech = "Bye, good night";
			break;
		case 'cricket':
			$speech = "Yes, You can say anything here.";
			break;
		
		default:
			$speech = "Sorry, I didn't get that. Please ask me something else.";
			break;
	}
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	$response_data = json_encode($response);
	echo $response_data;
}
else
{
	echo "Method not allowed";
}
?>
