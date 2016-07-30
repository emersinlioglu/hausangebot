<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KundeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Kundes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kunde-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Kunde'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'debitor_nr',
            'anrede',
            'titel',
            'vorname',
            // 'nachname',
            // 'email:email',
            // 'strasse',
            // 'hausnr',
            // 'plz',
            // 'ort',
            // 'festnetz',
            // 'handy',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
