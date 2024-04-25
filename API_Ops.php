<?php

if(isset($_POST['functionName']) && $_POST['functionName'] == 'printActors') {
    // Check if the date parameter is set
    if(isset($_POST['date'])) {
        $date = $_POST['date'];
        echo printActors($date);
    } else {
        echo "Date parameter is missing";
    }
}



function getActorsBornToday($date) {

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/actors/v2/get-born-today?today=".$date."&first=20",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
            "X-RapidAPI-Key: a82b4badd5mshb664fc4260b282cp1ed163jsnd69d80e2cf6a"
        ],
    ]);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$data = json_decode($response, true);
	$actorIds = array_map(function($edge) {
		return $edge['node']['id'];
	}, $data['data']['bornToday']['edges']);
	
	// foreach(array_values($actorIds) as $id) {
	// 	echo  $id . "<br>";
	// }
	return array_values($actorIds);
}}

function getActorBio($actorId){
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/actors/v2/get-bio?nconst=". $actorId,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
            "X-RapidAPI-Key: a82b4badd5mshb664fc4260b282cp1ed163jsnd69d80e2cf6a"
        ],
    ]);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        
        return $response;
    }
}

function printActors($date){
    $dateString = DateTime::createFromFormat('Y-m-d', $date); 
    $formattedDate = $dateString->format('m-d');

    $arr = getActorsBornToday($formattedDate);
	$output ='';
    foreach ($arr as $id) {
        $actorData = json_decode(getActorBio($id), true);
        $actorName = $actorData['data']['name']['nameText']['text'];
        $output .= $actorName . "<br>";  
    }
    return $output;
}



?>
