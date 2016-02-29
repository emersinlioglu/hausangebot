<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Datenblatt */

$this->title = 'Datenblatt '.$model->id;
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
                 'class'=>'btn btn-info',
         'target'=> '_blank',
         'data-toggle'=>'tooltip',
         'title'=>'Generate the pdf'
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
	
	
<table >
<thead><tr ><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th> </th></tr></thead><tbody>
 <tr><td><strong>Projekt:</strong></td><td>Funkkaserne</td><td> </td><td><strong>Firmen-Nr.</strong></td><td>   3780</td><td><strong>Teileigentumseinheit</strong></td><td> </td><td>2</td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td><strong>Anschrift</strong></td><td><strong>PLZ/Ort</strong></td><td>80333</td><td>München</td><td><strong>Straße + Hausnummer</strong></td><td>Musterstr.</td><td> </td><td> 7</td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
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
   <td>x </td><td>verkauft </td>
   <td>X </td><td> </td><td><strong>Rechnung Vertrieb</strong> </td><td> </td>
   <td>X </td></tr>
 <tr>
   <td><strong></strong></td><td> </td><td> </td><td>&nbsp;</td><td> </td><td></td><td> </td><td>&nbsp;</td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr>
   <td><strong>Beschrieb Teileigentumseinheit</strong></td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr>
   <td></td>
   <td><strong>TE</strong></td><td><strong>gefördert</strong></td><td><strong>Geschoss</strong></td><td><strong>Zimmer</strong></td><td><strong>ME-Anteil</strong></td><td><strong>Wohnfläche</strong></td><td><strong>Kaufpreis              KP/Einheit</strong></td></tr>
 <tr><td>Wohnung</td><td>2</td><td>J</td><td>EG</td><td>3</td><td>20,00/1.000</td><td>80,00 m²</td><td>500.000,00 €</td></tr>
 <tr><td>Stellplatz 1</td><td>120</td><td>N</td><td> </td><td> </td><td>1,25/1.000</td><td>1 Stck.</td><td>20.000,00 €</td></tr>
 <tr><td>Stellplatz 2</td><td>121</td><td>N</td><td> </td><td> </td><td>1,25/1.000</td><td>1 Stck.</td><td>20.000,00 €</td></tr>
 <tr><td>Lagerraum 1</td><td>122</td><td>N</td><td> </td><td> </td><td>2,75/1.000</td><td>10,00 m²</td><td>10.000,00 €</td></tr>
 <tr><td>Lagerraum 2</td><td>123</td><td>N</td><td> </td><td> </td><td>2,75/1.000</td><td>10,00 m²</td><td>10.000,00 €</td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td>560.000,00 €</td></tr>
 <tr><td><strong>Zählerangaben</strong></td><td>&nbsp;</td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td><strong>Käuferdaten</strong></td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td><strong>Debitor-Nr.</strong></td><td> </td><td> </td><td>123456</td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td><strong>Beurkundung am: </strong></td><td> </td><td> </td><td>01.01.2015</td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td><strong>Termine:            - verbindliche Fertigstellung</strong></td><td> </td><td> </td><td>01.01.2018</td><td> -Abnahme SE</td><td>01.01.2018</td><td> - Auflassung</td><td>    X</td></tr>
 <tr><td> </td><td> </td><td>-Übergang BNL</td><td>01.01.2018</td><td> -Abnahme GE</td><td> 01.01.2018</td><td> </td><td> </td></tr>
 <tr><td><strong>Anrede 1, Titel 1, Vorname 1, Nachname 1</strong></td><td> </td><td> </td><td>Herr</td><td>Dr.</td><td>Karl </td><td>Mustermann</td><td> </td></tr>
 <tr><td><strong>Anrede 2, Titel 2, Vorname 2, Nachname 2</strong></td><td> </td><td> </td><td>n.n.</td><td>n.n.</td><td>n.n.</td><td>n.n.</td><td> </td></tr>
 <tr><td><strong>Straße + Hausnummer</strong></td><td> </td><td> </td><td>Musterstr. 7</td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td><strong>PLZ/Ort</strong></td><td> </td><td> </td><td>80333</td><td>München</td><td> </td><td> </td><td> </td></tr>
 <tr><td><strong>Tel. Festnetz/mobil</strong></td><td> </td><td> </td><td>089/24226</td><td> </td><td>0123/456078</td><td> </td><td> </td></tr>
 <tr><td><strong>E-Mail</strong></td><td> </td><td> </td><td>karl.muster@tlin.de</td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td><strong>besondere Regelungen Kaufvertrag</strong></td><td colspan="7">       </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td><strong>Sonderwünsche</strong></td><td><strong>Angebot</strong></td><td> </td><td><strong>beauftragt</strong></td><td> </td><td><strong>Rechnungsstellung                                   </strong></td><td> </td><td> </td></tr>
 <tr><td> </td><td> - Datum</td><td> - Betrag</td><td> - Datum</td><td> - Betrag</td><td> - Datum</td><td> - Betrag</td><td> - Rg.-Nr.</td></tr>
 <tr><td>Ausbau 1</td><td>04.04.2015</td><td>5.000,00 €</td><td>15.04.2015</td><td>5.000,00 €</td><td>30.09.2015</td><td>5.000,00 €</td><td>      125</td></tr>
 <tr><td>Ausbau 2</td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td>Ausstattung 1</td><td>04.04.2015</td><td>5.000,00 €</td><td>15.04.2015</td><td>5.000,00 €</td><td>30.09.2015</td><td>5.000,00 €</td><td> </td></tr>
 <tr><td>Ausstattung 2</td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td><strong>Summe</strong></td><td> </td><td> </td><td> </td><td> </td><td> </td><td>10.000,00 €</td><td> </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr>
   <td colspan="8">&nbsp;</td>
   </tr>
 <tr><td><strong>Kaufpreisabrechnung</strong></td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td> </td><td> </td><td>Kaufvertrag</td><td> </td><td>Sonderwünsche/Ausstattung</td><td> </td><td> </td><td>              Summe</td></tr>
 <tr><td> </td><td>     - in %</td><td> - Betrag</td><td>-angefordert</td><td>     - in %</td><td> - Betrag</td><td>-angefordert</td><td> </td></tr>
 <tr><td>Abschlag 1 </td><td>25,0%  </td><td>140.000,00 €</td><td>03.02.2017</td><td> </td><td> </td><td> </td><td>140.000,00 €                      </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td>Abschlag 2 </td><td>28,0%  </td><td>156.800,00 €</td><td>04.05.2017</td><td> </td><td> </td><td> </td><td>156.800,00 €                      </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td>Abschlag 3 </td><td>16,8%  </td><td>94.080,00 €</td><td> </td><td> </td><td> </td><td> </td><td>0,00 €                      </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td>Abschlag 4 </td><td>8,4%  </td><td>47.040,00 €</td><td> </td><td> </td><td> </td><td> </td><td>0,00 €                      </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td>Abschlag 5 </td><td>18,3%  </td><td>102.480,00 €</td><td> </td><td>96,5%  </td><td>9.650,00 €</td><td> </td><td>0,00 €                      </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td>Abschlag 6</td><td>0,0%  </td><td>0,00 €</td><td> </td><td>0,0%  </td><td>0,00 €</td><td> </td><td>0,00 €                      </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td>Schlussrechnung</td><td>3,5%  </td><td>19.600,00 €</td><td> </td><td>3,5%  </td><td>350,00 €</td><td> </td><td>0,00 €                      </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td><strong>Summe</strong></td><td>100,0%  </td><td>560.000,00 €</td><td> </td><td>100,0%  </td><td>10.000,00 €</td><td> </td><td>296.800,00 €                      </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td><strong>./. Minderungen/Nachlaß</strong></td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td>800,00 €                      </td></tr>
 <tr><td><strong>Zwischensumme</strong></td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td>296.000,00 €                      </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td><strong>Zahlungen</strong></td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td>250.000,00 €                      </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td><strong>offene Posten</strong></td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td>46.000,00 €                      </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td><strong>sonstige Anmerkungen</strong></td><td colspan="7">       </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
 <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td></td></tr>
</tbody></table>

</div>
