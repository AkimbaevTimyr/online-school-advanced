<?php

use common\assets\AppAsset;
use frontend\assets\FrontendAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\helpers\Html;


/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
FrontendAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <div class="d-flex">
        <?php if(!Yii::$app->user->isGuest): ?>
            <?php echo $this->render('/widgets/app/nav'); ?>
        <?php endif; ?>
        <?= $content ?>
    </div>

    <script src="/js/app.js"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
