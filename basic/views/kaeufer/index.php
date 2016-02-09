<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
            // 'titel',
            'vorname',
            'nachname',
            // 'strasse',
            // 'hausnr',
            // 'plz',
            // 'ort',
            // 'festnetz',
            // 'handy',
            // 'email:email',
            // 'anrede2',
            // 'titel2',
            // 'vorname2',
            // 'nachname2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
