<?php
 require("pub.php");
 require("line.php");

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON

$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['ESP'])) {
	
	send_LINE($events['ESP']);
		
	echo "OK";
	}
if (!is_null($events['events'])) {
	echo "line bot";
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			if ($text == "Welcome to beautiful graden by M10M")
			{
				$text = "HELP";
			}
			// Get replyToken
			$replyToken = $event['replyToken'];
			$userId = $event['source']['userId'];

			// Build message to reply back

			$Topic = "NodeMCU" ;
			getMqttfromlineMsg($Topic,$text);
			   
			
		}
	}
}
$Topic = "NodeMCU" ;
//$text = "Test";
// getMqttfromlineMsg($Topic,$text);
echo "OK3";
?>
