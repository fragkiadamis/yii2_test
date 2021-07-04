<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estate */
/* @var $clients app\models\Client */
/* @var $landTypes app\models\Landtype */
/* @var $areas app\models\Area */

$this->title = 'Create Estate';
$this->params['breadcrumbs'][] = ['label' => 'Estates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'clients' => $clients,
        'landTypes' => $landTypes,
        'areas' => $areas,
    ]) ?>

</div>
