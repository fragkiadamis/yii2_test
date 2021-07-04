<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Landtype */

$this->title = 'Create Landtype';
$this->params['breadcrumbs'][] = ['label' => 'Landtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landtype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
