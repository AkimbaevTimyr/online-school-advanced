<?php

use backend\models\Students;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */


?>

<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Students', ['/admin/create-user'], ['class' => 'btn btn-success w-auto']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => "w-75"],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'username',
            //            'auth_key',
            //            'password_hash',
            //            'password_reset_token',
            'email:email',
            //'status',
            'created_at',
            'updated_at',
            //'verification_token',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Students $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>


