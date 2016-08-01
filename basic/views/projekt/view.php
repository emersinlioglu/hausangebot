<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Projekt */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Projekts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projekt-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            'firma.name',
        ],
    ]) ?>

     <div class="col-md-6">
        <div class="box-group" id="accordion">
            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#collapse-nachlass" href="#collapse-nachlass" aria-expanded="true" class="">
                            Zugewiesene Benutzer:
                        </a>
                    </h4>
                </div>

                <div id="collapse-nachlass" class="panel-collapse collapse in" aria-expanded="false">
                    <div class="box-body">
                        
                        <table class="assigned-users">
                        <?php foreach($model->users as $key => $user): ?>
                            <tr>
                                <td><?= $user->username ?></td>
                            </tr>    
                        <?php endforeach;  ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
