<?php

use common\widgets\DataTitles;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $titles DataTitles */
/* @var $model app\models\fs\Account */

//$this->title = $titles->windowCreate();
$this->title = 'Create nested set';

?>
<div class="receipt-deposit-create">

    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Title</h3>
        </div>

        <div class="panel-body">
            <?= $this->render('_form', [
                'modelDatenblatt' => $modelDatenblatt,
//                'modelKaeufer' => $modelKaeufer,
                'modelsZahlung'  => $modelsZahlung,
                'modelsNachlass'  => $modelsNachlass,
//                'modelsPaymentLoads' => $modelsPaymentLoads,
            ]) ?>
            
        </div>
    </div>


</div>