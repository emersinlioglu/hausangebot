<?php
//use kartik\datetime\DateTimePicker;
use kartik\datecontrol\DateControl;

/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="box-group" id="accordion">
    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
    <div class="panel box box-primary">
        <div class="box-header with-border">
            <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#collapse-hausdetails" href="#collapse-hausdetails"
                   aria-expanded="true"
                   class="">
                    Teileigentumseinheit Details:
                </a>
            </h4>
        </div>
        <div id="collapse-hausdetails" class="panel-collapse collapse in" aria-expanded="false">
            <div class="box-body">

                <div class="row">
                    <div class="col-sm-3">
                        Anschrift:
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        Straße + Hausnummer:
                    </div>
                    <div class="col-sm-3">
                        <?= $modelDatenblatt->haus ? $modelDatenblatt->haus->strasse : '' ?>
                        <?= $modelDatenblatt->haus ? $modelDatenblatt->haus->hausnr : '' ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        PLZ/Ort:
                    </div>
                    <div class="col-sm-3">
                        <?= $modelDatenblatt->haus ? $modelDatenblatt->haus->plz : '' ?>
                        <?= $modelDatenblatt->haus ? $modelDatenblatt->haus->ort : '' ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1">
                        reserviert:
                    </div>
                    <div class="col-sm-1">
                        <?= $modelDatenblatt->haus ? ($modelDatenblatt->haus->reserviert ? 'ja' : 'nein') : '' ?>
                        <br>
                    </div>
                    <div class="col-sm-1">
                        verkauft:
                    </div>
                    <div class="col-sm-1">
                        <?= $modelDatenblatt->haus ? ($modelDatenblatt->haus->verkauft ? 'ja' : 'nein') : '' ?>
                    </div>
                    <div class="col-sm-2">
                        Rechnung/Vertrieb:
                    </div>
                    <div class="col-sm-1">
                        <?= $modelDatenblatt->haus ? ($modelDatenblatt->haus->rechnung_vertrieb ? 'ja' : 'nein') : '' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>