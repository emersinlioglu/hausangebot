<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Datenblatt */

$this->title = 'Datenblatt ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Datenblätter', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datenblatt-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Bearbeiten', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('<i class="fa  fa-print text-white"></i>   Drucken', ['report', 'id' => $model->id], [
            'class' => 'btn btn-info',
            'data' => [
                'class' => 'btn btn-info',
                'target' => '_blank',
                'data-toggle' => 'tooltip',
                'title' => 'Generate the pdf'
            ],
        ]) ?>
    </p>

   


    <table width="100%">
        <tbody>
        <tr>
            <td width="219"><strong>Projekt:</strong></td>
            <td width="56"><?php echo $model->projekt? $model->projekt->name : ''; ?></td>
            <td width="86"></td>
            <td width="71"><strong>Firmen-Nr.</strong></td>
            <td width="91"><?php if ($model->projekt && $model->projekt->firma) echo $model->projekt->firma->nr; ?></td>
            <td width="144"><strong>Teileigentumseinheit:</strong></td>
            <td colspan="2">
                <?php
                    if ($model->haus) {
                        foreach ($model->haus->teileigentumseinheits as $teigen) {
                            if ($teigen->einheitstyp_id == 1) {
                                echo $teigen->te_nummer;
                                break;
                            }
                        }
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td width="121"></td>
            <td width="72"></td>
        </tr>
        <tr>
            <td>Anschrift</td>
            <td>PLZ/Ort</td>
            <td>
                <?php
                if ($model->haus) {
                    echo $model->haus->plz;
                }
                ?>
            </td>
            <td>
                <?php
                if ($model->haus) {
                    echo $model->haus->ort;
                }
                ?>
            </td>
            <td>Straße + Hausnr</td>
            <td>
                <?php
                if ($model->haus) {
                    echo $model->haus->strasse;
                }
                ?>
            </td>
            <td colspan="2">
                <?php
                if ($model->haus) {
                    echo $model->haus->hausnr;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td></td>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>reserviert</td>
            <td>
                <?php
                    if ($model->haus && $model->haus->reserviert) {
                        echo 'X';
                    }
                ?>
            </td>
            <td>verkauft</td>
            <td>
                <?php
                if ($model->haus && $model->haus->verkauft) {
                    echo 'X';
                }
                ?>
            </td>
            <td></td>
            <td>Rechnung Vertrieb</td>
            <td colspan="2">
                <?php
                if ($model->haus && $model->haus->rechnung_vertrieb) {
                    echo 'X';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td><strong></strong></td>
            <td></td>
            <td></td>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
            <td></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Beschrieb Teileigentumseinheit</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>TE</td>
            <td>gefördert</td>
            <td>Geschoss</td>
            <td>Zimmer</td>
            <td>ME-Anteil</td>
            <td>Wohnfläche</td>
            <td class="text-align-right">Kaufpreis KP/Einheit</td>
        </tr>

        <?php $kaufpreisSumme = 0; ?>

        <?php foreach ($model->haus->teileigentumseinheits as $te): ?>
            <tr>
                <td><?= $te->einheitstyp->name ?></td>
                <td><?= $te->te_nummer ?></td>
                <td>
                    <?= $te->gefoerdert ? 'J' : 'N' ?>
                </td>
                <td><?= $te->geschoss ?></td>
                <td><?= $te->zimmer ?></td>
                <td class="text-align-right"><?= $te->me_anteil ?></td>
                <td><?= number_format((float)$te->wohnflaeche, 2, ',', '.') ?> <?= $te->einheitstyp->einheit ?></td>
                <td class="text-align-right"><?= number_format((float)$te->kaufpreis, 2, ',', '.') ?>€</td>
            </tr>
            <?php $kaufpreisSumme += (float)$te->kaufpreis; ?>
        <?php endforeach; ?>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-align-right"><?= number_format((float)$kaufpreisSumme, 2, ',', '.') ?>€</td>
        </tr>
        <tr>
            <td><strong>Zählerangaben</strong></td>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
         <tr>
            <td>&nbsp;</td>
            <td>Medium</td>
            <td></td>
            <td>-Nr.</td>
            <td></td>
            <td>Zähler -Stand</td>
            <td></td>
            <td>-Datum</td>
        </tr>
        <?php
        foreach ($model->haus->zaehlerstands as $zaehlerstand): ?>
          <tr>
            <td></td>
            <td><?= $zaehlerstand->name ?></td>
            <td></td>
            <td><?= $zaehlerstand->nummer ?></td>
            <td></td>
            <td><?= $zaehlerstand->stand ?></td>
            <td></td>
            <td><?= Yii::$app->formatter->asDate($zaehlerstand->datum) ?></td>
          </tr>
           <?php endforeach; ?>
        
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong><u>Käuferdaten</u></strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Debitor-Nr.</td>
            <td></td>
            <td></td>
            <td><?php $model->kaeufer ? $model->kaeufer->debitor_nr : ''; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Beurkundung am: </td>
            <td></td>
            <td></td>
            <td>
                <?php
                    if ($model->kaeufer) {
                        echo Yii::$app->formatter->asDate($model->kaeufer->beurkundung_am);
                    }
                ?>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Termine: - verbindliche Fertigstellung</td>
            <td></td>
            <td></td>
            <td>
                <?php
                if ($model->kaeufer) {
                    echo Yii::$app->formatter->asDate($model->kaeufer->verbindliche_fertigstellung);
                }
                ?>
            </td>
            <td> -Abnahme SE</td>
            <td>
                <?php
                if ($model->kaeufer) {
                    echo Yii::$app->formatter->asDate($model->kaeufer->abnahme_se);
                }
                ?>
            </td>
            <td> - Auflassung</td>
            <td>
                <?php
                if ($model->kaeufer && $model->kaeufer->auflassung) {
                    echo 'X';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>-Übergang BNL</td>
            <td>
                <?php
                if ($model->kaeufer) {
                    echo Yii::$app->formatter->asDate($model->kaeufer->uebergang_bnl);
                }
                ?>
            </td>
            <td> -Abnahme GE</td>
            <td>
                <?php
                if ($model->kaeufer) {
                    echo Yii::$app->formatter->asDate($model->kaeufer->abnahme_ge);
                }
                ?>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Anrede 1, Titel 1, <br>
            Vorname 1, Nachname 1</td>
            <td></td>
            <td></td>
            <td>
                <?php
                if ($model->kaeufer) {
                    switch($model->kaeufer->anrede) {
                        case 0: echo 'Herr'; break;
                        case 1: echo 'Frau'; break;
                    }   
                }
                ?>
            </td>
            <td>
                <?php
                if ($model->kaeufer) {
                    echo $model->kaeufer->titel;
                }
                ?>
            </td>
            <td>
                <?php
                if ($model->kaeufer) {
                    echo $model->kaeufer->vorname;
                }
                ?>
            </td>
            <td>
                <?php
                if ($model->kaeufer) {
                    echo $model->kaeufer->nachname;
                }
                ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Anrede 2, Titel 2, <br>
            Vorname 2, Nachname 2</td>
            <td></td>
            <td></td>
            <td>
                <?php
                if ($model->kaeufer) {
                    switch($model->kaeufer->anrede2) {
                        case 0: echo 'Herr'; break;
                        case 1: echo 'Frau'; break;
                    }
                }
                ?>
            </td>
            <td>
                <?php
                if ($model->kaeufer) {
                    echo $model->kaeufer->titel2;
                }
                ?>
            </td>
            <td>
                <?php
                if ($model->kaeufer) {
                    echo $model->kaeufer->vorname2;
                }
                ?>
            </td>
            <td>
                <?php
                if ($model->kaeufer) {
                    echo $model->kaeufer->nachname2;
                }
                ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Straße + Hausnummer</td>
            <td></td>
            <td></td>
            <td><?php $model->kaeufer ? $model->kaeufer->strasse : ''; ?> <?php $model->kaeufer ? $model->kaeufer->hausnr : ''; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>PLZ/Ort</td>
            <td></td>
            <td></td>
            <td><?php $model->kaeufer ? $model->kaeufer->plz : ''; ?></td>
            <td><?php $model->kaeufer ? $model->kaeufer->ort : ''; ?></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Tel. Festnetz/mobil</td>
            <td></td>
            <td></td>
            <td><?php $model->kaeufer ? $model->kaeufer->festnetz : ''; ?></td>
            <td></td>
            <td><?php $model->kaeufer ? $model->kaeufer->handy : ''; ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>E-Mail</td>
            <td></td>
            <td></td>
            <td><?php $model->kaeufer ? $model->kaeufer->email : ''; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>besondere Regelungen Kaufvertrag</strong></td>
            <td colspan="7"><?= $model->besondere_regelungen_kaufvertrag; ?></td>
          </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Sonderwünsche</strong></td>
            <td colspan="2"><strong>Angebot</strong></td>
            <td colspan="2"><strong>beauftragt</strong></td>
            <td colspan="3" align="center"><strong>Rechnungsstellung </strong></td>
          </tr>
        <tr>
            <td></td>
            <td> - Datum</td>
            <td> - Betrag</td>
            <td> - Datum</td>
            <td> - Betrag</td>
            <td> - Datum</td>
            <td> - Betrag</td>
            <td> - Rg.-Nr.</td>
        </tr>

        <?php $rechnungsstellungBetragSumme = 0; ?>
        <?php foreach ($model->sonderwunsches as $sonderwunsch): ?>
            <tr>
                <td><?= $sonderwunsch->name ?></td>
                <td><?= Yii::$app->formatter->asDate($sonderwunsch->angebot_datum) ?></td>
                <td><?= number_format((float)$sonderwunsch->angebot_betrag, 2, ',', '.') ?> €</td>
                <td><?= Yii::$app->formatter->asDate($sonderwunsch->beauftragt_datum) ?></td>
                <td><?= number_format((float)$sonderwunsch->beauftragt_betrag, 2, ',', '.') ?> €</td>
                <td><?= Yii::$app->formatter->asDate($sonderwunsch->rechnungsstellung_datum) ?></td>
                <td><?= number_format((float)$sonderwunsch->rechnungsstellung_betrag, 2, ',', '.') ?> €</td>
                <td><?= $sonderwunsch->rechnungsstellung_rg_nr ?></td>
            </tr>
        <?php $rechnungsstellungBetragSumme += (float)$sonderwunsch->rechnungsstellung_betrag; ?>
        <?php endforeach; ?>

        <tr>
            <td><strong>Summe</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-align-right"><?= number_format((float)$rechnungsstellungBetragSumme, 2, ',', '.') ?> €</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
            
        </tr>
        </tbody>
        </table>


        <table width="100%">
        
        <tbody>
        <tr>
            <td><strong>Kaufpreisabrechnung</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Kaufvertrag</td>
            <td></td>
            <td>Sonderwünsche/Ausstattung</td>
            <td></td>
            <td></td>
            <td class="text-align-right">Summe</td>
        </tr>
        <tr>
            <td></td>
            <td> - in %</td>
            <td> - Betrag</td>
            <td>-angefordert</td>
            <td> - in %</td>
            <td> - Betrag</td>
            <td>-angefordert</td>
            <td></td>
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
        ?>
        
        <?php foreach($model->abschlags as $key => $abschlag): ?>
        <tr>
            <td><?= $abschlag->name ?></td>
            <td><?= number_format((float)$abschlag->kaufvertrag_prozent, 2, ',', '.') ?> %</td>
            <td><?= number_format((float)$abschlag->kaufvertrag_betrag, 2, ',', '.') ?> €</td>
            <td>
                <?php 
                    if ($abschlag->kaufvertrag_angefordert) {
                        echo Yii::$app->formatter->asDate($abschlag->kaufvertrag_angefordert);
                    }
                ?>
            </td>
            <td><?= number_format((float)$abschlag->sonderwunsch_prozent, 2, ',', '.') ?> %</td>
            <td><?= number_format((float)$abschlag->sonderwunsch_betrag, 2, ',', '.') ?> €</td>
            <td>
                <?php 
                    if ($abschlag->sonderwunsch_angefordert) {
                        echo Yii::$app->formatter->asDate($abschlag->sonderwunsch_angefordert);
                    }
                ?>
            </td>
            <td class="text-align-right"><?= number_format((float)$abschlag->summe, 2, ',', '.') ?> €</td>
        </tr>
        
        <?php 
            // berechnung
            $kaufvertragProzentTotal += $abschlag->kaufvertrag_prozent;
            if($abschlag->kaufvertrag_angefordert) {
                $kaufvertragBetragTotal += (float)$abschlag->kaufvertrag_betrag;
            } 
            $kvSummeBetrag += (float)$abschlag->kaufvertrag_betrag;
            $sonderwunschProzentTotal += $abschlag->sonderwunsch_prozent;
            if($abschlag->sonderwunsch_angefordert) {
                $sonderwunschBetragTotal += $abschlag->sonderwunsch_betrag;
            } 
            $swSummeBetrag += $abschlag->sonderwunsch_betrag;
        ?>
        
        <?php endforeach; ?>
        
        <tr>
            <td><strong>Summe</strong></td>
            <td><?= $kaufvertragProzentTotal ?> %</td>
            <td><?=  $kvSummeBetrag ?> €</td>
            <td></td>
            <td><?= $sonderwunschProzentTotal ?> %</td>
            <td><?= $swSummeBetrag ?> €</td>
            <td></td>
            <td class="text-align-right"><?= number_format($kaufvertragBetragTotal + $sonderwunschBetragTotal, 2, ',', '.') ?> €</td>
        </tr>
        
        
        <tr>
            <td><strong>./. Minderungen/Nachlaß</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-align-right">
                <?php
                    $totalNachlass = .0;
                    foreach($model->nachlasses as $nachlass) {
                        $totalNachlass += (float) $nachlass->betrag;
                    }
                    echo number_format($totalNachlass, 2, ',', '.');
                ?>  €
            </td>
        </tr>
        <?php foreach($model->nachlasses as $key => $modelNachlass): ?>
            <tr>
                <td>
                    <?php
                    echo Yii::$app->formatter->asDate($modelNachlass->schreiben_vom);
                    ?>
                </td>
                <td>
                    <?= number_format($modelNachlass->betrag,2, ',', '.') ?>€
                </td>
                <td>
                    <?= $modelNachlass->bemerkung ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td><strong>Zwischensumme</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-align-right"><?php
                    echo number_format($kaufvertragBetragTotal + $sonderwunschBetragTotal - $totalNachlass, 2, ',', '.');
                ?> €
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Zahlungen</strong></td>
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
                    foreach($model->zahlungs as $zahlung) {
                        $totalZahlungen += (float) $zahlung->betrag;
                    }
                    echo number_format($totalZahlungen, 2, ',', '.');
                ?> €
            </td>
        </tr>
        <tr>
            <th>Datum</th>
            <th>Betrag</th>
            <th>Bemerkung</th>
        </tr>
        
        <?php foreach ($model->zahlungs as $key => $modelZahlung): ?>
            <tr>
                <td>
                    <?php
                    echo Yii::$app->formatter->asDate($modelZahlung->datum);
                    ?>
                </td>
                <td>
                    <?php echo number_format($modelZahlung->betrag, 2, ',', '.'); ?>
                </td>
                <td>
                    <?= $modelZahlung->bemerkung ?>
                </td>
            </tr>
        <?php endforeach; ?>
        
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>offene Posten</strong></td>
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
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>sonstige Anmerkungen</strong></td>
            <td colspan="7"><?php $model->sonstige_anmerkungen; ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
  </table>

</div>
