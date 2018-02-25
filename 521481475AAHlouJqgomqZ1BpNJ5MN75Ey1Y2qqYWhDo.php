<?php
$update = file_get_contents("php://input");
$update = json_decode($update, true);
$chat_id = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
$token = "521481475:AAHlouJqgomqZ1BpNJ5MN75Ey1Y2qqYWhDo";
require_once ('GoogleTranslate.php');
use Statickidz\GoogleTranslate;
if (isset($message))
{
    $source = "en";
    $target = "fa";
    $text = $message;
    $trans = new GoogleTranslate();
    $result = $trans->translate($source, $target, $text);
}
if ($message == "/start") {
	$text = "welcome to my robot";
}elseif ($message == "/stop") {
	$text = "goodbye";
}else{
	$text = $result;
}
$url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chat_id . "&text=" . $text;
file_get_contents($url);