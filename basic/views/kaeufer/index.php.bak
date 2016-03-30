<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KaeuferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Käufer';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="kaeufer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Käufer erstellen', ['create'], ['class' => 'btn btn-success']) ?>
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
    'debitor_nr',
	 [
    'attribute'=>'anrede',
    'value'=> 'anredeLabel',
],
     'titel',
	'vorname',
    'nachname',
    'strasse',
     'hausnr',
     'plz',
     'ort',
     'festnetz',
     'handy',
     'email:email',
    //'publish_date',
    //'status',
    //['class' => 'yii\grid\ActionColumn'],
];
 
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
	//'fontAwesome' => true,
	'columnSelectorOptions'=>[
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
	//	'class' => 'btn btn-success',
      //  
    ],
]);
	
	?>
	 </div>
            <!-- /.info-box-content -->

			</div></div>

	

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'debitor_nr',
            //'beurkundung_am',
            //'verbindliche_fertigstellung',
            //'uebergang_bnl',
            // 'abnahme_se',
            // 'abnahme_ge',
            // 'auflassung',
            // 'anrede',
			[
    'attribute'=>'anrede',
    'value'=> 'anredeLabel',
	'filter' => array(0 => 'Herr', 1 => 'Frau'),
],
             'titel',
//            'vorname',
            'nachname',
             'strasse',
             'hausnr',
             'plz',
             'ort',
            // 'festnetz',
            // 'handy',
             'email:email',
            // 'anrede2',
            // 'titel2',
            // 'vorname2',
            // 'nachname2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
