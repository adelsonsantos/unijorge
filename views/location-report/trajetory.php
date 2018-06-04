<?php
/**
 * Created by PhpStorm.
 * User: adelson
 * Date: 27/05/2018
 * Time: 16:14
 */

/* @var $this yii\web\View */
/* @var $model app\models\UnijorgeLocationReport */
/* @var $form yii\widgets\ActiveForm */

use app\models\UnijorgeLocationReport;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\layers\BicyclingLayer;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;


/** @var $model->device_id $device_id */
$result = UnijorgeLocationReport::find()->where(['device_id' => $model->device_id])->andWhere(['>=', 'location_data', $model->location_data_report_inicio])->all();




// lets use the directions renderer
$home = new LatLng(['lat' => 39.720991014764536, 'lng' => 2.911801719665541]);
$school = new LatLng(['lat' => 39.719456079114956, 'lng' => 2.8979293346405166]);
$school2 = new LatLng(['lat' => 39.7193992, 'lng' => 2.9014305]);
$santo_domingo = new LatLng(['lat' => 39.72118906848983, 'lng' => 2.907628202438368]);
$arrayWayPoints = [];
$arrayCoords = [];
foreach ($result as $key){
    $points = new LatLng(['lat' => $key->location_latitude, 'lng' => $key->location_longitude]);
    array_push($arrayCoords, $points);
    array_push($arrayWayPoints, new DirectionsWayPoint(['location' => $points]));
}

$newResult = $result;

if(count($newResult) > 2){
    d($newResult);
}else{
    $arrayWayPoints = [];
}

$coord = new LatLng(['lat' => $result[0]->location_latitude, 'lng' => $result[0]->location_longitude]);
$map = new Map([
    'center' => $coord,
    'zoom' => 18,
    'width' => '100%',
    'height' => '500',
    'mapTypeId' => 'satellite',
]);

// setup just one waypoint (Google allows a max of 8)
$waypoints = [
    new DirectionsWayPoint(['location' => $santo_domingo]),
    new DirectionsWayPoint(['location' => $school2])
];


$directionsRequest = new DirectionsRequest([
    'origin' => $arrayCoords[0],
    'destination' => $arrayCoords[1],
    'waypoints' => $arrayWayPoints,
    'travelMode' => TravelMode::WALKING
]);


// Now the renderer
$directionsRenderer = new DirectionsRenderer([
    'map' => $map->getName(),
]);

// Finally the directions service
$directionsService = new DirectionsService([
    'directionsRenderer' => $directionsRenderer,
    'directionsRequest' => $directionsRequest
]);

// Thats it, append the resulting script to the map
$map->appendScript($directionsService->getJs());

// Lets show the BicyclingLayer :)
$bikeLayer = new BicyclingLayer(['map' => $map->getName()]);

// Append its resulting script
//$map->appendScript($bikeLayer->getJs());

// Display the map -finally :)
?><div class="diarias-view">
<?php echo $map->display();?>
</div>
