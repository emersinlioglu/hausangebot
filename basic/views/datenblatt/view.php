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
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('<i class="fa  fa-print text-white"></i>   Report', ['report', 'id' => $model->id], [
            'class' => 'btn btn-info',
            'data' => [
                'class' => 'btn btn-info',
                'target' => '_blank',
                'data-toggle' => 'tooltip',
                'title' => 'Generate the pdf'
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'projekt.name',
            'projekt.firma.name',
            'projekt.firma.nr',
            //'firma_id',
            //'projekt_id',
            //'haus_id',
            //'nummer',
            //'kaeufer_id',
            [
                'attribute' => 'haus.reserviert',
                'format' => 'boolean',
            ],
            [
                'attribute' => 'haus.verkauft',
                'format' => 'boolean',
            ],
            [
                'attribute' => 'haus.rechnung_vertrieb',
                'format' => 'boolean',
            ],


            //'haus.te',

            //  'haus.verkauft',
            //  'haus.rechnung_vertrieb',

            'kaeufer.debitor_nr',
            'kaeufer.vorname',
            'kaeufer.nachname',

            'besondere_regelungen_kaufvertrag:ntext',
            'sonstige_anmerkungen:ntext',
        ],
    ]) ?>


    <table>
        <tbody>
        <tr>
            <td><strong>Projekt:</strong></td>
            <td><?php echo $model->projekt? $model->projekt->name : ''; ?></td>
            <td></td>
            <td><strong>Firmen-Nr.</strong></td>
            <td><?php if ($model->projekt && $model->projekt->firma) echo $model->projekt->firma->nr; ?></td>
            <td><strong>Teileigentumseinheit:</strong></td>
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
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Anschrift</strong></td>
            <td><strong>PLZ/Ort</strong></td>
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
            <td><strong>Straße + Hausnummer</strong></td>
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
            <td><strong>reserviert</strong></td>
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
            <td><strong>Rechnung Vertrieb</strong></td>
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
            <td><strong>TE</strong></td>
            <td><strong>gefördert</strong></td>
            <td><strong>Geschoss</strong></td>
            <td><strong>Zimmer</strong></td>
            <td><strong>ME-Anteil</strong></td>
            <td><strong>Wohnfläche</strong></td>
            <td><strong>Kaufpreis KP/Einheit</strong></td>
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
                <td><?= number_format((float)$te->wohnflaeche, 2) ?> m²</td>
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
            <td><strong>Käuferdaten</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Debitor-Nr.</strong></td>
            <td></td>
            <td></td>
            <td><?php $model->kaeufer ? $model->kaeufer->debitor_nr : ''; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Beurkundung am: </strong></td>
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
            <td><strong>Termine: - verbindliche Fertigstellung</strong></td>
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
            <td><strong>Anrede 1, Titel 1, Vorname 1, Nachname 1</strong></td>
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
            <td><strong>Anrede 2, Titel 2, Vorname 2, Nachname 2</strong></td>
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
            <td><strong>Straße + Hausnummer</strong></td>
            <td></td>
            <td></td>
            <td>Musterstr. 7</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>PLZ/Ort</strong></td>
            <td></td>
            <td></td>
            <td><?php $model->kaeufer ? $model->kaeufer->plz : ''; ?></td>
            <td><?php $model->kaeufer ? $model->kaeufer->ort : ''; ?></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Tel. Festnetz/mobil</strong></td>
            <td></td>
            <td></td>
            <td><?php $model->kaeufer ? $model->kaeufer->festnetz : ''; ?></td>
            <td></td>
            <td><?php $model->kaeufer ? $model->kaeufer->handy : ''; ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>E-Mail</strong></td>
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
            <td></td>
            <td></td>
            <td><?php $model->besondere_regelungen_kaufvertrag; ?></td>
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
            <td><strong>Angebot</strong></td>
            <td></td>
            <td><strong>beauftragt</strong></td>
            <td></td>
            <td><strong>Rechnungsstellung </strong></td>
            <td></td>
            <td></td>
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
        <tr>
            <td>Abschlag 1</td>
            <td>25,0%</td>
            <td>140.000,00 €</td>
            <td>03.02.2017</td>
            <td></td>
            <td></td>
            <td></td>
            <td>140.000,00 €</td>
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
            <td>Abschlag 2</td>
            <td>28,0%</td>
            <td>156.800,00 €</td>
            <td>04.05.2017</td>
            <td></td>
            <td></td>
            <td></td>
            <td>156.800,00 €</td>
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
            <td>Abschlag 3</td>
            <td>16,8%</td>
            <td>94.080,00 €</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>0,00 €</td>
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
            <td>Abschlag 4</td>
            <td>8,4%</td>
            <td>47.040,00 €</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>0,00 €</td>
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
            <td>Abschlag 5</td>
            <td>18,3%</td>
            <td>102.480,00 €</td>
            <td></td>
            <td>96,5%</td>
            <td>9.650,00 €</td>
            <td></td>
            <td>0,00 €</td>
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
            <td>Abschlag 6</td>
            <td>0,0%</td>
            <td>0,00 €</td>
            <td></td>
            <td>0,0%</td>
            <td>0,00 €</td>
            <td></td>
            <td>0,00 €</td>
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
            <td>Schlussrechnung</td>
            <td>3,5%</td>
            <td>19.600,00 €</td>
            <td></td>
            <td>3,5%</td>
            <td>350,00 €</td>
            <td></td>
            <td>0,00 €</td>
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
            <td colspan="7"></td>
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
