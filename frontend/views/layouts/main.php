<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

use frontend\assets\ApAsset;
use common\widgets\Alert;



ApAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

   <?php $this->head() ?>
</head>
<body class='wsite-theme-light tall-header-page wsite-page-index weeblypage-index'>

<?php $this->beginBody() ?>

<!--<div class="wrap">
-->

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

<?php

NavBar::begin([
        
        
        'options' => [
            'class' => 'nav',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Profile', 'url' => ['/profile/index']],
        ['label' => 'Create Profile', 'url' => ['/profile/create']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'nav'],
        'items' => $menuItems,
    ]);
    NavBar::end();



/*
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
      )); ?*/

    ?>
  </div>
  </div>
</div>
<div class="outer-wrapper">
  <div class="wrapper">
     
    <div id="content"><div id='wsite-content' class='wsite-not-footer'>
      <?php echo $content; ?>
</div>
</div>
    <div id="footer"><?php echo Html::encode(\Yii::$app->name); ?>
</div>
  </div>
</div>
  <!--  <div class="container">
        
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>-

</div>
-->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
