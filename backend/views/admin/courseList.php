<?php
use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

?>

<div class="d-flex">
    <div >
        <?php echo $this->render("/admin/sidebar.php"); ?>
    </div>
    <div class="main-body gray-bg">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0; height: 60px">
            <div class="navbar-header">
            </div>
            <ul class="nav navbar-top-links navbar-right" style="margin-right: 20px;">
                <?php
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav align-center'],
                    'items' => [
                        Yii::$app->user->isGuest
                            ? ['label' => 'Login', 'url' => ['/user/login']]
                            : '<li class="nav-item">'
                            . Html::beginForm(['/user/logout'])
                            . Html::submitButton(
                                'Выйти',
                                ['class' => 'm-t-xs nav-link btn logout']
                            )
                            . Html::endForm()
                            . '</li>'
                    ]
                ]);
                ?>
            </ul>
        </nav>
        <div id="main-body-content" style="margin-left: 30px"">
            <h3>Список Курсов</h3>
        <div style="width: 400px;" />
        <ul class="list-group" >
            <?php foreach ($model as $course):?>
                <a href="<?php echo Url::to(['admin/course-page', 'id' => $course->id]); ?>" class="list-group-item"><?php echo $course->name ?></a>
            <?php endforeach; ?>
        </ul>
    </div>
    <div id='calendar'></div>
</div>





