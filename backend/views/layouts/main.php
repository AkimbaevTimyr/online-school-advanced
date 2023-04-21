<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\assets\AppAsset;
use common\widgets\Alert;
use kartik\icons\FontAwesomeAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;

FontAwesomeAsset::register($this);
AppAsset::register($this);
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

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
