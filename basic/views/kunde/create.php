<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kunde */

$this->title = Yii::t('app', 'Create Kunde');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kundes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kunde-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
