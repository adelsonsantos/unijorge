<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Unijorge';
?>
<style>
    #imageDiaria {
        content: url(<?php /*echo Yii::$app->request->baseUrl . '../../image/iconDiarias.png';*/ ?>);
        margin-left: 30px;
        margin-bottom: auto;
        margin-top: 5px;
        transition: .5s ease;
        float: left;
    }
</style>
<?php
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;

$coord = new LatLng(['lat' => -12.9381172, 'lng' => -38.4101011]);
$map = new Map([
    'center' => $coord,
    'zoom' => 16,
    'width' => '98%',
    'height' => '400',
]);


// lets use the directions renderer
//$home = new LatLng(['lat' => -12.9348043, 'lng' => -38.3942951]);
$home = new LatLng(['lat' => -12.9405443, 'lng' => -38.4164155]);
$school = new LatLng(['lat' => -12.9381172, 'lng' => -38.4101011]);
//$school = new LatLng(['lat' => -12.9491721, 'lng' => -38.4237328]);
//$santo_domingo = new LatLng(['lat' => -12.9405443, 'lng' => -38.4164155]);

// setup just one waypoint (Google allows a max of 8)
$waypoints = [
    new DirectionsWayPoint(['location' => $school])
];

$directionsRequest = new DirectionsRequest([
    'origin' => $home,
    'destination' => $school,
    'waypoints' => $waypoints,
    'travelMode' => TravelMode::DRIVING
]);

// Lets configure the polyline that renders the direction
$polylineOptions = new PolylineOptions([
    'strokeColor' => '#FFAA00',
    'draggable' => true
]);

// Now the renderer
$directionsRenderer = new DirectionsRenderer([
    'map' => $map->getName(),
    'polylineOptions' => $polylineOptions
]);

// Finally the directions service
$directionsService = new DirectionsService([
    'directionsRenderer' => $directionsRenderer,
    'directionsRequest' => $directionsRequest
]);

// Thats it, append the resulting script to the map
$map->appendScript($directionsService->getJs());

// Lets add a marker now
$marker = new Marker([
    'position' => $coord,
    'title' => 'My Home Town',
]);

// Provide a shared InfoWindow to the marker
$marker->attachInfoWindow(
    new InfoWindow([
        'content' => '<p>This is my super cool content</p>'
    ])
);

// Add marker to the map
$map->addOverlay($marker);

// Now lets write a polygon
$coords = [
    new LatLng(['lat' => 25.774252, 'lng' => -80.190262]),
    new LatLng(['lat' => 18.466465, 'lng' => -66.118292]),
    new LatLng(['lat' => 32.321384, 'lng' => -64.75737]),
    new LatLng(['lat' => 25.774252, 'lng' => -80.190262])
];

$polygon = new Polygon([
    'paths' => $coords
]);

// Add a shared info window
$polygon->attachInfoWindow(new InfoWindow([
    'content' => '<p>This is my super cool Polygon</p>'
]));

// Add it now to the map
$map->addOverlay($polygon);


// Lets show the BicyclingLayer :)
$bikeLayer = new BicyclingLayer(['map' => $map->getName()]);

// Append its resulting script
$map->appendScript($bikeLayer->getJs());

// Display the map -finally :)*/

?>

<div class="row">

</div>


<div style="position: absolute; margin-top: -50px">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div class="diarias-view" style="margin-left: 209px; margin-top: 44px; ">
    <?= $map->display(); ?>
</div>

