<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

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

        <div class="col-md-4 col-sm-6 col-xs-12" style="float: none;">
        <div class="info-box">

            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-number"><h4>Serienbrief Datenquelle Export</h4></span>


                </br>
                <?php


                $gridColumns = [
                    //['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'projekt_name',
                        'value'=>'projekt.name',
                        'label' => 'Projekt'
                    ],
                    [
                        'attribute' => 'firma_nr',
                        'value'=>'firma.nr',
                        'label' => 'Firmen Nr.'
                    ],
                    
                    [
                        //'attribute' => 'haus_strasse',
                        'value'=>'haus.strasse',
                        'label' => 'Straße'
                    ],
                    [
                        //'attribute' => 'haus_hausnr',
                        'value'=>'haus.hausnr',
                        'label' => 'Haus Nr.'
                    ],
                    
                    [
                        //'attribute' => 'haus_plz',
                        'value'=>'haus.plz',
                        'label' => 'Plz'
                    ],
                    [
                        //'attribute' => 'haus_ort',
                        'value'=>'haus.ort',
                        'label' => 'Ort'
                    ],
               
                ];

                for ($i = 0; $i < $maxCountTEEinheits; $i++) {
                    $cnt = $i + 1;
                    $gridColumns[] = [
                        'value'=> "teeinheit__{$i}__te_name",
                        'label' => "{$cnt}. TE-Name"
                    ];
                    $gridColumns[] = [
                        'value'=> "teeinheit__{$i}__te_nummer",
                        'label' => "{$cnt}. TE-Nummer"
                    ];
                    $gridColumns[] = [
                        'value'=> "teeinheit__{$i}__gefoerdert",
                        'label' => "{$cnt}. TE-Gefoerdert",
                        'filter' => array(0 => Yii::t('app', 'No'), 1 => Yii::t('app', 'Yes')),
                    ];
                    $gridColumns[] = [
                        'value'=> "teeinheit__{$i}__geschoss",
                        'label' => "{$cnt}. TE-Geschoss"
                    ];
                    $gridColumns[] = [
                        'value'=> "teeinheit__{$i}__zimmer",
                        'label' => "{$cnt}. TE-Geschoss"
                    ];
                    $gridColumns[] = [
                        'value'=> "teeinheit__{$i}__me_anteil",
                        'label' => "{$cnt}. TE-ME-Anteil"
                    ];
                    $gridColumns[] = [
                        'value'=> "teeinheit__{$i}__wohnflaeche",
                        'label' => "{$cnt}. TE-Wohnfläche"
                    ];
                    $gridColumns[] = [
                        'value'=> "teeinheit__{$i}__kaufpreis",
                        'label' => "{$cnt}. TE-Kaufpreis"
                    ];
                }

                // Kaeufer Daten
                $gridColumns = array_merge($gridColumns, [
                    [
                        'value'=>'kaeufer.debitor_nr',
                        'label' => 'Debitoren Nr.'
                    ],
                    [
                        'value'=>'kaeufer.anredeLabel',
                        //'value'=> '$data->anrede == 1 ? "Herr" : "Frau"',
                        'label' => 'Käufer Anrede'
                    ],
                    [
                        'value'=>'kaeufer.vorname',
                        'label' => 'Käufer Vorname'
                    ],
                    [
                        'value'=>'kaeufer.nachname',
                        'label' => 'Käufer Name'
                    ],
                    [
                        'value'=>'kaeufer.vorname2',
                        'label' => '2. Käufer Vorname'
                    ],
                    [
                        'value'=>'kaeufer.nachname2',
                        'label' => '2. Käufer Name'
                    ],
                    [
                        'value'=>'kaeufer.beurkundungAmLabel',
                        'label' => 'Beurkundung am:'
                    ],
                    [
                        'value'=>'kaeufer.uebergangBnlLabel',
                        'label' => '-Übergang BNL'
                    ],
                    [
                        'value'=>'kaeufer.abnahmeSeLabel',
                        'label' => '-Abnahme SE'
                    ],
                    [
                        'value'=>'kaeufer.abnahmeGeLabel',
                        'label' => '-Abnahme GE'
                    ],
                    [
                        'value'=>'kaeufer.strasse',
                        'label' => 'Straße'
                    ],
                    [
                        'value'=>'kaeufer.hausnr',
                        'label' => 'Hausnr.'
                    ],
                    [
                        'value'=>'kaeufer.plz',
                        'label' => 'PLZ'
                    ],
                    [
                        'value'=>'kaeufer.ort',
                        'label' => 'Ort'
                    ],
                ]);

                for ($i = 0; $i < $maxCountSonderwunsches; $i++) {
                    $cnt = $i + 1;
                    $gridColumns[] = [
                        'value'=> "sonderwunsch__{$i}__name",
                        'label' => "{$cnt}. SW-Name"
                    ];
                    $gridColumns[] = [
                        'value'=> "sonderwunsch__{$i}__rechnungsstellung_betrag",
                        'label' => "{$cnt}. SW-Rechnungsstellungsbetrag"
                    ];
                    $gridColumns[] = [
                        'value'=> "sonderwunsch__{$i}__rechnungsstellung_rg_nr",
                        'label' => "{$cnt}. SW-Rechnungsstellung-Rg.-Nr."
                    ];
                }

                for ($i = 0; $i < $maxCountAbschlags; $i++) {
                    $cnt = $i + 1;
                    $gridColumns[] = [
                        'value'=> "abschlag__{$i}__name",
                        'label' => "{$cnt}. Abschlag-Name"
                    ];
                }

                for ($i = 0; $i < $maxCountNachlasses; $i++) {
                    $cnt = $i + 1;
                    $gridColumns[] = [
                        'value'=> "nachlass__{$i}__schreibenVomLabel",
                        'label' => "{$cnt}. Nachlass-Schreiben vom:"
                    ];
                }

                $gridColumns[] = [
                    'value'=> "nachlassSumme",
                    'label' => "Minderungen/Nachlaß-Summe:"
                ];

                for ($i = 0; $i < $maxCountZahlungs; $i++) {
                    $cnt = $i + 1;
                    $gridColumns[] = [
                        'value'=> "zahlung__{$i}__datumLabel",
                        'label' => "{$cnt}. Zahlung-Datum:"
                    ];
                    $gridColumns[] = [
                        'value'=> "zahlung__{$i}__betrag",
                        'label' => "{$cnt}. Zahlung-betrag:"
                    ];
                }

                $gridColumns[] = [
                    'value'=> "zahlungSumme",
                    'label' => "Zahlungen- bereits gezahlt:"
                ];

                $gridColumns[] = [
                    'value'=> "offenePosten",
                    'label' => "Offene Posten:"
                ];


                echo ExportMenu::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => $gridColumns,
                    //'fontAwesome' => true,
                    'columnSelectorOptions' => [
                        'label' => 'Felder auswählen.',
                        //'class' => 'btn btn-success',
                    ],
                    'exportConfig' => [
                        ExportMenu::FORMAT_HTML => false,
                        ExportMenu::FORMAT_TEXT => false,
                        ExportMenu::FORMAT_PDF => false
                    ],
                    'dropdownOptions' => [
                        'label' => 'Export Typ auswählen',
                        //  'class' => 'btn btn-success',
                        //
                    ],
                ]);

                ?>
            </div>
            <!-- /.info-box-content -->

        </div>
    </div>
	

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
                'format' => 'html',
                'attribute' => 'te_nummer',
                'value' => 'tenummerHtml',
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
