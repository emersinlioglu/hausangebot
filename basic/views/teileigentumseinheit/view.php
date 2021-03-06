<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Teileigentumseinheit */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teileigentumseinheits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teileigentumseinheit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'haus_id',
            'einheitstyp_id',
            'te_nummer',
            'gefoerdert',
            'geschoss',
            'zimmer',
            'me_anteil',
            'wohnflaeche',
            'kaufpreis',
            'kp_einheit',
        ],
    ]) ?>

</div>
