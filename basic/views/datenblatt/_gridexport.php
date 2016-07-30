<?php

use kartik\export\ExportMenu;

$gridColumns = [
    //['class' => 'yii\grid\SerialColumn'],
    [
        'attribute' => 'projekt_name',
        'value'=>'projekt.name',
        'label' => 'Projekt'
    ],
    [
        'attribute' => 'firma_nr',
        'value'=>'firma.nr',
        'label' => 'Firmen Nr.'
    ],
    
    [
        //'attribute' => 'haus_strasse',
        'value'=>'haus.strasse',
        'label' => 'Straße'
    ],
    [
        //'attribute' => 'haus_hausnr',
        'value'=>'haus.hausnr',
        'label' => 'Haus Nr.'
    ],
    
    [
        //'attribute' => 'haus_plz',
        'value'=>'haus.plz',
        'label' => 'Plz'
    ],
    [
        //'attribute' => 'haus_ort',
        'value'=>'haus.ort',
        'label' => 'Ort'
    ],

];

for ($i = 0; $i < $maxCountTEEinheits; $i++) {
    $cnt = $i + 1;
    $gridColumns[] = [
        'value'=> "teeinheit__{$i}__te_name",
        'label' => "{$cnt}. TE-Name"
    ];
    $gridColumns[] = [
        'value'=> "teeinheit__{$i}__te_nummer",
        'label' => "{$cnt}. TE-Nummer"
    ];
    $gridColumns[] = [
        'value'=> "teeinheit__{$i}__gefoerdert",
        'label' => "{$cnt}. TE-Gefoerdert",
        'filter' => array(0 => Yii::t('app', 'No'), 1 => Yii::t('app', 'Yes')),
    ];
    $gridColumns[] = [
        'value'=> "teeinheit__{$i}__geschoss",
        'label' => "{$cnt}. TE-Geschoss"
    ];
    $gridColumns[] = [
        'value'=> "teeinheit__{$i}__zimmer",
        'label' => "{$cnt}. TE-Geschoss"
    ];
    $gridColumns[] = [
        'value'=> "teeinheit__{$i}__me_anteil",
        'label' => "{$cnt}. TE-ME-Anteil"
    ];
    $gridColumns[] = [
        'value'=> "teeinheit__{$i}__wohnflaeche",
        'label' => "{$cnt}. TE-Wohnfläche"
    ];
    $gridColumns[] = [
        'value'=> "teeinheit__{$i}__kaufpreis",
        'label' => "{$cnt}. TE-Kaufpreis"
    ];
}

// Kaeufer Daten
$gridColumns = array_merge($gridColumns, [
    [
        'value'=>'kaeufer.debitor_nr',
        'label' => 'Debitoren Nr.'
    ],
    [
        'value'=>'kaeufer.anredeLabel',
        //'value'=> '$data->anrede == 1 ? "Herr" : "Frau"',
        'label' => 'Käufer Anrede'
    ],
    [
        'value'=>'kaeufer.vorname',
        'label' => 'Käufer Vorname'
    ],
    [
        'value'=>'kaeufer.nachname',
        'label' => 'Käufer Name'
    ],
    [
        'value'=>'kaeufer.vorname2',
        'label' => '2. Käufer Vorname'
    ],
    [
        'value'=>'kaeufer.nachname2',
        'label' => '2. Käufer Name'
    ],
    [
        'value'=>'kaeufer.beurkundungAmLabel',
        'label' => 'Beurkundung am:'
    ],
    [
        'value'=>'kaeufer.uebergangBnlLabel',
        'label' => '-Übergang BNL'
    ],
    [
        'value'=>'kaeufer.abnahmeSeLabel',
        'label' => '-Abnahme SE'
    ],
    [
        'value'=>'kaeufer.abnahmeGeLabel',
        'label' => '-Abnahme GE'
    ],
    [
        'value'=>'kaeufer.strasse',
        'label' => 'Straße'
    ],
    [
        'value'=>'kaeufer.hausnr',
        'label' => 'Hausnr.'
    ],
    [
        'value'=>'kaeufer.plz',
        'label' => 'PLZ'
    ],
    [
        'value'=>'kaeufer.ort',
        'label' => 'Ort'
    ],
]);

for ($i = 0; $i < $maxCountSonderwunsches; $i++) {
    $cnt = $i + 1;
    $gridColumns[] = [
        'value'=> "sonderwunsch__{$i}__name",
        'label' => "{$cnt}. SW-Name"
    ];
    $gridColumns[] = [
        'value'=> "sonderwunsch__{$i}__rechnungsstellung_betrag",
        'label' => "{$cnt}. SW-Rechnungsstellungsbetrag"
    ];
    $gridColumns[] = [
        'value'=> "sonderwunsch__{$i}__rechnungsstellung_rg_nr",
        'label' => "{$cnt}. SW-Rechnungsstellung-Rg.-Nr."
    ];
}

for ($i = 0; $i < $maxCountAbschlags; $i++) {
    $cnt = $i + 1;
    $gridColumns[] = [
        'value'=> "abschlag__{$i}__name",
        'label' => "{$cnt}. Abschlag-Name"
    ];
}

for ($i = 0; $i < $maxCountNachlasses; $i++) {
    $cnt = $i + 1;
    $gridColumns[] = [
        'value'=> "nachlass__{$i}__schreibenVomLabel",
        'label' => "{$cnt}. Nachlass-Schreiben vom:"
    ];
}

$gridColumns[] = [
    'value'=> "nachlassSumme",
    'label' => "Minderungen/Nachlaß-Summe:"
];

for ($i = 0; $i < $maxCountZahlungs; $i++) {
    $cnt = $i + 1;
    $gridColumns[] = [
        'value'=> "zahlung__{$i}__datumLabel",
        'label' => "{$cnt}. Zahlung-Datum:"
    ];
    $gridColumns[] = [
        'value'=> "zahlung__{$i}__betrag",
        'label' => "{$cnt}. Zahlung-betrag:"
    ];
}

$gridColumns[] = [
    'value'=> "zahlungSumme",
    'label' => "Zahlungen- bereits gezahlt:"
];

$gridColumns[] = [
    'value'=> "offenePosten",
    'label' => "Offene Posten:"
];


echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    //'batchSize' => 50,
    //'fontAwesome' => true,
    'columnSelectorOptions' => [
        'label' => 'Felder auswählen.',
        'class' => 'btn btn-default',
        'style'=>'margin-right: 10px;'
    ],
    'exportConfig' => [
        ExportMenu::FORMAT_HTML => false,
        ExportMenu::FORMAT_TEXT => false,
        ExportMenu::FORMAT_PDF => false
    ],
    'dropdownOptions' => [
        'label' => 'Export Typ auswählen',
        'class' => 'btn btn-default',
        'style'=>'padding: 3px 0 0;'
    ],
]);

?>