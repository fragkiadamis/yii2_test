<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LandtypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Land Τypes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landtype-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Land Τype', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'state',
            'notes',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
