<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Datenblatt */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Datenblatts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datenblatt-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'firma_id',
            'projekt_id',
            'haus_id',
            'nummer',
            'kaeufer_id',
            'besondere_regelungen_kaufvertrag:ntext',
            'sonstige_anmerkungen:ntext',
        ],
    ]) ?>

</div>
