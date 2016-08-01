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

<?php
$this->registerJs('
    $(function(){

        new ProjektForm();

    });'
);
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


    <?php if($model->id): ?>
	    <div class="col-md-6">
			<div class="box-group" id="accordion">
			    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
			    <div class="panel box box-primary">
			        <div class="box-header with-border">
			            <h4 class="box-title">
			                <a data-toggle="collapse" data-parent="#collapse-nachlass" href="#collapse-nachlass" aria-expanded="true" class="">
			                    Zugewiesene Benutzer:
			                </a>
			            </h4>
			        </div>

			        <div id="collapse-nachlass" class="panel-collapse collapse in" aria-expanded="false">
			            <div class="box-body">

			            	<label for="projekt-users">Suche: </label>
	  						<input id="projekt-users" 
	  							data-search-url="<?= \yii\helpers\Url::to(['projekt/searchusers', ]);?>"
	  							data-add-user-assignment="<?= \yii\helpers\Url::to(['projekt/adduserassignment', 'id' => $model->id]);?>"
	  							>
			                
			                <table class="assigned-users">
			                <?php foreach($model->users as $key => $user): ?>
			                	<tr>
			                		<td>
				                		<?php
				                			$url = \yii\helpers\Url::to(['projekt/removeuserassignment', 
				                				'projektId' => $model->id,
				                				'userId' => $user->id,
			                				]);
				                			echo '<span class="glyphicon glyphicon-trash" data-url="' . $url . '"></span>';
				                		?>
			                		</td>
			                		<td><?= $user->username ?></td>
			                	</tr>	 
			                <?php endforeach;  ?>
			                </table>

			            </div>
			        </div>
			    </div>
			</div>
		</div>
	<?php endif; ?>

</div>