<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Landtype */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="landtype-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'charge')->textInput() ?>

    <?= $form->field($model, 'state')->dropdownList(
        [
            'active' => 'Ενεργό',
            'inactive' => 'Ανενεργό'
        ],
        ['prompt'=>'Select State']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
