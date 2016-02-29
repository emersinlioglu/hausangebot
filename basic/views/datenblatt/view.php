<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Datenblatt */

$this->title = 'Datenblatt '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Datenblätter', 'url' => ['index']];
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
		<?= Html::a('<i class="fa  fa-print text-white"></i>   Report', ['report', 'id' => $model->id], [
            'class' => 'btn btn-info',
            'data' => [
                 'class'=>'btn btn-info',
         'target'=> '_blank',
         'data-toggle'=>'tooltip',
         'title'=>'Generate the pdf'
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'projekt.name',
            'projekt.firma.name',
			   'projekt.firma.nr',
            //'firma_id',
            //'projekt_id',
            //'haus_id',
            //'nummer',
            //'kaeufer_id',
            [
                'attribute' => 'haus.reserviert',
                'format' => 'boolean',
            ],
            [
                'attribute' => 'haus.verkauft',
                'format' => 'boolean',
            ],
            [
                'attribute' => 'haus.rechnung_vertrieb',
                'format' => 'boolean',
            ],
            
            
            
            //'haus.te',
            
          //  'haus.verkauft',
          //  'haus.rechnung_vertrieb',
            
            'kaeufer.debitor_nr',
            'kaeufer.vorname',
            'kaeufer.nachname',
            
            'besondere_regelungen_kaufvertrag:ntext',
            'sonstige_anmerkungen:ntext',
        ],
    ]) ?>

</div>
