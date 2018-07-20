<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NewsCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if(!$model->isNewRecord): ?>

        <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?php endif;?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(\dosamigos\ckeditor\CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
