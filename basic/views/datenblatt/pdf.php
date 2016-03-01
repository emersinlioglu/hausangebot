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
            <td>Kaufpreis KP/Einheit</td>
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
                <td><?= $te->me_anteil ?></td>
                <td><?= number_format((float)$te->wohnflaeche, 2) ?> <?= $te->einheitstyp->einheit ?></td>
                <td><?= number_format((float)$te->kaufpreis, 2) ?>€</td>
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
            <td><?= number_format((float)$kaufpreisSumme, 2) ?>€</td>
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
                    echo $model->kaeufer->anrede;
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
                    echo $model->kaeufer->anrede2;
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
            <td colspan="7"><?php $model->besondere_regelungen_kaufvertrag; ?></td>
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
                <td><?= number_format((float)$sonderwunsch->angebot_betrag, 2) ?> €</td>
                <td><?= Yii::$app->formatter->asDate($sonderwunsch->beauftragt_datum) ?></td>
                <td><?= number_format((float)$sonderwunsch->beauftragt_betrag, 2) ?> €</td>
                <td><?= Yii::$app->formatter->asDate($sonderwunsch->rechnungsstellung_datum) ?></td>
                <td><?= number_format((float)$sonderwunsch->rechnungsstellung_betrag, 2) ?> €</td>
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
            <td><?= number_format((float)$rechnungsstellungBetragSumme, 2) ?> €</td>
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
            <td> Summe</td>
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
            <td><?= number_format((float)$abschlag->kaufvertrag_prozent, 2) ?> %</td>
            <td><?= number_format((float)$abschlag->kaufvertrag_betrag, 2) ?> €</td>
            <td><?= Yii::$app->formatter->asDate($abschlag->kaufvertrag_angefordert) ?></td>
            <td><?= number_format((float)$abschlag->sonderwunsch_prozent, 2) ?> %</td>
            <td><?= number_format((float)$abschlag->sonderwunsch_betrag, 2) ?> €</td>
            <td><?= Yii::$app->formatter->asDate($abschlag->sonderwunsch_angefordert) ?></td>
            <td><?= number_format((float)$abschlag->summe, 2) ?> €</td>
        </tr>
        <?php endforeach; ?>
        
        <tr>
            <td><strong>Summe</strong></td>
            <td>100,0%</td>
            <td>560.000,00 €</td>
            <td></td>
            <td>100,0%</td>
            <td>10.000,00 €</td>
            <td></td>
            <td>296.800,00 €</td>
        </tr>
        
        <tr>
            <td><strong>./. Minderungen/Nachlaß</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>800,00 €</td>
        </tr>
        <tr>
            <td><strong>Zwischensumme</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>296.000,00 €</td>
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
            <td>250.000,00 €</td>
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
            <td><strong>offene Posten</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>46.000,00 €</td>
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
