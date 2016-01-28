<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AbschlagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Abschlags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abschlag-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Abschlag', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'datenblatt_id',
            'name',
            'kaufvertrag_prozent',
            'kaufvertrag_betrag',
            // 'kaufvertrag_angefordert',
            // 'sonderwunsch_prozent',
            // 'sonderwunsch_betrag',
            // 'sonderwunsch_angefordert',
            // 'summe',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
