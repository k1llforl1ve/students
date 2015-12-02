<?php
/**
 * Created by PhpStorm.
 * User: Zakhraii
 * Date: 9/6/2015
 * Time: 12:21 AM
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
    <li><label>Email</label>: <?= Html::encode($s) ?></li>
</ul>
<?php




if (Yii::$app->session->hasFlash('success')) {
    echo "<div class='alert alert-success'>".Yii::$app->session->getFlash('success')."</div>";
}
?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'name'); ?>
<?= $form->field($model, 'email'); ?>

<?= Html::submitButton('Submit', ['class' => 'btn btn-success']); ?>
