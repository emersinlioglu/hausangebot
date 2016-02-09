<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Haus */

$this->title = 'Objekt Update: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Objekte', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="haus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
