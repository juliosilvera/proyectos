<?php

// Geolocation detection with JavaScript, HTML5 and PHP
// http://locationdetection.mobi/
// Andy Moore
// http://andymoore.info/
// this is linkware if you use it please link to me:
// <a href="http://web2txt.co.uk/">Mp3 Downloads</a>

$geo = 'http://maps.google.com/maps/api/geocode/xml?latlng='.htmlentities(htmlspecialchars(strip_tags($_GET['latlng']))).'&sensor=true';
$xml = simplexml_load_file($geo);

foreach($xml->result->address_component as $component){
	if($component->type=='street_address'){
		$geodata['precise_address'] = $component->long_name;
	}
	if($component->type=='natural_feature'){
		$geodata['natural_feature'] = $component->long_name;
	}
	if($component->type=='airport'){
		$geodata['airport'] = $component->long_name;
	}
	if($component->type=='park'){
		$geodata['park'] = $component->long_name;
	}
	if($component->type=='point_of_interest'){
		$geodata['point_of_interest'] = $component->long_name;
	}
	if($component->type=='premise'){
		$geodata['named_location'] = $component->long_name;
	}
	if($component->type=='street_number'){
		$geodata['house_number'] = $component->long_name;
	}
	if($component->type=='route'){
		$geodata['street'] = $component->long_name;
	}
	if($component->type=='locality'){
		$geodata['town_city'] = $component->long_name;
	}
	if($component->type=='administrative_area_level_3'){
		$geodata['district_region'] = $component->long_name;
	}
	if($component->type=='neighborhood'){
		$geodata['neighborhood'] = $component->long_name;
	}
	if($component->type=='colloquial_area'){
		$geodata['locally_known_as'] = $component->long_name;
	}
	if($component->type=='administrative_area_level_2'){
		$geodata['county_state'] = $component->long_name;
	}
	if($component->type=='postal_code'){
		$geodata['postcode'] = $component->long_name;
	}
	if($component->type=='country'){
		$geodata['country'] = $component->long_name;
	}
}

list($lat,$long) = explode(',',htmlentities(htmlspecialchars(strip_tags($_GET['latlng']))));

echo '<p><input type="text" name="lat" value="'.$lat.'" readonly/></p> <p><input type="text" name="long" value="'.$long.'" readonly/></p><p><input type="submit" value="Guardar"/></p>';


?>