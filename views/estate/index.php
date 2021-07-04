<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estate-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Estate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'client.firstName',
            'client.lastName',
            'size',
            'area.name',
            'landType.name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
