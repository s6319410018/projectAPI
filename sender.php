<?php

// FCM endpoint
$fcmUrl = 'https://fcm.googleapis.com/v1/projects/notification-159c0/messages:send';

// FCM server key
$serverKey = 'AAAAnqqVFMQ:APA91bGAgiYchZaTQILGRoSfqRtnodRF3Y_rDehQx6EToVB4hJ7AceuJPpI_MlnM8T-N54u2V4TByJBGobSbbsAJE3yaHvw8m88XSXYreN07H6rpF6rJAfc69VUU5UK1MGVtYDVce2a6';

// Device token
$deviceToken = 'f5QVaOGJTsS5kvWZEO7Oio:APA91bGt-ExddNX6Sgp0ibPSF7-F0lyyHly0bSB8VOL1GN0J57wzn_kqBn6P_9yDyUTbSBuMrTr7vhFHoSgRVbnLS2jtKbC-KQEVQt8RSRgOEGijkuaBka-djpOUAzmDrYxIhUBKXUyb';

// Notification payload
$data = [
    'notification' => [
        'title' => 'Title of the Notification',
        'body' => 'Body of the Notification',
    ],
    'token' => $deviceToken,
];

// Introduce a 5-second delay
sleep(5);

// Create the request
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

// Handle the result
if ($result === FALSE) {
    echo 'Error sending FCM notification';
    // Handle the error, log it, etc.
} else {
    echo 'FCM notification sent successfully';
    // Handle success, log it, etc.
}
