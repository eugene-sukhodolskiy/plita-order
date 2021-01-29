<!-- HOME -->
<? $this -> extends_from('base-template') ?>

<div class="side-in">
	<div id="allEntries">

		<? foreach($posts as $p): ?>
			<? $link = get_permalink($p); if(strpos($link, 'publ')) continue; ?>
			<?= $this -> join('post/entry-type-1', [
				'title' => $p -> post_title,
				'excerpt' => $p -> post_excerpt,
				'link' => $link,
				'thumbnail' => has_post_thumbnail($p) ? get_the_post_thumbnail_url($p, 'thumbnail') : null,
				'timestamp' => translateMonthName(date('d F Y', strtotime($p -> post_date)))
			]) ?>
		<? endforeach ?>
		

		<?= $this -> join('layouts/pagination') ?>
	</div>
</div>

