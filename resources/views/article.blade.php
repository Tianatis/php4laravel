<? if ($article): ?>

<article class="post<? if ($article['private']): ?> sticky<? endif; ?>">
	<header class="entry-header">
		<? if ($article['private']): ?><div class="private-img"></div><? endif; ?>
		<h1 class="entry-title"><?=$article['title'];?></h1>
	</header>
	<!-- .entry-header -->

	<div class="entry-content">
		<?=$article['content'];?>
	</div>
	<!-- .entry-content -->

	<footer class="entry-footer">
		<div class="clear">
			<div class="ingrid-social-share">
				<div class="share-links">
					<?=$article['name'];?> <?=date('d.m.Y',strtotime($article['post_date']));?> 
					
				</div>
			</div>

			<div class="comment-link">
		<? if($auth && $auth <= 2): ?>
		
		(<a href="<?=ROOT;?><?=PANEL;?>/articles/edit/<?=$article['id'];?>">Редактировать</a>)&nbsp;
		(<a href="<?=ROOT;?><?=PANEL;?>/articles/delete/<?=$article['id'];?>">Удалить</a>)
		
	<? endif; ?>
			</div>
		</div>
		</footer>
	<!-- .entry-footer -->
</article>
	
<? endif; ?>
	
