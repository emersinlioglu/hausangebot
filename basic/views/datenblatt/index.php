<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DatenblattSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datenblätter';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datenblatt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Datenblatt erstellen', ['create'], ['class' => 'btn btn-success']) ?>
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

            [
                //'filter' => Html::activeTextField($model, 'te_nummer'),
                'attribute' => 'te_nummer',
                'value' => function($model) {
        
                    $haus = $model->haus;
//                    if ($haus) {
//                        foreach ($haus->teileigentumseinheits as $te) {
//                            if ($te->einheitstyp_id == 1) {
//                                return $te->te_nummer;
//                            }
//                        }
//                    }

                    $teNummers = array();
                    if ($haus) {
                        foreach ($haus->teileigentumseinheits as $te) {
                            $teNummers[] = $te->te_nummer;
                        }
                        asort($teNummers);
                    }
                    return implode('/ ', $teNummers);
                },
                'label' => 'TE-Nr'
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
          //  'nummer',
            
            
            
            
          //  ['class' => 'yii\grid\ActionColumn'],
		  
		  
		  
		  
		[
		'class' => 'yii\grid\ActionColumn',
        'contentOptions' => ['style' => 'width:200px;'],
        'header'=>'Actions',
        'template' => '{view}{update}{report}{delete} ',
        'buttons' => [

            'view' => function ($url, $model) {
                return Html::a('<span class="fa fa-search"></span> Anzeigen ', $url, [
                            'title' => Yii::t('app', 'View'),
                            'class'=>'btn btn-primary btn-xs',                                  
                ]);
            },
			
			'update' => function ($url, $model) {
                return Html::a('<span class=" glyphicon glyphicon-pencil"></span> Bearbeiten', $url, [
                            'title' => Yii::t('app', 'Update'),
                            'class'=>'btn btn-primary btn-xs',                                  
                ]);
            },
       
	  
	   
			//print button
            'report' => function ($url, $model) {
                return Html::a('<span class="fa fa-print"></span> Drucken', $url, [
                            'title' => Yii::t('app', 'Report'),
                            'class'=>'btn btn-primary btn-xs',                                  
                ]);
            },
			
			 
			 'delete' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span> Löschen', $url, [
                            'title' => Yii::t('app', 'Delete'),
                            'class'=>'btn btn-primary btn-xs',
							'data-confirm'=>'Wollen Sie diesen Eintrag wirklich löschen?',
							'data-method'=>'post',
												
                ]);
            },
			
        ],

        

       ],
		  
		  
			
			
			
			
        ],
    ]); ?>

</div>
