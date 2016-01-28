<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kaeufer */

$this->title = 'Update Kaeufer: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kaeufers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kaeufer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
