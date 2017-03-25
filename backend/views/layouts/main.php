<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;

use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\Menu;
use yii\debug\Toolbar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body  class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>


<div class="header-wrapper">
  <div class="wrapper">
    <div class="title">
      <div id="header-right-wrapper-l">
        <div id="header-right-wrapper-r">
          <table id="header-right">
            <tr>
              <td>
                <div class="search"></div>
                <table>
                  <tr>
                    <td class="phone-number"></td>
                    <td class="social"></td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <span class="titletext">
        <span class='wsite-logo'><a href='/'><span id="wsite-title"><?php echo Html::encode(\Yii::$app->name); ?></span></a></span>
      </span>
      <div class="clear"></div>
    </div>
    <div id="navigation">
      <?php echo Menu::widget(array(
        'options' => array('class' => 'nav'),
        'items' => array(
          array('label' => 'Home', 'url' => array('/site/index')),
          array('label' => 'Sign Up', 'url' => array('/site/signup')),
          array('label' => 'Contact', 'url' => array('/site/contact')),
          Yii::$app->user->isGuest ?
            array('label' => 'Login', 'url' => array('/site/login')) :
            array('label' => 'Logout (' . Yii::$app->user->identity->email .')' , 'url' => array('/site/logout')),
        ),
      )); ?></div>
  </div>
</div>
<div class="outer-wrapper">
  <div class="wrapper">
    <div id="banner">
      <div class="wsite-header"></div>
    </div>
    <div id="content"><div id='wsite-content' class='wsite-not-footer'>
      <?php echo $content; ?>
</div>
</div>
    <div id="footer"><?php echo Html::encode(\Yii::$app->name); ?>
</div>
  </div>
</div>
  <!--  <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>-
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
