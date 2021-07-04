<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Chargetype */

$this->title = 'Update Chargetype: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Chargetypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="chargetype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
