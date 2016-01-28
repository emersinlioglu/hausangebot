<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use app\models\Firma;
use app\models\Projekt;
use yii\widgets\Pjax;
use yii\helpers\Url;

?>

<?php

$this->registerJs(
   '$("document").ready(function(){ 
        $("#dynamic-form").on("pjax:end", function() {
            $.pjax.reload({container:"#datenblatt-form"});  //Reload GridView
        });
    });'
);
?>

<?php yii\widgets\Pjax::begin(['id' => 'dynamic-form',
 'options'=>array(
            'data-pjax' => true, 
            'class' => 'datenblatt-form'
        )
    ]); ?>

<div class="datenblatt-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?php
     $catList=ArrayHelper::map(Firma::find()->all(), 'id', 'name');
    echo $form->field($modelDatenblatt, 'firma_id')->dropDownList($catList, ['id'=>'firma_id']); 


    echo $form->field($modelDatenblatt, 'projekt_id')->widget(DepDrop::classname(), [
    'options'=>['id'=>'projekt_id'],
    'pluginOptions'=>[
        'depends'=>['firma_id'],
        'placeholder'=>'Select...',
        'url'=>Url::to(['/projekt'])
    ]
]);
    



 ?>

    



    <?php
                $projekte = $modelDatenblatt->firma ? $modelDatenblatt->firma->projekts : [];
                echo $form->field($modelDatenblatt, 'projekt_id')->dropDownList(ArrayHelper::map($projekte, 'id', 'name'), ['prompt'=>'Projekt auswählen']);
            ?>

    <?= $form->field($modelDatenblatt, 'haus_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelDatenblatt, 'nummer')->textInput() ?>

    <?= $form->field($modelDatenblatt, 'kaeufer_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelDatenblatt, 'besondere_regelungen_kaufvertrag')->textarea(['rows' => 6]) ?>

    <?= $form->field($modelDatenblatt, 'sonstige_anmerkungen')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($modelDatenblatt->isNewRecord ? 'Create' : 'Update', ['class' => $modelDatenblatt->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

     <?php ActiveForm::end(); ?>
<?php yii\widgets\Pjax::end() ?>

</div>
