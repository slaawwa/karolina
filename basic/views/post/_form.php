<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?/*= $form->field($model, 'author_id')->textInput() */?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'short_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'long_desc')->textarea(['rows' => 6]) ?>

    <?/*= $form->field($model, 'main_img')->textarea(['rows' => 6]) */?>

    <?/*= $form->field($model, 'viewers')->textInput() */?>

    <?/*= $form->field($model, 'keys')->textarea(['rows' => 6]) */?>

    <?/*= $form->field($model, 'created')->textInput() */?>

    <?/*= $form->field($model, 'status')->textInput() */?>

    <?/*= $form->field($model, 'type')->textarea(['rows' => 6]) */?>

    <?/*= $form->field($model, 'updated')->textInput() */?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
