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
		while ( have_rows('segment') ) : the_row();
			if( get_row_layout() == 'sliding_gallery' ):
?>
<div class="gallery-slider-wrapper">
	<div class="your-class">
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
</div>
<?php
			elseif( get_row_layout() == 'download' ): 
				$file = get_sub_field('file');
			endif;
		endwhile;
	else :
	// no layouts found
	endif;
?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.your-class').slick({
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


<?php get_footer(); ?>
