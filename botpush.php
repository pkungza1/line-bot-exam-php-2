<?php



require "vendor/autoload.php";

$access_token = 'sSDv7p584jZ76zRoS3qc1n2VgpPeCRWlIsnYKAiYMR8xcWYPtsMjCxMQiegFygBAMiRRxoNuIUlC5I+sGTTShnJiV637tpjiiotwgvgIQKNLan+rfsTb/wl13EiLqUBmgNvv17qw6B2pnt8Xj/LxjAdB04t89/1O/w1cDnyilFU=';

$channelSecret = '972eda038e3b3d879d3f3edbb9c314ed';

$pushID = 'U299a312eaf887dbd304427744e45778a';
//$pushID = 'U7ef7a449f2a5c2057eacfc02ba2eb286';  //ของเก่า

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







