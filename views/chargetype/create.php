<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Chargetype */

$this->title = 'Create Chargetype';
$this->params['breadcrumbs'][] = ['label' => 'Chargetypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chargetype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
