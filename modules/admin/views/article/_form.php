<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\helpers\ArticleHelper;
use kartik\select2\Select2;
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

    <?= $form->field($model, 'category_id')->widget(Select2::class, [
        'data' => ArticleHelper::getCategoriesForDropDownList(),
        'language' => 'ru',
        'options' => ['placeholder' => 'Укажите категорию'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'tags')->widget(Select2::class, [
        'data' => ArticleHelper::getTagsForDropDownList(),
        'language' => 'ru',
        'options' => ['placeholder' => 'Укажите теги'],
        'pluginOptions' => [
            'allowClear' => true,
            'closeOnSelect' => true,
            'multiple' => true
        ],
    ]); ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
