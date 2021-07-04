<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Estate */
/* @var $clients app\models\Client */
/* @var $landTypes app\models\Landtype */
/* @var $areas app\models\Area */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'size')->textInput() ?>

    <?= $form->field($model, 'notes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area_id')->dropdownList(
       $areas,
        ['prompt'=>'Select Area']
    ) ?>

    <?= $form->field($model, 'client_id')->dropdownList(
       $clients,
        ['prompt'=>'Select Client']
    ) ?>

    <?= $form->field($model, 'land_type_id')->dropdownList(
       $landTypes,
        ['prompt'=>'Select Land Type']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
