<?php

use yii\helpers\Html;
use yii\grid\GridView;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FirmaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Firmen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firma-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if (User::hasPermission('write_company')): ?>
        <p>
            <?= Html::a('Firma erstellen', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
           // 'nr',
             [
                'attribute' => 'nr',
                'value'=>'nr',
                'label' => 'Firmen Nr.'
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return User::hasPermission('write_company') ? Html::a('Update', $url) : '';
                    },
                    'delete' => function ($url, $model, $key) {
                        return User::hasPermission('write_company') ? Html::a('Delete', $url) : '';
                    }
                ]
            ],

        ],
    ]); ?>

</div>
