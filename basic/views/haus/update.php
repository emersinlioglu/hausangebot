<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Haus */

$this->title = 'Teileigentumseinheit Update: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Teileigentumseinheiten', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'hier auch te nr $model->id', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="haus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
