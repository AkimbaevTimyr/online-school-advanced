<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Список Студенов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Student', ['/admin/create-user'], ['class' => 'btn btn-success w-auto']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => "w-75"],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'username',
            'name',
            'last_name',
//            'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'phone_number',
            //'status',
            //'created_at',
            //'updated_at',
            //'verification_token',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $data, $key, $index, $column) {
                    foreach ($data as $d){
                        $model = new User();
                        $model->id = $d;
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                }
            ],
        ],
    ]); ?>


</div>
