<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kaeufer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kaeufers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kaeufer-view">

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
            'debitor_nr',
            'beurkundung_am',
            'verbindliche_fertigstellung',
            'uebergang_bnl',
            'abnahme_se',
            'abnahme_ge',
            'auflassung',
            'anrede',
            'titel',
            'vorname',
            'nachname',
            'strasse',
            'hausnr',
            'plz',
            'ort',
            'festnetz',
            'handy',
            'email:email',
            'anrede2',
            'titel2',
            'vorname2',
            'nachname2',
        ],
    ]) ?>

</div>
