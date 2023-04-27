<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Student $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список Студентов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="student-view w-75">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary w-auto']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger w-auto',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'name',
            'last_name',
            /*'auth_key',
            'password_hash',
            'password_reset_token',*/
            'email:email',
            'phone_number',
            'status',
            /*'created_at',
            'updated_at',*/
            /*'verification_token',*/
        ],

    ]) ?>

</div>
