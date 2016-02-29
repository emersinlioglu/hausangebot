<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\HausSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Objekte';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="haus-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Objekt erstellen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'projekt_id',
            
             [
                'attribute' => 'firma_name',
                'value'=>'projekt.firma.name',
                'label' => 'Firma'
            ],
 [
                'attribute' => 'firma_nr',
                'value'=>'projekt.firma.nr',
                'label' => 'Firmen Nr.'
            ],
            [
                'attribute' => 'projekt_name',
                'value'=>'projekt.name',
                'label' => 'Projekt'
            ],
            
			
			// 'reserviert',
			[
      'class'=>'kartik\grid\BooleanColumn',
      'attribute'=>'reserviert', 
      'vAlign'=>'middle',
	  'trueLabel'=>'Ja',
	  'falseLabel'=>'Nein',
     // 'filterType'=>GridView::FILTER_CHECKBOX,
],
 // 'verkauft',
			[
      'class'=>'kartik\grid\BooleanColumn',
      'attribute'=>'verkauft', 
      'vAlign'=>'middle',
	  'trueLabel'=>'Ja',
	  'falseLabel'=>'Nein',
     // 'filterType'=>GridView::FILTER_CHECKBOX,
],
 // 'rechnung_vertrieb',
			[
      'class'=>'kartik\grid\BooleanColumn',
      'attribute'=>'rechnung_vertrieb', 
      'vAlign'=>'middle',
	  'trueLabel'=>'Ja',
	  'falseLabel'=>'Nein',
     // 'filterType'=>GridView::FILTER_CHECKBOX,
],
		
			
			
            'strasse',
            'plz',
            'ort',

            [
                'label' => 'Datenblatt',
                'format' => 'raw',
                'value' => function ($model, $key, $index, $widget) {
                    $link = '';
                    if (count($model->datenblatts) > 0) {
                        $url = \yii\helpers\Url::to(['datenblatt/update', 'id' => $model->datenblatts[0]->id]);
                        $link = Html::a('> Datenblatt', $url);
                    }

                    return $link ;
                },
            ],
            
           
            // 'hausnr',
	
          
           
           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
