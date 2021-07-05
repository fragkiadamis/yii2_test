<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estate */

$this->title = 'Update Estate: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Estates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'clients' => $clients,
        'landTypes' => $landTypes,
        'areas' => $areas,
    ]) ?>

</div>
