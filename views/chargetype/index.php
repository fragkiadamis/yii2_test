<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChargetypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Charge Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chargetype-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Chargetype', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'notes',
            'amount',
            'state',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
