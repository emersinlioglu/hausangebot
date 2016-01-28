<?php
use yii\helpers\Html;
//use kartik\datetime\DateTimePicker;
use kartik\datecontrol\DateControl;
use yii\widgets\Pjax;

/* @var $modelDatenblatt app\models\Datenblatt */
/* @var $modelNachlass app\models\Nachlass */
/* @var $form yii\bootstrap\ActiveForm */
?>
<div class="col-md-6">
<div class="box-group" id="accordion">
    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
    <div class="panel box box-primary">
        <div class="box-header with-border">
            <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-zahlung" aria-expanded="true" class="">
                    Zahlungen:
                    
                    <?php 
                    $total = 0;
                    foreach($modelDatenblatt->zahlungs as $key => $modelZahlung) {
                        $total += $modelZahlung->betrag;
                    } ?>
                    (Summe: <?= Yii::$app->formatter->asCurrency($total) ?>)
                </a>
            </h4>
        </div><?php Pjax::begin(); ?>
        <div id="collapse-zahlung" class="panel-collapse collapse" aria-expanded="false">
            <div class="box-body">

                <table class="table table-bordered">
                    <tr>
                        <th>Datum</th>
                        <th>Betrag</th>
                        <th>Bemerkung</th>
                        <th>
                            <?= Html::a('<span class="fa fa-plus"> </span>',
                            Yii::$app->urlManager->createUrl(["datenblatt/addzahlung", 'datenblattId' => $modelDatenblatt->id]), 
                            ['class' => 'add-zahlung btn btn-success btn-xl']) ?>
                        </th>
                    </tr><?php Pjax::end(); ?>
                <?php 

                $rechnungstellungBetrag = 0;

                foreach($modelDatenblatt->zahlungs as $key => $modelZahlung): ?>
                <tr class="sonderwunsch">
                    <td>
                        <div class="hide">
                            <?= $form->field($modelZahlung, "[$key]id")->textInput() ?>
                        </div>
                        <?php
//                            $datum = DateTime::createFromFormat('Y-m-d H:i:s', $modelZahlung->datum);
//                            if ($datum) {
//                                $datum = $datum->format('d.m.Y');
//                            } else {
//                                $datum = '';
//                            }
//                            //echo '<label>Übergang BNL:</label>';
//                            echo DateTimePicker::widget([
//                                'name' => "Zahlung[$key][datum]",
//                                'options' => ['placeholder' => 'Datum auswählen'],
//                                'convertFormat' => true,
//                                'value' => $datum,
//                                'pluginOptions' => [
//                                    'minView' => 'month',
//                                    'maxView' => 'month',
//                                    'viewSelect' => 'month',
//                                    'format' => 'dd.mm.yyyy',
//                                    'autoclose' => true,
//                                    'todayHighlight' => true
//                                ]
//                            ]);
                            
                            echo $form->field($modelZahlung, "[$key]datum")->widget(DateControl::classname(), [
                                'type' => DateControl::FORMAT_DATE,
                                'options' => [
                                    'pluginOptions' => [
                                        //'autoclose' => true
                                    ]
                                ]
                            ]);
                        ?>
                    </td>
                    <td>
                        <?= $form->field($modelZahlung, "[$key]betrag")->textInput([]) ?>
                    </td>
                    <td>
                        <?= $form->field($modelZahlung, "[$key]bemerkung")->textInput([]) ?>
                    </td>
                    <td>
                        <?= Html::a('<span class="fa fa-minus"></span>', 
                            Yii::$app->urlManager->createUrl(["datenblatt/deletezahlung", 'datenblattId' => $modelDatenblatt->id , 'zahlungId' => $modelZahlung->id]), 
                            ['class' => 'add-zahlung btn btn-danger btn-xl']) ?>
                    </td>
                </tr>    
                <?php endforeach;  ?>

                </table>
                
                
                
                
            </div>
        </div>
    </div>
</div>
</div>


