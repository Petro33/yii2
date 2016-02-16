<?php

use app\assets\AppAsset;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\components\AlertWidget;
use yii\helpers\Url;

/**
 * Created by PhpStorm.
 * User: phpNT
 * Date: 28.02.2015
 * Time: 1:48
 */
/* @var $content string
 * @var $this \yii\web\View */
AppAsset::register($this);
$this->beginPage();
?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <?= Html::csrfMetaTags() ?>
        <meta charset="<?= Yii::$app->charset ?>">
        <?php $this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']); ?>
        <title><?= Yii::$app->name ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody(); ?>

    <div class="wrap">

        <?php
        NavBar::begin(
            [
                'options' => [
                    'class' => 'navbar navbar-default',
                    'id' => 'main-menu'
                ],
                'renderInnerContainer' => true,
                'innerContainerOptions' => [
                    'class' => 'container'
                ],
                'brandLabel' => 'Головна',
                'brandUrl' => [
                    '/main/index'
                ],
                'brandOptions' => [
                    'class' => 'navbar-brand'
                ]
            ]
        );
        if (!Yii::$app->user->isGuest):
            ?>
            <div class="navbar-form navbar-right">
                <button class="btn btn-sm btn-default"
                        data-container="body"
                        data-toggle="popover"
                        data-trigger="focus"
                        data-placement="bottom"
                        data-title="<?= Yii::$app->user->identity['username'] ?>"
                        data-content="
                            <a href='<?= Url::to(['/main/profile']) ?>' data-method='post'>Мій профиль</a><br>
                            <a href='<?= Url::to(['/main/logout']) ?>' data-method='post'>Вийти</a>
                        ">
                    <span class="glyphicon glyphicon-user"></span>
                </button>
            </div>
        <?php
        endif;
        $menuItems = [
            /*[
                'label' => 'Из коробки <span class="glyphicon glyphicon-inbox"></span>',
                'items' => [
                    '<li class="dropdown-header">Расширения</li>',
                    '<li class="divider"></li>',
                    [
                        'label' => 'Перейти к просмотру',
                        'url' => ['/widget-test/index']
                    ]
                ]
            ],*/
            [
                'label' => 'Про Проект <span class="glyphicon glyphicon-question-sign"></span>',
                'url' => [
                    '#'
                ],
                'linkOptions' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'style' => 'cursor: pointer; outline: none;'
                ],
            ],
        ];

        if (Yii::$app->user->isGuest):
            $menuItems[] = [
                'label' => 'Реєстрація',
                'url' => ['/main/reg']
            ];
            $menuItems[] = [
                'label' => 'Вхід',
                'url' => ['/main/login']
            ];
        endif;

        echo Nav::widget([
            'items' => $menuItems,
            'activateParents' => true,
            'encodeLabels' => false,
            'options' => [
                'class' => 'navbar-nav navbar-right'
            ]
        ]);

        Modal::begin([
            'header' => '<h2>Тестовий сайт</h2>',
            'id' => 'modal'
        ]);
        echo 'Написати тестовий сайт, використовуючи будь-який MVC-фреймворк та базу даних MySql.';
        echo '<br>Сайт повинен:
                <br>1. Дозволяти реєстрацію нових користувачів, вимагаючи від них введення логіну та паролю (два рази).
                <br>2. Вхід/вихід користувачів.
                <br>3. Після входу користувач може вводити та редагувати наступну інформацію про себе:
                <br>      імя, фамілія, день народження, перелік інтересів (вибирається з загального списку).

                <br>Список інтересів придумайте самі, щось на зразок "спорт", "подорожі", "кіно" ...';
        Modal::end();
/*
        ActiveForm::begin(
            [
                'action' => ['/найти'],
                'method' => 'get',
                'options' => [
                    'class' => 'navbar-form navbar-right'
                ]
            ]
        );
        echo '<div class="input-group input-group-sm">';
        echo Html::input(
            'type: text',
            'search',
            '',
            [
                'placeholder' => 'Найти ...',
                'class' => 'form-control'
            ]
        );
        echo '<span class="input-group-btn">';
        echo Html::submitButton(
            '<span class="glyphicon glyphicon-search"></span>',
            [
                'class' => 'btn btn-success',
                'onClick' => 'window.location.href = this.form.action + "-" + this.form.search.value.replace(/[^\w\а-яё\А-ЯЁ]+/g, "_") + ".html";'
            ]
        );
        echo '</span></div>';
        ActiveForm::end();
*/
        NavBar::end();
        ?>
        <div class="container">
            <?= AlertWidget::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <span class="badge">
                <span class="glyphicon glyphicon-copyright-mark"></span>  <?= date('Y') ?>
            </span>
        </div>
    </footer>

    <?php $this->endBody(); ?>
    </body>
    </html>
<?php
$this->endPage();