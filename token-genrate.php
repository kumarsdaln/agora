<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$now = new DateTime('now', new DateTimeZone('UTC'));
$currentTimeStamp = $now->getTimestamp();

include("RtcTokenBuilder.php");
            
$appId = "199ff71498ee4d02a7f5296f28b46728";
$appCertificate = "fb75e4eebfb24ac9b5bc662cd018d92b";
$channelName = $_GET['channelName'];
$uid = $_GET['uid'];
$uidStr = "$uid";
$tokenExpirationInSeconds = 3600;
$privilegeExpirationInSeconds = $currentTimeStamp + 3600;
$role = $_GET['role'];

$token = RtcTokenBuilder::buildTokenWithUid($appId, $appCertificate, $channelName, $uid, $role, $privilegeExpirationInSeconds);

echo json_encode(array('token'=>$token));


?>