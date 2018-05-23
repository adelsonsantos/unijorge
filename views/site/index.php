<?php
require 'style.php';
/* @var $this yii\web\View */

use app\models\Bovino;
use app\models\Fence;
use app\models\Location;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\layers\BicyclingLayer;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;

$this->title = 'Unijorge';
?>
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
    $coordsValidate = [];
    foreach ($value->fenceCoords as $key){
        array_push($coords, new LatLng(['lat' => $key->fence_coord_latitude, 'lng' => $key->fence_coord_longitude]));
        array_push($coordsValidate, [$key->fence_coord_latitude,$key->fence_coord_longitude]);
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

<?php $marginTop = 64;
        if(!empty($ll->getLocationOutsideFence())){
            $marginTop = 44;
            echo Yii::$app->controller->renderPartial('alert_outside_fence');
        }?>


<div style="position: absolute; margin-top: -52px">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div class="diarias-view" style="margin-left: 209px; margin-top: <?=$marginTop;?>px; ">
    <?= $map->display(); ?>
</div>
<script type="application/javascript">
    var arraynext = [];
</script>
<?php
foreach ($coordsValidate as $value){;?>
    <script>
        arraynext.push(['<?=$value[0]?>', '<?=$value[1]?>']);
    </script>
    <?php
}
?>

<script>
    function inside(point, vs) {
        var x = point[0], y = point[1];
        var inside = false;
        for (var i = 0, j = vs.length - 1; i < vs.length; j = i++) {
            var xi = vs[i][0], yi = vs[i][1];
            var xj = vs[j][0], yj = vs[j][1];

            var intersect = ((yi > y) !== (yj > y))
                && (x < (xj - xi) * (y - yi) / (yj - yi) + xi);
            if (intersect) inside = !inside;
        }
        return inside;
    }
    console.log(inside([ '-12.9398182', '-38.4140443' ], arraynext)); // true

</script>

