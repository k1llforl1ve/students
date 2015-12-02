<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\students\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a($button['name'], [$button['href']], ['class' => 'btn btn-success']) ?>
    </p>
    <?= Yii::$app->request->cookies['registered']; ?>
    <?= Yii::$app->request->queryParams; ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'surname',
            'email:email',
            'score',
            'gender',
            'birthdate',
            'residence',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
