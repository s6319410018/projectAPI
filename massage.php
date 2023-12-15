<?php

$serverKey = 'AAAAnqqVFMQ:APA91bGAgiYchZaTQILGRoSfqRtnodRF3Y_rDehQx6EToVB4hJ7AceuJPpI_MlnM8T-N54u2V4TByJBGobSbbsAJE3yaHvw8m88XSXYreN07H6rpF6rJAfc69VUU5UK1MGVtYDVce2a6'; // Replace with your FCM server key
$deviceToken = 'f5QVaOGJTsS5kvWZEO7Oio:APA91bGt-ExddNX6Sgp0ibPSF7-F0lyyHly0bSB8VOL1GN0J57wzn_kqBn6P_9yDyUTbSBuMrTr7vhFHoSgRVbnLS2jtKbC-KQEVQt8RSRgOEGijkuaBka-djpOUAzmDrYxIhUBKXUyb'; // Replace with the device token of the Flutter app

$fcmUrl = 'firebase-adminsdk-9hbat@notification-159c0.iam.gserviceaccount.com'; // Replace with your Firebase project ID

$data = [
    'message' => [
        'data' => [
            'title' => 'Title of the Message',
            'body' => 'Body of the Message',
        ],
        'token' => $deviceToken,
    ],
];

$options = [
    'http' => [
        'header' => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $serverKey,
        ],
        'method' => 'POST',
        'content' => json_encode($data),
    ],
];

$context = stream_context_create($options);
$result = file_get_contents($fcmUrl, false, $context);

if ($result === FALSE) {
    echo 'Error sending FCM message';
} else {
    echo 'FCM message sent successfully';
}
?>
