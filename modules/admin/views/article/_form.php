<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\helpers\ArticleHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model, [
        'class' => 'alert alert-error'
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArticleHelper::getCategoriesForDropDownList(), [
        'prompt' => 'Укажите категорию'
    ]); ?>

    <?= $form->field($model, 'tags')->dropDownList(ArticleHelper::getTagsForDropDownList(), [
        'prompt' => 'Укажите теги',
        'multiple' => true
    ]); ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
