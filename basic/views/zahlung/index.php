<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ZahlungSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zahlungs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zahlung-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Zahlung', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'datenblatt_id',
            'datum',
            'betrag',
            'bemerkung',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
