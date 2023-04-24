<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\FrontendAsset;
use kartik\icons\FontAwesomeAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;

\common\assets\AppAsset::register($this);
FontAwesomeAsset::register($this);
FrontendAsset::register($this);
Yii::$app->params['bsVersion'];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body >
<?php $this->beginBody() ?>

        <div class="d-flex">
            <div>
                <?php echo $this->render('/widgets/sidebar'); ?>
            </div>
            <div class="main-body gray-bg">
                <?php echo $this->render('/widgets/nav'); ?>
                <div id="main-body-content" style="margin-left: 30px"">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    <?= $content ?>
                </div>
            </div>
        </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
