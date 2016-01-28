<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DatenblattSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datenblatts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datenblatt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Datenblatt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'firma_id',
            //'projekt_id',
            //'haus_id',
             [
                'attribute' => 'firma_name',
                'value'=>'firma.name',
                'label' => 'Firma'
            ],
            [
                'attribute' => 'firma_nr',
                'value'=>'firma.nr',
                'label' => 'Firmen Nr.'
            ],
            [
                'attribute' => 'projekt_name',
                'value'=>'projekt.name',
                'label' => 'Projekt'
            ],
            [
                'attribute' => 'haus_strasse',
                'value'=>'haus.strasse',
                'label' => 'Straße'
            ],
             [
                'attribute' => 'haus_hausnr',
                'value'=>'haus.hausnr',
                'label' => 'Haus Nr.'
            ],
             [
                'attribute' => 'haus_plz',
                'value'=>'haus.plz',
                'label' => 'Plz'
            ],
            
             [
                'attribute' => 'haus_ort',
                'value'=>'haus.ort',
                'label' => 'Ort'
            ],
            [
                'attribute' => 'kaeufer_debitornr',
                'value'=>'kaeufer.debitor_nr',
                'label' => 'Debitoren Nr.'
            ],

            [
                'attribute' => 'kaeufer_vorname',
                'value'=>'kaeufer.vorname',
                'label' => 'Käufer Vorname'
            ],

            [
                'attribute' => 'kaeufer_nachname',
                'value'=>'kaeufer.nachname',
                'label' => 'Käufer Name'
            ],
            
                

                
        //    [
          //      'attribute' => 'haus',
//                'format' => 'raw',
          //      'value' => function ($model) {                      
          //          $str = '';
          //          if ($model->haus) {
          //              $haus = $model->haus;
          //              $str = $haus->strasse . ' ' . $haus->hausnr . ' ' . $haus->plz . ' ' . $haus->ort ;
          //          }
          //              
          //          return $str;
          //      },
          //      'label' => 'Hause-Adresse'
          //  ],
            'nummer',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
