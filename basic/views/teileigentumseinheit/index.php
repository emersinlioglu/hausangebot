<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TeileigentumseinheitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teileigentumseinheits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teileigentumseinheit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Teileigentumseinheit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'haus_id',
            'einheitstyp_id',
            'te_nummer',
            'gefoerdert',
            // 'geschoss',
            // 'zimmer',
            // 'me_anteil',
            // 'wohnflaeche',
            // 'kaufpreis',
            // 'kp_einheit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
