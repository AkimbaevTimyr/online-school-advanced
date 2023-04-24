<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;

?>

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
                            ['class' => 'm-t-xs nav-link btn logout text-dark']
                        )
                        . Html::endForm()
                        . '</li>'
                ]
            ]);
        ?>
    </ul>
</nav>
