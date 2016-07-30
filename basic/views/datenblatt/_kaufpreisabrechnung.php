<?php
use yii\helpers\Html;
//use kartik\datetime\DateTimePicker;
use kartik\datecontrol\DateControl;
use kartik\money\MaskMoney;

/* @var $modelDatenblatt app\models\Datenblatt */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="box-group" id="accordion">
    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
    <div class="panel box box-primary">
        <div class="box-header with-border">
            <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#collapse-kaufpreisabrechnung" href="#collapse-kaufpreisabrechnung" aria-expanded="true" class="">
                    Kaufpreisabrechnung:
                </a>
            </h4>
        </div>
        <div id="collapse-kaufpreisabrechnung" class="panel-collapse collapse in" aria-expanded="false">
            <div class="box-body">

                <table class="table table-bordered">   
                    <tr>
                        <th>Bezeichnung</th>
                        <th colspan="3" >Kaufvertrag</th>
                        <th colspan="3" >Sonderwünche/Ausstattung</th>
                        <th >Summe (€)</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>- in %</th>
                        <th>-Betrag ( € )</th>
                        <th>-angefordert</th>
                        <th>- in %</th>
                        <th>-Betrag ( € )</th>
                        <th>-angefordert</th>
                        <th></th>
                        <th>
                            <?= Html::a('<span class="fa fa-plus"> </span>',
                                Yii::$app->urlManager->createUrl(["datenblatt/addabschlag", 'datenblattId' => $modelDatenblatt->id]), 
                                ['class' => 'add-button add-zahlung btn btn-success btn-xl']) ?>
                        </th>
                    </tr>
                    <?php 

                    $kvSummeProzent = 0;
                    $kvSummeBetrag = 0;
                    $swSummeProzent = 0;
                    $swSummeBetrag = 0;
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
                            <?php 
                                $kaufvertragProzentTotal += $modelAbschlag->kaufvertrag_prozent 
                            ?>
                        </td>
                        <td>
                            <?= $form->field($modelAbschlag, "[$key]kaufvertrag_betrag")
                                //->textInput(['disabled' => 'disabled'])
                                ->widget(MaskMoney::classname(), [
                                    'options' => [
                                        'id' => $key . '-kaufvertrag_betrag-id',
                                        'disabled' => 'disabled'
                                    ],
                                ])
                            ?>
                            <?php 
                            if($modelAbschlag->kaufvertrag_angefordert) {
                                $kaufvertragBetragTotal += (float)$modelAbschlag->kaufvertrag_betrag;
                            } 
                            $kvSummeBetrag += (float)$modelAbschlag->kaufvertrag_betrag;
                            ?>
                        </td>
                        <td>
                            <?php
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
                            <?= $form->field($modelAbschlag, "[$key]sonderwunsch_betrag")
                                //->textInput(['disabled' => 'disabled'])
                                ->widget(MaskMoney::classname(), [
                                    'options' => [
                                        'id' => $key . '-sonderwunsch_betrag-id',
                                        'disabled' => 'disabled'
                                    ],
                                ])
                            ?>
                            <?php 
                            if($modelAbschlag->sonderwunsch_angefordert) {
                                $sonderwunschBetragTotal += $modelAbschlag->sonderwunsch_betrag;
                            } 
                            $swSummeBetrag += $modelAbschlag->sonderwunsch_betrag;
                            ?>
                        </td>
                        <td>
                            <?php
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
                            <?= $form->field($modelAbschlag, "[$key]summe")
                                //->textInput(['disabled' => 'disabled'])
                                ->widget(MaskMoney::classname(), [
                                    'options' => [
                                        'id' => $key . '-summe-id',
                                        'disabled' => 'disabled'
                                    ],
                                ])
                            ?>
                        </td>
                        <td>
                            <?= Html::a('<span class="fa fa-minus"></span>', 
                                Yii::$app->urlManager->createUrl(["datenblatt/deleteabschlag", 'datenblattId' => $modelDatenblatt->id , 'abschlagId' => $modelAbschlag->id]), 
                                ['class' => 'delete-button btn btn-danger btn-xl']) ?>
                        </td>
                    </tr>    
                    <?php endforeach;  ?>
                    <tr>
                        <td>Summe</td>
                        <td><?= $kaufvertragProzentTotal ?> %</td>
                        <td class="text-align-right"><?=  number_format($kvSummeBetrag, 2, ',', '.') ?> €</td>
                        <td></td>
                        <td><?= $sonderwunschProzentTotal ?> %</td>
                        <td class="text-align-right"><?= number_format($swSummeBetrag, 2, ',', '.') ?> €</td>
                        <td></td>
                        <td class="text-align-right"><?= number_format($kaufvertragBetragTotal + $sonderwunschBetragTotal, 2, ',', '.') ?> €</td>
                        <td></td>
                    </tr>
                    <!--
                    <tr>
                        <td>Offen</td>
                        <td><?= 100 - $kaufvertragProzentTotal ?> %</td>
                        <td><?= '' ?> EUR</td>
                        <td></td>
                        <td><?= 100 - $sonderwunschProzentTotal ?> %</td>
                        <td><?= $sonderwuenscheTotal - $sonderwunschBetragTotal ?> EUR</td>
                        <td></td>
                        <td><?= number_format(($kaufpreisTotal + $sonderwuenscheTotal) - ($kaufvertragBetragTotal + $sonderwunschBetragTotal), 2, ',', '.') ?> €</td>
                        <td></td>
                    </tr>
                    -->
                    <tr>
                        <td>Minderungen/Nachlass</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-align-right">
                        <?php
                            $totalNachlass = .0;
                            foreach($modelDatenblatt->nachlasses as $nachlass) {
                                $totalNachlass += (float) $nachlass->betrag;
                            }
                            echo number_format($totalNachlass, 2, ',', '.');
                        ?> €
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Zwischensumme</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-align-right">
                        <?php
                            echo number_format($kaufvertragBetragTotal + $sonderwunschBetragTotal - $totalNachlass, 2, ',', '.');
                        ?> €
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Zahlungen</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-align-right">
                        <?php
                            //echo $kaufvertragBetragTotal + $sonderwunschBetragTotal - $totalNachlass;
                            $totalZahlungen = 0;
                            foreach($modelDatenblatt->zahlungs as $zahlung) {
                                $totalZahlungen += (float) $zahlung->betrag;
                            }
                            echo number_format($totalZahlungen, 2, ',', '.');
                        ?> €
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Offene Posten</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-align-right">
                        <?php
                            echo number_format($kaufvertragBetragTotal + $sonderwunschBetragTotal - $totalNachlass - $totalZahlungen, 2, ',', '.');
                        ?> €
                        </td>
                        <td></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>