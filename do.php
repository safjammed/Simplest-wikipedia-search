<?php
header('Content-Type: application/json');
$keywords = $_POST['key'];
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://en.wikipedia.org/w/api.php?action=opensearch&search=".$keywords."&format=json&callback=");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,''
            // http_build_query(array('postvar1' => 'value1'))
        );

// in real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

// further processing ....
if ($server_output == "OK") { 
	// echo $server_output; 
} else { 
	echo json_encode($server_output); 
}

?>