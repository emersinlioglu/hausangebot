<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Firma */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Firmen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firma-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (User::hasPermission('write_company')): ?>
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif; ?>        

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
          
            'name',
          //  'nr',
            [                      // the owner name of the model
            'label' => 'Firmen-Nr',
            'value' => $model->nr,
        ],
        ],
    ]) ?>

</div>
