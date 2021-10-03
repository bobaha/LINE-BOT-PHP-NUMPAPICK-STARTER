 <?php
  

function send_LINE($msg){
 $access_token = 'VA2W8ly0zQTI5AbsdXXaox1YSD7cKMbcI75vkHSDAV5LwBZ7PA3cRSBO/IwKMplEeGt+nyas/zZI8VPcwnAky1jICBp1+sM0F835CVtH2zvO6jGk/kUCgb7OBRb/hyx3E29VgVJW0q5sSLaL8A+D+gdB04t89/1O/w1cDnyilFU='; 

  $messages = [
        'type' => 'text',
        'text' => $msg
        //'text' => $text
      ];

      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [

        'to' => 'U4b13fe4c35abc1e83fa29b738341c906',
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);

      echo $result . "\r\n"; 
}

?>
