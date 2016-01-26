<?php
use yii\helpers\Html;
//use kartik\datetime\DateTimePicker;
use kartik\datecontrol\DateControl;

/* @var $modelDatenblatt app\models\Datenblatt */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="box-group" id="accordion">
    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
    <div class="panel box box-primary">
        <div class="box-header with-border">
            <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-kaufpreisabrechnung" aria-expanded="true" class="">
                    Kaufpreisabrechnung:
                </a>
            </h4>
        </div>
        <div id="collapse-kaufpreisabrechnung" class="panel-collapse collapse in" aria-expanded="false">
            <div class="box-body">

                <!--<h3>Kaufpreisabrechnung:</h3>-->

                <table class="table table-bordered">   
                    <tr>
                        <th>Bezeichnung</th>
                        <th colspan="3" >Kaufvertrag</th>
                        <th colspan="3" >beuaftragt</th>
                        <th >Summe</th>
                <!--        <th colspan="2" style="text-align: center;">Angebot</th>
                        <th colspan="2" style="text-align: center;">beuaftragt</th>
                        <th colspan="3" style="text-align: center;">Rechnungsstellung</th>-->
                    </tr>
                    <tr>
                        <th></th>
                        <th>- in %</th>
                        <th>-Betrag</th>
                        <th>-angefordert</th>
                        <th>- in %</th>
                        <th>-Betrag</th>
                        <th>-angefordert</th>
                        <th></th>
                        <th>
                            <?= Html::a('<span class="fa fa-plus"> </span>',
                                Yii::$app->urlManager->createUrl(["datenblatt/addabschlag", 'datenblattId' => $modelDatenblatt->id]), 
                                ['class' => 'add-zahlung btn btn-success btn-xl']) ?>
                        </th>
                    </tr>
                    <?php 

                    $kaufvertragProzentTotal  = 0;
                    $kaufvertragBetragTotal   = 0;
                    $sonderwunschProzentTotal = 0;
                    $sonderwunschBetragTotal  = 0;

                    foreach($modelDatenblatt->abschlags as $key => $modelAbschlag): ?>
                    <tr class="sonderwunsch">
                        <td>
                            <div class="hide">
                                <?= $form->field($modelAbschlag, "[$key]id")->textInput() ?>
                            </div>
                            <?= $form->field($modelAbschlag, "[$key]name")->textInput([]) ?>
                        </td>
                        <td>
                            <?= $form->field($modelAbschlag, "[$key]kaufvertrag_prozent")->textInput([]) ?>
                            <?php $kaufvertragProzentTotal += $modelAbschlag->kaufvertrag_prozent ?>
                        </td>
                        <td>
                            <?= $form->field($modelAbschlag, "[$key]kaufvertrag_betrag")->textInput(['disabled' => 'disabled']) ?>
                            <?php $kaufvertragBetragTotal += $modelAbschlag->kaufvertrag_betrag ?>
                        </td>
                        <td>
                            <?php
//                                $datum = DateTime::createFromFormat('Y-m-d H:i:s', $modelAbschlag->kaufvertrag_angefordert);
//                                if ($datum) {
//                                    $datum = $datum->format('d.m.Y');
//                                } else {
//                                    $datum = '';
//                                }
//                                //echo '<label>Übergang BNL:</label>';
//                                echo DateTimePicker::widget([
//                                    'name' => "Abschlag[$key][kaufvertrag_angefordert]",
//                                    'options' => ['placeholder' => 'Datum auswählen'],
//                                    'convertFormat' => true,
//                                    'value' => $datum,
//                                    'pluginOptions' => [
//                                        'minView' => 'month',
//                                        'maxView' => 'month',
//                                        'viewSelect' => 'month',
//                                        'format' => 'dd.mm.yyyy',
//                                        'autoclose' => true,
//                                        'todayHighlight' => true
//                                    ]
//                                ]);
                                echo $form->field($modelAbschlag, "[$key]kaufvertrag_angefordert")->widget(DateControl::classname(), [
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
                            <?= $form->field($modelAbschlag, "[$key]sonderwunsch_prozent")->textInput([]) ?>
                            <?php $sonderwunschProzentTotal += $modelAbschlag->sonderwunsch_prozent ?>
                        </td>
                        <td>
                            <?= $form->field($modelAbschlag, "[$key]sonderwunsch_betrag")->textInput(['disabled' => 'disabled']) ?>
                            <?php $sonderwunschBetragTotal += $modelAbschlag->sonderwunsch_betrag ?>
                        </td>
                        <td>
                            <?php
//                                $datum = DateTime::createFromFormat('Y-m-d H:i:s', $modelAbschlag->sonderwunsch_angefordert);
//                                if ($datum) {
//                                    $datum = $datum->format('d.m.Y');
//                                } else {
//                                    $datum = '';
//                                }
//                                //echo '<label>Übergang BNL:</label>';
//                                echo DateTimePicker::widget([
//                                    'name' => "Abschlag[$key][sonderwunsch_angefordert]",
//                                    'options' => ['placeholder' => 'Datum auswählen'],
//                                    'convertFormat' => true,
//                                    'value' => $datum,
//                                    'pluginOptions' => [
//                                        'minView' => 'month',
//                                        'maxView' => 'month',
//                                        'viewSelect' => 'month',
//                                        'format' => 'dd.mm.yyyy',
//                                        'autoclose' => true,
//                                        'todayHighlight' => true
//                                    ]
//                                ]);
                                echo $form->field($modelAbschlag, "[$key]sonderwunsch_angefordert")->widget(DateControl::classname(), [
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
                            <?= $form->field($modelAbschlag, "[$key]summe")->textInput(['disabled' => 'disabled']) ?>
                        </td>
                        <td>
                            <?= Html::a('<span class="fa fa-minus"></span>', 
                                Yii::$app->urlManager->createUrl(["datenblatt/deleteabschlag", 'datenblattId' => $modelDatenblatt->id , 'abschlagId' => $modelAbschlag->id]), 
                                ['class' => 'add-zahlung btn btn-danger btn-xl']) ?>
                        </td>
                    </tr>    
                    <?php endforeach;  ?>
                    <tr>
                        <td>Summe</td>
                        <td><?= $kaufvertragProzentTotal ?> %</td>
                        <td><?= $kaufvertragBetragTotal ?> EUR</td>
                        <td></td>
                        <td><?= $sonderwunschProzentTotal ?> %</td>
                        <td><?= $sonderwunschBetragTotal ?> EUR</td>
                        <td></td>
                        <td><?= $kaufvertragBetragTotal + $sonderwunschBetragTotal ?> EUR</td>
                        <td></td>
                    </tr>

                </table>

            </div>
        </div>
    </div>
</div>