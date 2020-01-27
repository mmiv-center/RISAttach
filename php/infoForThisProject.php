<?php

$config = json_decode(file_get_contents("config.json"), true);
$token = "";
if (isset($config['projects_token'])) {
  $token = $config['projects_token'];
} else {
  echo ("{ \"message\": \"Error: no project token found.\" }");
  exit();
}
$url = '';
if (isset($config['redcap_url'])) {
  $url = $config['redcap_url'];
} else {
  echo("{ \"message\": \"Error: no url configured.\" }");
  exit();
}


$project = "";
if (isset($_GET['project'])) {
   $project = $_GET['project'];
} else {
  echo("{ \"message\": \"Error, unknown project\" }");
  exit();
}

// first get the project information
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
$erg = array();
$d = json_decode($output,true);
foreach($d as $dd) {
  // echo(json_encode(array('project_active' => $dd['project_active'], 'record_id' => $dd['record_id'])));
  if ($dd['project_active'] == "1" && $dd['record_id'] == $project) {
    $erg = $dd;
  }
}
curl_close($ch);
//echo (json_encode($erg));

// now that we know how to access that project, ask for all the existing patient id's
$data = array(
    'token' => $erg['project_token'],
    'content' => 'record',
    'format' => 'json',
    'type' => 'flat',
    'fields' => array('record_id'),
    'rawOrLabel' => 'raw',
    'rawOrLabelHeaders' => 'raw',
    'exportCheckboxLabel' => 'false',
    'exportSurveyFields' => 'false',
    'exportDataAccessGroups' => 'false',
    'returnFormat' => 'json'
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://10.94.209.30:4444/api/');
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
$erg = json_decode($output, true);
curl_close($ch);

echo(json_encode($erg));

?>

