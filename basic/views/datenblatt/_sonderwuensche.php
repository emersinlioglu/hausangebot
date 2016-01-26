<?php
//use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use kartik\datecontrol\DateControl;

/* @var $modelDatenblatt app\models\Datenblatt */
/* @var $form yii\bootstrap\ActiveForm */
?>
<div class="box-group" id="accordion">
    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
    <div class="panel box box-primary">
        <div class="box-header with-border">
            <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-sonderwunsch" aria-expanded="true" class="">
                    Sonderwünsche:
                </a>
            </h4>
        </div>
        <div id="collapse-sonderwunsch" class="panel-collapse collapse in" aria-expanded="false">
            <div class="box-body">
                
                
                <!--<h3>Sonderwünsche:</h3>-->

                <table class="table table-bordered">   
                    <tr>
                        <th></th>
                        <th colspan="2" >Angebot</th>
                        <th colspan="2" >beuaftragt</th>
                        <th colspan="3" >Rechnungsstellung</th>
                <!--        <th colspan="2" style="text-align: center;">Angebot</th>
                        <th colspan="2" style="text-align: center;">beuaftragt</th>
                        <th colspan="3" style="text-align: center;">Rechnungsstellung</th>-->
                    </tr>
                    <tr>
                        <th>Name</th>
                        <th>-Datum</th>
                        <th>-Betrag</th>
                        <th>-Datum</th>
                        <th>-Betrag</th>
                        <th>-Datum</th>
                        <th>-Betrag</th>
                        <th>-Rg.-Nr</th>
                        <th>
                            <?= Html::a('<span class="fa fa-plus"> </span>',
                            Yii::$app->urlManager->createUrl(["datenblatt/addsonderwunsch", 'datenblattId' => $modelDatenblatt->id]), 
                            ['class' => 'add-zahlung btn btn-success btn-xl']) ?>
                        </th>
                    </tr>
                <?php 

                $rechnungstellungBetrag = 0;

                foreach($modelDatenblatt->sonderwunsches as $key => $modelSonderwunsch): ?>
                <tr class="sonderwunsch">
                    <td>
                        <div class="hide">
                            <?= $form->field($modelSonderwunsch, "[$key]id")->textInput() ?>
                        </div>
                        <?= $form->field($modelSonderwunsch, "[$key]name")->textInput([]) ?>
                    </td>
                    <td>
                            <?php
//                                $datum = DateTime::createFromFormat('Y-m-d H:i:s', $modelSonderwunsch->angebot_datum);
//                                if ($datum) {
//                                    $datum = $datum->format('d.m.Y');
//                                } else {
//                                    $datum = '';
//                                }
                                //echo '<label>Übergang BNL:</label>';
//                                echo DateTimePicker::widget([
//                                    'name' => "Sonderwunsch[$key][angebot_datum]",
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
                                echo $form->field($modelSonderwunsch, "[$key]angebot_datum")->widget(DateControl::classname(), [
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
                        <?= $form->field($modelSonderwunsch, "[$key]angebot_betrag")->textInput([]) ?>
                    </td>
                    <td>
                        <?php
//                            $datum = DateTime::createFromFormat('Y-m-d H:i:s', $modelSonderwunsch->beauftragt_datum);
//                            if ($datum) {
//                                $datum = $datum->format('d.m.Y');
//                            } else {
//                                $datum = '';
//                            }
//                            //echo '<label>Übergang BNL:</label>';
//                            echo DateTimePicker::widget([
//                                'name' => "Sonderwunsch[$key][beauftragt_datum]",
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
                            
                            echo $form->field($modelSonderwunsch, "[$key]beauftragt_datum")->widget(DateControl::classname(), [
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
                        <?= $form->field($modelSonderwunsch, "[$key]beauftragt_betrag")->textInput([]) ?>
                    </td>
                    <td>
                        <?php
//                            $datum = DateTime::createFromFormat('Y-m-d H:i:s', $modelSonderwunsch->rechnungsstellung_datum);
//                            if ($datum) {
//                                $datum = $datum->format('d.m.Y');
//                            } else {
//                                $datum = '';
//                            }
//                            //echo '<label>Übergang BNL:</label>';
//                            echo DateTimePicker::widget([
//                                'name' => "Sonderwunsch[$key][rechnungsstellung_datum]",
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
                            
                            echo $form->field($modelSonderwunsch, "[$key]rechnungsstellung_datum")->widget(DateControl::classname(), [
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
                        <?php $rechnungstellungBetrag += (float)$modelSonderwunsch->rechnungsstellung_betrag; ?>
                        <?= $form->field($modelSonderwunsch, "[$key]rechnungsstellung_betrag")->textInput([]) ?>
                    </td>
                    <td>
                        <?= $form->field($modelSonderwunsch, "[$key]rechnungsstellung_rg_nr")->textInput([]) ?>
                    </td>
                    <td>
                        <?= Html::a('<span class="fa fa-minus"></span>', 
                            Yii::$app->urlManager->createUrl(["datenblatt/deletesonderwunsch", 'datenblattId' => $modelDatenblatt->id , 'sonderwunschId' => $modelSonderwunsch->id]), 
                            ['class' => 'add-zahlung btn btn-danger btn-xl']) ?>
                    </td>
                </tr>    
                <?php endforeach;  ?>
                <tr>
                    <td>Summe</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?= $rechnungstellungBetrag ?></td>
                    <td></td>
                    <td></td>    
                </tr>

            </table>
                
            </div>
        </div>
    </div>
</div>