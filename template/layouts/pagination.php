<?php echo get_the_posts_pagination([
	'show_all'           => false, // показаны все страницы участвующие в пагинации
	'end_size'           => 2,     // количество страниц на концах
	'mid_size'           => 2,     // количество страниц вокруг текущей
	'prev_next'          => (isset($type) and $type == 2) ? false : true,
	'prev_text'          => '«',
	'next_text'          => '»',
	'screen_reader_text' => '',
	'class'              => 'catPages1',  // class="" для nav элемента. С WP 5.5
]); ?>

<style>
	.navigation {
		clear: both;
		text-align: center;
	}

	.screen-reader-text{
		display: none;
	}

	.page-numbers.current{
		font-weight: bold;
	}
</style>

<? if(isset($type) and $type == 2): ?>
	<style>
		.navigation a.page-numbers{
			background: #32c182;
		}

		.navigation a, .navigation span{
	    float: left;
	    margin: 0 5px 0 0;
	    display: block;
	    height: 19px;
	    line-height: 20px;
	    padding: 0 4px;
	    text-decoration: none;
	    color: #fff;
	    text-shadow: 1px 1px rgba(0,0,0, 0.4);
	    font-weight: normal !important;
	    font-family: calibri !important;
	    -webkit-transition: all .3s;
	    -moz-transition: all .3s;
	    transition: all .3s;
		}

		.navigation .dots{
			float: left;
	    margin: 0 5px 0 0;
	    line-height: 30px;
		}

		.navigation .page-numbers.current{
			background: #333333;
		}
	</style>
<? endif ?>