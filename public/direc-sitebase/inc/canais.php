<div class="social">
	<?php if (isset($urlInstagram)): ?>
		<a rel="nofollow" class="social__icons instagram" href="<?= $urlInstagram ?>" target="_blank" title="Instagram">
			<i class="fab fa-instagram" aria-hidden="true"></i>
		</a>
	<?php endif ?>
	<?php if (isset($urlFacebook)): ?>
		<a rel="nofollow" class="social__icons facebook" href="<?= $urlFacebook ?>" target="_blank" title="Facebook">
			<i class="fab fa-facebook" aria-hidden="true"></i>
		</a>
	<?php endif ?>
	<?php if (isset($urlTwitter)): ?>
		<a rel="nofollow" class="social__icons twitter" href="<?= $urlTwitter ?>" target="_blank" title="Twitter">
			<i class="fa-brands fa-x-twitter" aria-hidden="true"></i>
		</a>
	<?php endif ?>
	<?php if (isset($urlLinkedIn)): ?>
		<a rel="nofollow" class="social__icons linkedin" href="<?= $urlLinkedIn ?>" target="_blank" title="Linked In">
			<i class="fab fa-linkedin-in" aria-hidden="true"></i>
		</a>
	<?php endif ?>
	<?php if (isset($urlYouTube)): ?>
		<a rel="nofollow" class="social__icons youtube" href="<?= $urlYouTube ?>" target="_blank" title="Youtube">
			<i class="fab fa-youtube" aria-hidden="true"></i>
		</a>
	<?php endif ?>
	<?php if (isset($urlTikTok)): ?>
		<a rel="nofollow" class="social__icons tiktok" href="<?= $urlTikTok ?>" target="_blank" title="Tik Tok">
			<i class="fa-brands fa-tiktok" aria-hidden="true"></i>
		</a>
	<?php endif ?>

	<?php if (isset($urlThreads)) : ?>
		<a rel="nofollow" class="social__icons threads" href="<?= $urlThreads ?>" target="_blank" title="Threads">
			<i class="fa-brands fa-threads" aria-hidden="true"></i>
		</a>
	<?php endif ?>

	<?php if (isset($urlPinterest)) : ?>
		<a rel="nofollow" class="social__icons pinterest" href="<?= $urlPinterest ?>" target="_blank" title="Pinterest">
			<i class="fa-brands fa-pinterest-p" aria-hidden="true"></i>
		</a>
	<?php endif ?>
</div>