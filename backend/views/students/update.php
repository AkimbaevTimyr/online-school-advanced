<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Students $model */

$this->title = 'Update Students: ' . $model->id;

?>


<div class="students-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>