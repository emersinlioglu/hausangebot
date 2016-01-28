<?php
use yii\helpers\Html;
//use kartik\datetime\DateTimePicker;
use kartik\datecontrol\DateControl;


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
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-nachlass" aria-expanded="true" class="">
                    Minderungen/Nachlass:
                    
                    <?php 
                    $total = 0;
                    foreach($modelDatenblatt->nachlasses as $item) {
                        $total += $item->betrag;
                    } ?>
                    (Summe: <?= Yii::$app->formatter->asCurrency($total) ?>)
                </a>
            </h4>
        </div>
        <div id="collapse-nachlass" class="panel-collapse collapse" aria-expanded="false">
            <div class="box-body">
                
                <table class="table table-bordered">
                    <tr>
                        <th>Schreiben vom</th>
                        <th>Betrag</th>
                        <th>Bemerkung</th>
                        <th><?= Html::a('<span class="fa fa-plus"> </span>',
                            Yii::$app->urlManager->createUrl(["datenblatt/addnachlass", 'datenblattId' => $modelDatenblatt->id]), 
                            ['class' => 'add-zahlung btn btn-success btn-xl']) ?></th>
                    </tr>
                <?php 

                $rechnungstellungBetrag = 0;

                foreach($modelDatenblatt->nachlasses as $key => $modelNachlass): ?>
                <tr class="sonderwunsch">
                    <td>
                        <div class="hide">
                            <?= $form->field($modelNachlass, "[$key]id")->textInput() ?>
                        </div>
                        <?php
//                            $datum = DateTime::createFromFormat('Y-m-d H:i:s', $modelNachlass->schreiben_vom);
//                            if ($datum) {
//                                $datum = $datum->format('d.m.Y');
//                            } else {
//                                $datum = '';
//                            }
//                            //echo '<label>Übergang BNL:</label>';
//                            echo DateTimePicker::widget([
//                                'name' => "Nachlass[$key][schreiben_vom]",
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
                            
                            echo $form->field($modelNachlass, "[$key]schreiben_vom")->widget(DateControl::classname(), [
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
                        <?= $form->field($modelNachlass, "[$key]betrag")->textInput([]) ?>
                    </td>
                    <td>
                        <?= $form->field($modelNachlass, "[$key]bemerkung")->textInput([]) ?>
                    </td>
                    <td>
                        <?= Html::a('<span class="fa fa-minus"></span>', 
                            Yii::$app->urlManager->createUrl(["datenblatt/deletenachlass", 'datenblattId' => $modelDatenblatt->id , 'nachlassId' => $modelNachlass->id]), 
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
