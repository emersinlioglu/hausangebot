<?php

use webvimark\modules\UserManagement\models\User;

use yii\helpers\Html;
//use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\DatenblattSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datenblätter';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datenblatt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if (User::hasPermission('write_datasheets')): ?>
        <p>
            <?= Html::a('Datenblatt erstellen', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

<!--
        <div class="col-md-5 col-sm-6 col-xs-12" style="float: none;">
        <div class="info-box">

            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-number"><h4>Serienbrief Datenquelle Export</h4></span>

                <?php  
                    /*
                    echo $this->render('_gridexport', [
                        'dataProvider' => $dataProvider, 
                        'searchModel' => $searchModel,
                        'maxCountTEEinheits' => $maxCountTEEinheits,
                        'maxCountSonderwunsches' => $maxCountSonderwunsches,
                        'maxCountAbschlags' => $maxCountAbschlags,
                        'maxCountNachlasses' => $maxCountNachlasses,
                        'maxCountZahlungs' => $maxCountZahlungs,
                        ]); 
                    */
                ?>

            </div>
        </div>

-->        
    </div>

    <?php 
    /*
        if (User::hasPermission('export')) {
            echo $this->render('_gridexport', [
                'dataProvider' => $dataProvider, 
                'searchModel' => $searchModel,
                'maxCountTEEinheits' => $maxCountTEEinheits,
                'maxCountSonderwunsches' => $maxCountSonderwunsches,
                'maxCountAbschlags' => $maxCountAbschlags,
                'maxCountNachlasses' => $maxCountNachlasses,
                'maxCountZahlungs' => $maxCountZahlungs,
                ]); 
            
        }
    */
    ?>
    
    <?php  echo $this->render('_dynagrid', [
        'dataProvider' => $dataProvider, 
        'searchModel' => $searchModel,
        'maxCountTEEinheits' => $maxCountTEEinheits,
        'maxCountSonderwunsches' => $maxCountSonderwunsches,
        'maxCountAbschlags' => $maxCountAbschlags,
        'maxCountNachlasses' => $maxCountNachlasses,
        'maxCountZahlungs' => $maxCountZahlungs,
    ]); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    

</div>
