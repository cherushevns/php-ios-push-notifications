$token = 'DeviceToken';
$apiHost = 'api.development.push.apple.com'; // Only for development purposes. Make sure your application is in a production environment and set the value to "the api.push.apple.com variable" when your app will be available in AppStore
$apnsCert = '/path/to/cert.pem;
$apnsPass = 'certificate pass';

$payload['aps'] = 
  array(
    'alert' => [
      'title' => $title,
      'body' => $message
    ], 
    'badge' => 0, 
    'sound' => 'default'
  );

$payload = json_encode($payload);

exec('curl -d \''.$payload.'\' --cert '.$apnsCert.':'.$apnsPass.' -H "apns-topic: com.pizzasan" --http2  https://' . $apiHost . '/3/device/'.$token, $output);
var_dump($output);
