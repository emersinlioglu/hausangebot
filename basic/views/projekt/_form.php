<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Firma;

use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\models\rbacDB\Role;

/* @var $this yii\web\View */
/* @var $model app\models\Projekt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projekt-form">


    <?php $form = ActiveForm::begin(); ?>

	<?= $form->errorSummary($model); ?>

	<?= $form->field($model, 'firma_id')->dropDownList(ArrayHelper::map(Firma::find()->all(), 'id', 'name'))->label('Firma') ?>
 	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

	
	<?php 
	/*
		$roles = Role::getAvailableRoles(Yii::$app->user->isSuperAdmin, true);
		if (Yii::$app->user->isSuperadmin) {
			echo $form->field($model, 'role')->dropDownList($roles, []);
		} else {
			if (!$model->role) {
				$model->role = reset($roles);
			}
            echo $form->field($model, 'role')->hiddenInput()->label(false);
		}
	*/
	?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
