<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EinheitstypSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Einheitstypen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="einheitstyp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Einheitstyp erstellen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'einheit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
