<?php /* Template Name: Home Page Template */ get_header(); ?>
	<section class="home-head-section">
		<div class="home-head-content">
			<h1><?php the_field('glavni_naslov'); ?></h1>
			<div class="home-head-devider"></div>
			<h2><?php the_field('podnaslov'); ?></h2>
			<p class="cta_sentence">
				<a href="#kontakt" class="blue-cta cta-button" title="Kontaktirajte nas i započnite suradnju"><?php the_field('kontakt_button'); ?></a>
				<span>ili</span> 
				<a href="#o-nama" class="red-cta cta-button" title="Saznajte više o nama i našim uslugama"><?php the_field('o_nama_button'); ?></a>
			</p>
		</div>
	</section>
	<a name="o-nama"></a>
	<section class="home-content-section-dark">
		<div class="home-content-sub-wrapper">
			<h3><?php the_field('o_nama_headline'); ?></h3>
		</div>
		<div class="home-content-section-devider-left"></div>
		<div class="home-content-sub-wrapper">
			<p><?php the_field('o_nama_content'); ?></p>
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/services-infographics.svg" alt="Tomich Productions Services infographics. Listing all services. Video editing, autio production, audio editing, video production, animation, pro forography copywriting.">
		</div>
	</section>
	<a name="reference"></a>
	<section class="home-content-section-light">
		<div class="home-content-sub-wrapper">
			<h3><?php the_field('klijenti_naslov'); ?></h3>
		</div>
		<div class="home-content-section-devider-left"></div>
		<div class="home-content-sub-wrapper">
			<p><?php the_field('klijenti_podnaslov'); ?></p>
			<a href="#kontakt" class="blue-cta cta-button" title="">KONTAKTIRAJ NAS</a>
		</div>
		<div class="client-logos">
			<?php
				// check if the repeater field has rows of data
				if( have_rows('kompanije_logotipi') ):
					// loop through the rows of data
					while ( have_rows('kompanije_logotipi') ) : the_row();
			?>
					<?php 
					$image = get_sub_field('logo_kompanije');
					if( !empty($image) ): ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>
			<?php
					endwhile;
				else :
				// no rows found
				endif;
			?>
		</div>
		<div class="home-content-center">
			<h2>Pogledajte naše radove</h2>
			<a href="#" class="blue-cta cta-button center-button" title="">Foto</a>
			<a href="#" class="blue-cta cta-button center-button" title="">Video</a>
		</div>
	</section>
<?php get_footer(); ?>