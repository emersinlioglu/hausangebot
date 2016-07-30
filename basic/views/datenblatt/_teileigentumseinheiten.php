<?php

?>

<div class="box-group" id="accordion">
    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
    <div class="panel box box-primary">
        <div class="box-header with-border">
            <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#collapse-te" href="#collapse-te" aria-expanded="true" class="">
                    Beschreibung Teileigentumseinheit:
                </a>
            </h4>
        </div>
        <div id="collapse-te" class="panel-collapse collapse in" aria-expanded="false">
            <div class="box-body">
    
                <table class="table">
                    <tr>
                        <th></th>
                        <th>TE</th>
                        <th>gefördert</th>
                        <th>Geschoss</th>
                        <th>Zimmer</th>
                        <th>ME-Anteil</th>
                        <th>Wohnfläche</th>
                        <th class="text-align-right">Kaufpreis</th>
                        <th class="text-align-right">KP/Einheit</th>
                    </tr>
                    <?php 
                    /* @var $teileigentumseinheit app\models\Teileigentumseinheit */
                    if ($modelDatenblatt->haus):
                    foreach ($modelDatenblatt->haus->teileigentumseinheits as $teileigentumseinheit): ?>
                        <tr>
                            <td><?= $teileigentumseinheit->einheitstyp->name ?></td>
                            <td><?= $teileigentumseinheit->te_nummer ?></td>
                            <td><?= $teileigentumseinheit->gefoerdert ? 'ja' : 'nein' ?></td>
                            <td><?= $teileigentumseinheit->geschoss ?></td>
                            <td><?= $teileigentumseinheit->zimmer ?></td>
                            <td><?= $teileigentumseinheit->me_anteil ?></td>
                            <td><?= $teileigentumseinheit->wohnflaeche ?> <?= $teileigentumseinheit->einheitstyp->einheit ?></td>
                            <td class="text-align-right"><?= number_format ((float)$teileigentumseinheit->kaufpreis, 2, ',', '.'); ?> €</td>
                            <td class="text-align-right"><?= number_format ((float)$teileigentumseinheit->kp_einheit, 2, ',', '.'); ?> €</td>
                        </tr>
                    <?php 
                    endforeach; 
                    endif;
                    ?>
                </table>
                
            </div>
        </div>
    </div>
</div>