<?php
//Creacion de la Aplicacion php para envio de mensaje NotificacionFCM Android
//API access key from Google API's Console
define('API_ACCESS_KEY','AAAAUk-zvxY:APA91bGUDE9zzw8E_Ijh3NcIMhD01Si1H9GlEJNSB-qPYDREfPnvktF4raq4a2S1zWFUvTX1_KcZh_sNb_SDuPYm7nM_XJhgxfHLtWWf2NrkA8BzLMZ1AomFOdzah2FVCnqI0c9Z3cOh');
$registrationIds = ["cwicHkNqQY-q-cywNBhTrF:APA91bH-9zYcVpRNrvI8zWNSFHwo17OaJ0JtY7hiMt_K7G4uwTlYSW8l1IsavL-hKpXaW4KjIeA7GLlEWfflOIiftbrgihLIXztBgbT58SAjh7J9FbxcwmbRoWnZqsIX287bY9aysQi6"];

//prep the bundle
$msg = [
    'title' => 'Programacion Android',
    'body'  => 'Prueba 2'
];

$fields = [
    'registration_ids' => $registrationIds,
    'notification'     => $msg
];

$headers = [
    'Authorization: key =' .API_ACCESS_KEY,
    'Content-Type: application/json'
];

$fields = json_encode($fields);

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,'https://fcm.googleapis.com/fcm/send');
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>