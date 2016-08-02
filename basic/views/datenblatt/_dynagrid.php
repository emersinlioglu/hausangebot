<?php

use yii\helpers\Html;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;
use webvimark\modules\UserManagement\models\User;


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

echo DynaGrid::widget([
    'columns'=>$columns,
    //'storage'=>DynaGrid::TYPE_COOKIE,
    'theme'=>'panel-default',
    /*
        'themeConfig' => [
            'themeSettings' => [
                'aass' => ['panel'=>false,'bordered'=>false,'striped'=>false,'hover'=>true,]
            ]
        ],
    */
    'gridOptions'=>[
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        //'id' => 'ttt',
        'id'=>'DatenblattSearch',
        'panel'=>['heading'=>'<h3 class="panel-title">Datenblätter</h3>'],
        //'allowPageSettings' => true,
    ],
    'options'=>[
        'id' => 'dynagrid-datenblatt',
        'class' => User::hasPermission('export') ? '' : 'no-export'

        //'defaultPageSize' => 0,
	] // a unique identifier is important
]);