<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Last News';
?>

    <div class="content">
        <section class="news">
            <div class="container">
                <div class="row">

                <?php foreach($articles as $article): ?>
            
                    <div class="col-lg-3">
                        <div class="article">
                            <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>">
                                <img src="<?= $article->img ?>" alt="Image" class="article__img">
                                <div class="article__block">                    
                                    <h3 class="article__title"><?= $article->title ?></h3>
                            </a>       
                                </div>
                        </div>
                    </div>  

                <?php endforeach; ?>
             
                </div>
            </div>
        </section>
    </div>

