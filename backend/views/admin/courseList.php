<?php
use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;


$this->title = 'Список Курсов';
$this->params['breadcrumbs'][] = $this->title;
?>


    <h3>Список Курсов</h3>
    <div style="width: 400px;" />
        <ul class="list-group" >
            <?php foreach ($model as $course):?>
                <a href="<?php echo Url::to(['admin/course-page', 'id' => $course->id]); ?>" class="list-group-item"><?php echo $course->name ?></a>
            <?php endforeach; ?>
        </ul>
    </div>





