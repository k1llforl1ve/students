<?php
/** @var TYPE_NAME $countries */
/** @var TYPE_NAME $message */
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
    <h1>Countries<?= Html::encode($message)?></h1>
    <ul>
        <?php
        foreach ($countries as $country): ?>
            <li>
                <?= Html::encode("{$country->username} ({$country->username})") ?>:
                <?= $country->username ?>
            </li>
        <?php endforeach; ?>
    </ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>