<?php

// $projects = array( array("name" => "V-REX"), array( "name" => "PAIM" ), array( "name" => "BackToBasic" ) );

$config = json_decode(file_get_contents("config.json"),true);
$token = "";
if (isset($config['projects_token'])) {
  $token = $config['projects_token'];
} else {
  echo ("{ \"message\": \"Error: no token found\" }");
  exit();
}
$url = "";
if (isset($config['redcap_url'])) {
  $url = $config['redcap_url'];
} else {
  echo ("{ \"message\": \"Error: no url found\" }");
  exit();
}

$data = array(
    'token' => $token,
    'content' => 'record',
    'format' => 'json',
    'type' => 'flat',
    'rawOrLabel' => 'raw',
    'rawOrLabelHeaders' => 'raw',
    'exportCheckboxLabel' => 'false',
    'exportSurveyFields' => 'false',
    'exportDataAccessGroups' => 'false',
    'returnFormat' => 'json'
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url.'/api/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));
$output = curl_exec($ch);
$d = json_decode($output,true);
$projects = array();
foreach($d as $dd) {
  if ($dd['project_active'] == "1") {
    $projects[] = array( "record_id" => $dd['record_id']);
  }
}
curl_close($ch);
		

echo json_encode($projects);


?>

