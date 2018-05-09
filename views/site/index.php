<?php
/* @var $this yii\web\View */

use app\models\Bovino;
use app\models\Fence;
use app\models\FenceCoordenada;
use app\models\Location;
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
$locationCurrent = Location::find()->with('locationDevice')->orderBy(['location_data' => SORT_DESC])->one();

$coord = new LatLng(['lat' => $locationCurrent->location_latitude, 'lng' => $locationCurrent->location_longitude]);
$map = new Map([
    'center' => $coord,
    'zoom' => 16,
    'width' => '98%',
    'height' => '420',
    'mapTypeId'      => 'satellite',
    'scrollwheel'    => false,
    'draggable'      => true,
    'draggingCursor' => true,
]);
$locat = Location::find()->with('locationDevice')->orderBy(['location_data' => SORT_DESC])->groupBy('device_id')->all();
$ll = new Location();

$locationCurrent = $ll->getLocationDevicesIcons();

foreach ($locationCurrent as $value){
    $dataFormatada = new DateTime($value['location_data']);
    $bovino = Bovino::find()->where(['bovino_id' => $value['bovino_id']])->one();
    $coord = new LatLng(['lat' => $value['location_latitude'], 'lng' => $value['location_longitude']]);
    $marker = new Marker([
        'position' => $coord,
        'title' => $bovino->bovino_nome,
        'icon' => $value['device_base'].$value['device_icon']
    ]);
    $marker->attachInfoWindow(
        new InfoWindow([
            'content' => '<table style="width: 250px">
                        <thred>
                            <tr>                              
                                <th style="font-weight: bold">ID</th>
                                <th style="font-weight: bold">NOME</th>                               
                                <th style="font-weight: bold">DATA</th>                               
                            </th>
                        </thred>
                        
                        <tbody>
                            <tr>
                                <td style="width: 40%">'.$bovino['bovino_id'].'</td>
                                <td style="width: 40%">'.$bovino['bovino_nome'].'</td>                               
                                <td style="width: 40%">'. $dataFormatada->format('d/m/Y H:i:s').'</td>                               
                            </tr>
                        </tbody>
                    </table>'
        ])
    );
    $map->addOverlay($marker);
}


$fences = Fence::find()->where(['fence_status' => 1])->with('fenceCoords')->all();

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

$bikeLayer = new BicyclingLayer(['map' => $map->getName()]);

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
?>

<div style="position: absolute; margin-top: -70px">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div class="diarias-view" style="margin-left: 209px; margin-top: 44px; ">
    <?= $map->display(); ?>
</div>




