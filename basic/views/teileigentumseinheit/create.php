<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Teileigentumseinheit */

$this->title = Yii::t('app', 'Create Teileigentumseinheit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teileigentumseinheits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teileigentumseinheit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
