<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Einheitstyp */

$this->title = 'Create Einheitstyp';
$this->params['breadcrumbs'][] = ['label' => 'Einheitstyps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="einheitstyp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
