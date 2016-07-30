<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Projekt */

$this->title = 'Projekt erstellen';
$this->params['breadcrumbs'][] = ['label' => 'Projekte', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projekt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
