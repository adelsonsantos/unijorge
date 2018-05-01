<?php
/* @var $this yii\web\View */

use app\models\Fence;
use app\models\FenceCoordenada;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\layers\BicyclingLayer;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\MapTypeId;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;

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
//// novo código


$coord = new LatLng(['lat' => -12.9387118, 'lng' => -38.4121738]);
$map = new Map([
    'center' => $coord,
    'zoom' => 16,
    'width' => '98%',
    'height' => '400',
    'mapTypeId'      => 'satellite',
    'scrollwheel'    => false,
    'draggable'      => true,
    'draggingCursor' => true,
]);

// Lets add a marker now
$marker = new Marker([
    'position' => $coord,
    'title' => 'My Home Town',
    'icon' => '/php/unijorge2/image/locat.png'
]);

// Provide a shared InfoWindow to the marker
$marker->attachInfoWindow(
    new InfoWindow([
        'content' => '<table style="width: 100%">
                        <thred>
                            <tr>                              
                                <th style="font-weight: bold">ID</th>
                                <th style="font-weight: bold">NOME</th>
                                <th style="font-weight: bold">PESO</th>
                            </th>
                        </thred>
                        
                        <tbody>
                            <tr>
                                <td style="width: 40%">1</td>
                                <td style="width: 40%">Mimoso</td>
                                <td style="width: 40%">300Kg</td>
                            </tr>
                        </tbody>
                    </table>'
    ])
);

$map->addOverlay($marker);

$coordFence = [
  'fence_id' => 1,
  'coordenadas' => [
      ['lat' => -12.9369178, 'lng' => -38.4136086],
      ['lat' => -12.9364984, 'lng' => -38.4081069],
      ['lat' => -12.93934, 'lng' => -38.4079572],
      ['lat' => -12.9399273, 'lng' => -38.4135226],
      ['lat' => -12.9369178, 'lng' => -38.4136086]
  ]
];

$fences = Fence::find()->where(['fence_status' => 1])->with('fenceCoords')->all();
//d($fences);

foreach ($fences as $value){
    $coords = [];
    foreach ($value->fenceCoords as $key){
        array_push($coords, new LatLng(['lat' => $key->fence_coord_latitude, 'lng' => $key->fence_coord_longitude]));
    }
    $polygon = new Polygon([
        'paths' => $coords,
        'strokeColor'=> $value->fence_cor,
        'strokeOpacity'=> 0.8,
        'strokeWeight'=> $value->fence_borda,
        'fillColor'=> $value->fence_cor,
        'fillOpacity'=> 0.35
    ]);
    $map->addOverlay($polygon);
}

// Lets show the BicyclingLayer :)
$bikeLayer = new BicyclingLayer(['map' => $map->getName()]);

// Append its resulting script
//$map->appendScript($bikeLayer->getJs());


//comeca aqui


//$home = new LatLng(['lat' => -12.9369178, 'lng' => -38.4136086]);
//$school = new LatLng(['lat' => -12.9364984, 'lng' => -38.4081069]);
//$santo_domingo = new LatLng(['lat' => -12.93934, 'lng' => -38.4079572]);

// setup just one waypoint (Google allows a max of 8)
/*$waypoints = [
    new DirectionsWayPoint(['location' => $home])
];*/

/*$directionsRequest = new DirectionsRequest([
    'origin' => $home,
    'destination' => $school,
    'waypoints' => $waypoints,
    'travelMode' => TravelMode::WALKING
]);*/


// Lets configure the polyline that renders the direction
$polylineOptions = new PolylineOptions([
    'strokeColor' => '#82a3bd',
    'strokeOpacity'=> 2.0,
    'strokeWeight'=> 4,
    'draggable' => true,
    'geodesic'=> true,
]);


// Now the renderer
$directionsRenderer = new DirectionsRenderer([
    'map' => $map->getName(),
    'polylineOptions' => $polylineOptions
]);

// Finally the directions service
/*$directionsService = new DirectionsService([
    'directionsRenderer' => $directionsRenderer,
    'directionsRequest' => $directionsRequest
]);*/

// Thats it, append the resulting script to the map
//$map->appendScript($directionsService->getJs());

// Lets show the BicyclingLayer :)
//$bikeLayer = new BicyclingLayer(['map' => $map->getName()]);

// Append its resulting script
//$map->appendScript($bikeLayer->getJs());

//termina aqui
?>

<div style="position: absolute; margin-top: -70px">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div class="diarias-view" style="margin-left: 209px; margin-top: 44px; ">
    <?= $map->display(); ?>
</div>




