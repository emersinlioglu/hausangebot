<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Zahlung */

$this->title = 'Create Zahlung';
$this->params['breadcrumbs'][] = ['label' => 'Zahlungs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zahlung-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
