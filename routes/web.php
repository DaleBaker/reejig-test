<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

function getLatestExperience($eperiences) {

	$latestExperience = NULL;
	foreach($eperiences as $eperience){
	  if ($latestExperience == NULL || 
	  		$latestExperience['from_year'] < $eperience['from_year'] || 
	  		($latestExperience['from_year'] == $eperience['from_year'] && $latestExperience['from_month'] < $eperience['from_month'])) {
	  	$latestExperience = $eperience;
	  }

	}
	return $latestExperience;
  
}

Route::get('/getContacts/{name?}/{gender?}/{city?}', function ($name, $gender, $city) {
	$allString = 'all';

	error_log("yeah");
	error_log($name);
	error_log($gender);
	error_log($city);
    $blanValueString = "blankValue";


	$response = Http::get('https://s3-ap-southeast-2.amazonaws.com/reejig.com/code-test/data.json');	
	$responseObject = array();

	foreach($response["contacts"] as $contact){
	  //error_log(print_r($contact, true));;
		$latestExperience = getLatestExperience($contact["experiences"]);
		$contact["current_company"] = $latestExperience["company"];
		$contact["current_job_title"] = $latestExperience["job_title"];

		if ($name != $blanValueString && (strtolower($name) != strtolower($contact["firstname"]) && strtolower($name) != strtolower($contact["lastname"]))) {
			continue;
		}
		if ($gender != $blanValueString && strtolower($gender) != strtolower($contact["gender"])) {
			continue;
		}		
		if ($city != $blanValueString && strtolower($city) != strtolower($contact["city"])) {
			continue;
		}
		array_push($responseObject,$contact);
	}



    return $responseObject;
});
