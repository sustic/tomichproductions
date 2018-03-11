<?php /* Template Name: Elementi Page Template */ get_header(); ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
	// check if the flexible content field has rows of data
	if( have_rows('segment') ):
		// loop through the rows of data
		$sliderNo = 0;
		while ( have_rows('segment') ) : the_row();
			if( get_row_layout() == 'sliding_gallery' ):
?>
<div class="gallery-slider-wrapper">
	<div class="slider-no<?php echo $sliderNo; ?>">
	<?php

					// check if the repeater field has rows of data
					if( have_rows('gallery_slider') ):
						$gallerySlide = 0;
						// loop through the rows of data
						while ( have_rows('gallery_slider') ) : the_row();
	?>
						<div>
							<?php 
								// check if the repeater field has rows of data
								if( have_rows('slike_galerije') ):
									$galleryCounter = 0;
									// loop through the rows of data
									while ( have_rows('slike_galerije') ) : the_row();
							?>

								<?php 
								$image = get_sub_field('slika_galerije');
								if( !empty($image) && $galleryCounter == 0 ): ?>
									<a data-fancybox="gallery<?php echo $gallerySlide; ?>" href="<?php echo $image['url']; ?>">
										<img src="<?php echo $image['sizes']['slider']; ?>" alt="<?php echo $image['alt']; ?>">
									</a>
								<?php 
								$galleryCounter++;
								else:
								?>
									<a data-fancybox="gallery<?php echo $gallerySlide; ?>" href="<?php echo $image['url']; ?>"></a>
								<?php
								endif; ?>

							<?php
									endwhile;
								else :
								// no rows found
								endif;
							?>
							<div class="single-slide-content">
								<h2><?php the_sub_field('naslov_slidea'); ?></h2>
								<div class="gallery-devider">
									<div class="gallery-devider-line">
										
									</div>
									<div class="gallery-button-holder">
										<?php 
											$buttonTextVar = get_sub_field('button_text');
											// check if the repeater field has rows of data
											if( have_rows('slike_galerije') ):
												$galleryCounter = 0;
												// loop through the rows of data
												while ( have_rows('slike_galerije') ) : the_row();
										?>
											<?php 
											$image = get_sub_field('slika_galerije');
											if( !empty($image) && $galleryCounter == 0 ): ?>
												<a data-fancybox="gallery<?php echo $gallerySlide; ?>" href="<?php echo $image['url']; ?>">
													<span class="gallery-button-arrow"><?php echo $buttonTextVar; ?></span>
												</a>
											<?php 
											$galleryCounter++;
											else:
											?>
											<?php
											endif; ?>
										<?php
												endwhile;
											else :
											// no rows found
											endif;
										?>
									</div>
								</div>
								<p><?php the_sub_field('opis_slidea'); ?></p>
							</div>
						</div>
	<?php 				$gallerySlide++;
						endwhile;

					else :
					// no rows found
					endif;
	?>
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('.slider-no<?php echo $sliderNo; $sliderNo++; ?>').slick({
				dots: true,
				arrows: true,
				infinite: false,
				speed: 500,
				autoplay: false,
				autoplaySpeed: 3500,
				adaptiveHeight: true,
				slidesToShow: 1,
				responsive: [
				{
					breakpoint: 650,
					settings: {
						arrows: false
					}
				}]
			});
		});
	</script>
</div>
<?php
			elseif( get_row_layout() == 'video_reference' ):
?>
<div class="video-reference-wrapper">
<?php
			// check if the repeater field has rows of data
			if( have_rows('reference_video') ):
				$videoNo = 0;
				// loop through the rows of data
				while ( have_rows('reference_video') ) : the_row();
?>
				<div class="single-video-referenca">
					<?php 
					$image = get_sub_field('slika');
					if( !empty($image) ): ?>
						<img src="<?php echo $image['sizes']['video-galerija']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>
					<h3><?php the_sub_field('naslov'); ?></h3>
					<div class="video-devider">
						<div class="video-devider-line">
							
						</div>
						<div class="video-button-holder">
							<a data-fancybox="video-<?php echo $videoNo; $videoNo++;  ?>" href="<?php the_sub_field('video_link'); ?>"><span class="video-button-arrow">PLAY</span></a>
						</div>
					</div>
					
					<p>Ime klijenta: <span><?php the_sub_field('klijent'); ?></span></p>
					<p><?php the_sub_field('opisni_tekst'); ?></p>
					
				</div>
<?php
				endwhile;
			else :
			// no rows found
			endif;
?>
</div>


<?php
			elseif( get_row_layout() == 'video_referenceasasas' ):
?>
<?php
			endif;
		endwhile;
	else :
	// no layouts found
	endif;
?>


<?php get_footer(); ?>
