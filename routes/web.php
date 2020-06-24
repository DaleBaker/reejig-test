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

Route::get('/getContacts/{name?}/{gender?}/{city?}', function ($name = NULL, $gender = NULL, $city = NULL) {
	$allString = 'all';

	error_log("yeah");
	error_log($name);
	error_log($gender);
	error_log($city);


	$response = Http::get('https://s3-ap-southeast-2.amazonaws.com/reejig.com/code-test/data.json');	
	//error_log(print_r($response["contacts"], true));;

	foreach($response["contacts"] as $contact){
	  //error_log(print_r($contact, true));;
		$latestExperience = getLatestExperience($contact["experiences"]);
		error_log(print_r($latestExperience, true));;

	}

    return $response;
});
