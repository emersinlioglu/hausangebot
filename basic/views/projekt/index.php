<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjektSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projekte';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projekt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Projekt erstellen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'name',
           // 'firma_id',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
