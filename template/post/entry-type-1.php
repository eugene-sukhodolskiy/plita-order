<div class="entry">
	<div class="viewn">
		<div class="viewn-left">
			<div class="viewn-screen">
				<? if(isset($thumbnail) and $thumbnail): ?>
					<img src="<?= $thumbnail ?>" width="100%" alt="">
				<? else: ?>
					<img src="https://www.unfe.org/wp-content/uploads/2019/04/SM-placeholder-1024x512.png" width="100%" alt="">
				<? endif ?>
			</div>
			<a href="<?= $link ?>" class="viewn-link"><span>Узнать подробнее</span></a>
		</div>
		<div class="viewn-in">
			<div class="viewn-title">
				<div class="viewn-name"><?= $title ?></div>
				<div class="viewn-date"><?= $timestamp ?></div>
			</div>
			<?= $excerpt ?>
		</div>
	</div>
</div>