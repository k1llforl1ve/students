<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\test\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/** @var TYPE_NAME $users */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="users-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php foreach ($users as $arr):?>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="/test/web<?= $arr->username ?>" alt="...">
                        <div class="caption">
                            <h3><?= $arr->user_id ?></h3>
                            <p><?= $arr->user_id ?></p>
                            <p><a href="/test/web/index.php?r=test%2Fdefault%2Fview&id=<?= $arr->id ?>" class="btn btn-primary" role="button">Button</a></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?= LinkPager::widget(['pagination' => $pagination]) ?>