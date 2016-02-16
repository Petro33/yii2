<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;



/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form ActiveForm */
?>
<div class="main-profile">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    if($model->user)
        echo $form->field($model->user, 'username');
    ?>


    <?= $form->field($model, 'first_name') ?>
    <?= $form->field($model, 'second_name') ?>
    <?= $form->field($model,'birthday')->widget(DatePicker::className(),['dateFormat' => 'yyyy-MM-dd']) ?>
    <?= $form->field($model, 'hobby')->dropDownList([
            '0' => 'Спорт',
            '1' => 'Подорожі',
            '2' => 'Кіно',
            '3' => 'Техніка',
            '4' => 'Кулінарія',
            '5' => 'Рукоділля',
            '6' => 'Тварини',
            '7' => 'Рослини',
            '8' => 'Театр',
            '9' => 'Плавання',
            '10' => 'Колекціонування'
            ],['prompt'=>'']);
    ?>


        <div class="form-group">
            <?= Html::submitButton('Редактировать', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- main-profile -->
