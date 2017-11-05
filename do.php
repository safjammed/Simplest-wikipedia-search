<?php
/*
* Since the api cannot bee used always since the domains are not accepted by wikipedia api
* I had to ddo it separately with PHP cURL instead of jquery ajax. This takes more time but
* It will woork on every situations. It will not though any unwanted header access allow errors
* The process is simple. The data obtained with cURL is not recognized as JSON that is why the 
* strring must be defined and cut here and there before parsing with JSON parse of javascript
* 
*/

// Defining the ccotent as JSON
header('Content-Type: application/json');
//Getting the keywords from the ajax call
$keywords = $_POST['key'];

//Initiating the cURL
$ch = curl_init();

//The Api URL already contains the values
curl_setopt($ch, CURLOPT_URL,"https://en.wikipedia.org/w/api.php?action=opensearch&search=".$keywords."&format=json&callback=");
curl_setopt($ch, CURLOPT_POST, 1);

// but in real life you should use something like this to pass data to the api:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));


// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

// dump  the data 
echo json_encode($server_output); 


?>