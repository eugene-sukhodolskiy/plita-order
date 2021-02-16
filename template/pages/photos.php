<!-- PHOTOS -->
<? $this -> extends_from('base-template') ?>

<div class="side-in">
	<div id="allEntries">
		<ul id="uEntriesList" class="allEntriesTable u-ecc--1" page="2">
			<? foreach($posts as $p): ?>
				<?= $this -> join('post/entry-type-3', [
					'post' => $p
				]) ?>
			<? endforeach ?>
		</ul>
		<hr>

		<?= $this -> join('layouts/pagination', ['type' => 2]) ?>
	</div>
</div>