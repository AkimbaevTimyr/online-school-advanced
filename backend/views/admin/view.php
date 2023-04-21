<?php

use yii\bootstrap5\Html;

?>

<p>
    <?= Html::a('Edit', ['update', 'id' => $model->id], [
        'id' => 'edit-link',
        'onClick' =>"$('#view').find('.modal-body').load($(this).attr('href')); return false;",
        'class' => 'btn btn-primary'
    ]) ?>
    <?= Html::a(Yii::t('app', 'Delete'), ['event-delete', 'id' => $model->id], [
        'id' => 'delete',
        'class' => 'btn btn-danger',
        'style' => 'width: 75px',
        'data' => [
            'confirm' => Yii::t('app', 'Вы уверены что хотите удалить данное событие?'),
            'method' => 'post',
        ],
    ]) ?>
</p>