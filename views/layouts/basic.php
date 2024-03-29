<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\SiteAsset;

SiteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

	<div class="wrapper">

		<header class="header">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<h1><a class="logo" href="/">Last 10 news</a></h1>
					</div>
				</div>		
			</div>
		</header>

		<?= $content ?>
		
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="copyright">Art Zubkov &copy 2018</div>
					</div>
				</div>
			</div>
		</footer>

	</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>