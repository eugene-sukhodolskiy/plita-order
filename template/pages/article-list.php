<!-- ARTICLES -->
<? $this -> extends_from('base-template') ?>

<div class="side-in">
	<div id="allEntries">

		<? foreach($posts as $p): ?>
			<?= $this -> join('post/entry-type-2', [
				'title' => $p -> post_title,
				'content' => $p -> post_content,
				'link' => get_permalink($p),
				'thumbnail' => has_post_thumbnail($p) ? get_the_post_thumbnail_url($p, 'thumbnail') : null,
				'timestamp' => translateMonthName(date('d F Y', strtotime($p -> post_date)))
			]) ?>
		<? endforeach ?>
		

		<?= $this -> join('layouts/pagination') ?>
	</div>
</div>

