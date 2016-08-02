<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use webvimark\modules\UserManagement\models\User;


/* @var $this yii\web\View */
/* @var $model app\models\Haus */

$this->title = 'Teileigentumseinheit '.'';
$this->params['breadcrumbs'][] = ['label' => 'Teileigentumseinheiten', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="haus-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (User::hasPermission('write_ownership')): ?>
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif; ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
           // 'projekt_id',

            'projekt.name',
            'projekt.firma.name',
            'plz',
            'ort',
            'strasse',
            'hausnr',
 //           'reserviert',
//            [
//                'attribute' => 'reserviert',
//                'format' => 'raw',
//                'value' => function ($model, $index, $widget) {
//                    return $model->reserviert ? 'Ja' : 'Nein';
//                    //return Html::checkbox('foo[]', $model->foo, ['value' => $index, 'disabled' => true]);
//                },
//            ],
            [
                'attribute' => 'reserviert',
                'format' => 'boolean',
            ],
            [
                'attribute' => 'verkauft',
                'format' => 'boolean',
            ],
            [
                'attribute' => 'rechnung_vertrieb',
                'format' => 'boolean',
            ],
        //    'verkauft',
        //    'rechnung_vertrieb',
        ],
    ]) ?>

  
</div>
