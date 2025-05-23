<section>
	<?php
	if(isset($homeContent)):
		if($homeContent['hc_blog_show'] === "1"): 
			$blogMonthList = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
			
			$Read->ExeRead(TB_USERS, "WHERE user_status = :st", "st=0");
			$authors = $Read->getResult();

			$Read = new Read; ?>
			<div class="blog-home <?=$homeBlogLayout?>">
				<div class="container">
					<div class="wrapper">
						<?php 
						// ID do produto
						$homeBlogConfig = $homeContent['hc_blog_config'];
						
						if($homeBlogConfig === "1"):
							$Read->ExeRead(TB_BLOG, "WHERE blog_status = :st ORDER BY blog_id DESC LIMIT 0, 6", "st=2");
							$homeBlogItems = $Read->getResult();
						elseif($homeBlogConfig === "2"):
							$homeBlogIds = $homeContent['hc_blog_ids'];
							
							if($homeBlogIds !== NULL):
								$Read->ExeRead(TB_BLOG, "WHERE blog_status = :st AND blog_id IN (" . $homeBlogIds . ") ORDER BY field(blog_id," . $homeBlogIds . ")", "st=2");
								$homeBlogItems = $Read->getResult();
							endif;
						endif; 
						
						if (isset($homeBlogItems)) : ?>
							<?php
							switch($homeContent['hc_blog_theme']){
								case "1": include('doutor/layout/blog-grid/blog-home-grid.php');
								break;
								case "2": include('doutor/layout/blog-list/blog-home-list.php');
								break;
								case "3": include('doutor/layout/blog-full/blog-home-full.php');
								break;
								default: include('doutor/layout/blog-grid/blog-home-grid.php');
								break;
							}
						endif; ?>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		<?php endif; 
	endif;
	?>
</section>