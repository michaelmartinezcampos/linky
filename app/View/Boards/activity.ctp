<div id="activity">
	<h2><b>Welcome <?php echo AuthComponent::user('username'); ?>!</b> Your Boards</h2>
	<section class="feed">
		<?php if(!empty($stats)): ?>
		<?php foreach($stats as $k => $board): ?>
		<article<?php echo $k%3 == 0 ? ' class="alpha"' : ''; ?>>
			<h3><?php echo $this->Html->link($board['title'],'/boards/view/'.$board['id']); ?></h3>
			<ul>
				<li><?php echo $board['photo_count']; ?> images</li>
				<li><?php if(!empty($board['badges'])): ?>
					<?php foreach($board['badges'] as $key => $badge): ?>
					<span style="background-position: 0px <?php echo -24*($key-1); ?>px;" class="badges"></span>
					<?php endforeach; ?>
					<?php else: ?>
					0 badges
					<?php endif; ?>
				</li>
				<li><?php echo $board['comment_count']; ?> comments</li>
			</ul>
		</article>
		<?php endforeach; ?>
		<span class="clear"></span>
		<?php endif; ?>
	</section>
	<h2>Your Photos</h2>
	<section id="feed">
		<?php if(!empty($photos)): ?>
		<?php foreach($photos as $photo): ?>
		<article>
			<div class="image-area left">
				<?php if(!empty($photo['TopicPhoto']['url'])) echo $this->Html->image($photo['TopicPhoto']['url']); ?>
				<?php if(!empty($photo['TopicPhoto']['filename'])) echo $this->Html->image($photo['TopicPhoto']['filepath'].$photo['TopicPhoto']['filename']); ?>
				<?php if(!empty($photo['Badge'])): ?>
				<h3>Badges</h3>
				<?php foreach($photo['Badge'] as $badge): ?>
				<h3 class="award left"><span style="background-position: 0px <?php echo -24*($badge['id']-1); ?>px;" class="badges"></span><?php echo $badge['title']; ?></h3>
				<?php endforeach; ?>
				<span class="clear"></span>
				<?php endif; ?>
			</div>
			<div class="info-area right">
				<p>
				<?php if(!empty($photo['TopicPhoto']['description'])) echo nl2br($photo['TopicPhoto']['description']).'<br />'; ?>
				<small>
					Posted in <?php echo $this->Html->link($boards[$photo['Topic']['board_id']], '/boards/'.$photo['Topic']['board_id'].'/categories/'.$photo['Topic']['id'].'/#'.$photo['TopicPhoto']['id']); ?>
					<em><?php echo date('F j,Y g:i a',strftime($photo['TopicPhoto']['created'])); ?></em></small>
				</p>
			</div>
			<span class="clear"></span>
		</article>
		<?php endforeach; ?>
		<?php else: ?>
		0 badges
		<?php endif; ?>
	</section>
</div>