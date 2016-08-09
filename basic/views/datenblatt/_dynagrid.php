<?php

use yii\helpers\Html;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;
use webvimark\modules\UserManagement\models\User;
use kartik\dynagrid\Module;


$columns = [
	['class'=>'kartik\grid\SerialColumn', 'order'=>DynaGrid::ORDER_FIX_LEFT],
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
	/*
    [
        'class'=>'kartik\grid\ActionColumn',
        'dropdown'=>false,
        'order'=>DynaGrid::ORDER_FIX_RIGHT
    ],
	*/
	[
		'class' => 'kartik\grid\ActionColumn',
		//'contentOptions' => ['style' => 'width:200px;'],
		//'header'=>'Actions',
		'template' => '{view}{update}{report}{delete} ',
		'buttons' => [
			'view' => function ($url, $model) {

                if (User::hasPermission('read_datasheets')) {
    				return Html::a('<span class="fa fa-search"></span> Anzeigen ', $url, [
    							'title' => Yii::t('app', 'View'),
    							'class'=>'btn btn-primary btn-xs',                                  
    				]);
                } else {
                    return '';
                }
			},	
			'update' => function ($url, $model) {
                if (User::hasPermission('write_datasheets')) {
    				return Html::a('<span class=" glyphicon glyphicon-pencil"></span> Bearbeiten', $url, [
    							'title' => Yii::t('app', 'Update'),
    							'class'=>'btn btn-primary btn-xs',                                  
    				]);
                } else {
                    return '';
                }
			},
			//print button
			'report' => function ($url, $model) {
                if (User::hasPermission('report')) {
    				return Html::a('<span class="fa fa-print"></span> Drucken', $url, [
    							'title' => Yii::t('app', 'Report'),
    							'class'=>'btn btn-primary btn-xs',                                  
    				]);
                } else {
                    return '';
                }
			},
			'delete' => function ($url, $model) {
                if (User::hasPermission('write_datasheets')) {
    				return Html::a('<span class="glyphicon glyphicon-trash"></span> Löschen', $url, [
    							'title' => Yii::t('app', 'Delete'),
    							'class'=>'btn btn-primary btn-xs',
    							'data-confirm'=>'Wollen Sie diesen Eintrag wirklich löschen?',
    							'data-method'=>'post',									
    				]);
                } else {
                    return '';
                }
			},
			
		],  
	],
    ['class'=>'kartik\grid\CheckboxColumn', 'order'=>DynaGrid::ORDER_FIX_RIGHT],
];

//////////////////////////////////////////////  SECOND ////////////////////////////////////


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




echo DynaGrid::widget([
    
    //'columns'=>$columns,
    'columns'=>$gridColumns,

    'storage'=>DynaGrid::TYPE_DB,
    'userSpecific'=>true,
    'enableMultiSort' => true,

    'gridOptions'=>[
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        //'id' => 'ttt',
        'id'=>'DatenblattSearch',
        'panel'=>[
            'heading'=>'<h3 class="panel-title">Datenblätter</h3>',
            //'before' => '{dynagridFilter} {dynagridSort} {dynagrid}',
            //'before' => '{dynagridRepeat} {dynagridFilter} {dynagridSort} {dynagrid}',
        ],
        'toolbar' =>  [
            [
                'content'=> Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['datenblatt/index'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>'Zurücksetzen'])
            ],
            [
                'content'=>'{dynagridFilter}{dynagridSort}{dynagrid}'
            ],
            '{export}',
        ]
    ],
    'options'=>[
        'id' => 'dynagrid-datenblatt',
        'class' => User::hasPermission('export') ? '' : 'no-export'

        //'defaultPageSize' => 0,
	] // a unique identifier is important
]);