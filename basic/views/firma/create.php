<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Firma */

$this->title = Yii::t('app', 'Create Firma');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Firmas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firma-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
