<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Kaeufer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Käufer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kaeufer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (User::hasPermission('write_customer')): ?>
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
            //'id',
            'debitor_nr',
           // 'beurkundung_am',
           // 'verbindliche_fertigstellung',
           // 'uebergang_bnl',
           // 'abnahme_se',
           // 'abnahme_ge',
           // 'auflassung',
          //  'anrede',
		  [
    'attribute'=>'anrede',
	'value' => $model->anrede == 1 ? 'Frau' : 'Herr',
    
],
            'titel',
            'vorname',
            'nachname',
            [
    'attribute'=>'anrede2',
    'value' => $model->anrede2 == 1 ? 'Frau' : 'Herr',
    
],
            'titel2',
            'vorname2',
            'nachname2',
            'strasse',
            'hausnr',
            'plz',
            'ort',
            'festnetz',
            'handy',
            'email:email',
            //'anrede2',
            //'titel2',
            //'vorname2',
            //'nachname2',
        ],
    ]) ?>

</div>
