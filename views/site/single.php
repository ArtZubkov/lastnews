<?php  
$this->title = $article->title;
?>


<div class="content">
	<section class="news">
		<div class="container">
			<div class="row">
			
				<div class="col-lg-6">
					<div class="article__full">
						<img src="<?= $article->img ?>" alt="Image" class="article__full__img">
						<div class="article__full__block">
							<h3 class="article__full__title"><?= $article->title ?></h3>
							<p class="article__full__text"><?= $article->description ?></p>
							<time class="article__full__pubdate">
								<?= $article->getPubdate() ?>
							</time>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
</div>