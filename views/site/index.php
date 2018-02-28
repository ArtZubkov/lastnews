<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Last News';
?>

    <div class="content">
        <section class="news">
            <div class="container">
                <div class="row">

                <?php for ($i=1; $i < 11 ; $i++): ?>
            
                    <div class="col-lg-3">
                        <div class="article">
                            <a href="<?= Url::toRoute(['site/view']); ?>">
                                <img src="<?=''?>" alt="Image" class="article__img">
                                <div class="article__block">                    
                                    <h3 class="article__title"><?='Lorem Ipsum'?></h3>
                            </a>       
                                </div>
                        </div>
                    </div>  

                <?php endfor; ?>
             
                </div>
            </div>
        </section>
    </div>

