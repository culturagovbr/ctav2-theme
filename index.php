<?php get_header(); ?>

<!-- Body -->
<div id="body">

	<!-- Highlight -->
	<div id="highlight">

		<!-- Outras Notícias -->
          <div id="other-posts">
            <li>
              <a class="bordaNeg" href="http://www.ctav.gov.br/carta-de-servicos-ao-cidadao/" title="Carta de Serviços do CTAv"><img width="230" height="135" src="http://www.ctav.gov.br/wp-content/uploads/2012/12/carta-imagem.bmp" alt=""></a>
	      <h4><a href="http://ctav.localhost/categoria/noticias/" title="View all posts in Notícias" rel="category tag">Notícias</a></h4>
	      <h3><a href="http://www.ctav.gov.br/carta-de-servicos-ao-cidadao/" title="Carta de Serviços do CTAv">Carta de Serviços do CTAv</a></h3>
	      <a href="http://www.ctav.gov.br/carta-de-servicos-ao-cidadao/&quot;" title="Carta de Serviços do CTAv">Acesse aqui</a>
             </li>
<?php
$sticky = get_option( 'sticky_posts' );

$posts_destaque = new WP_Query(array('posts_per_page' => '2',  'post__in' => get_option('sticky_posts') ));
if ($posts_destaque->have_posts()) { ?>
    <ul>
    <?php while ($posts_destaque->have_posts()) : $posts_destaque->the_post(); ?>
        <li>
            <a href="<?php the_permalink(); ?>" class="bordaNeg" title="<?php the_title(); ?>"><?php if ( has_post_thumbnail() )  the_post_thumbnail(array(230, 135) ); ?></a>
	    <h4><a rel="category tag" title="View all posts in Notícias" href="http://www.ctav.gov.br/categoria/noticias/">Notícias</a></h4>
	    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
        </li>
    <?php endwhile; ?>
    </ul>
<?php    
}
?>
            <br clear="all">
          </div>
	</div>

	<?php $blogs = new WP_Query('p=620'); ?>
	<?php if($blogs->have_posts()) : $blogs->the_post(); ?>
		<div id="blogs">
			<h2>Projetos</h2>

			<div id="blogs-content">
				<a href="http://www.filmecultura.org.br/" title="<?php the_title(); ?>" target="_blank"><?php the_thumb('high'); ?></a>
				<?php edit_post_link(__("Edit")); ?>
				<h3><a href="http://www.filmecultura.org.br/" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></h3>
				<?php the_content(); ?>
				<!--<div class="outrosBlogs"><a href="http://www.cultura.gov.br/site/blogs-do-minc/" title="Outros blogs" target="_blank">Outros Blogs</a></div>-->
			</div>
		</div>
	<?php endif; ?>

	<?php $programs = new WP_Query('cat=8'); ?>
	<?php if($programs->have_posts()) : ?>
		<div id="programs">
			<h2>Programas</h2>
			<div id="programs-content">
				<div id="programs-cycle">
					<?php while($programs->have_posts()) : $programs->the_post(); ?>
						<div>
							<?php the_thumb('medium'); ?>
				<div class="detalhesProgram"><?php the_content(); ?></div>
						</div>
					<?php endwhile; ?>
				</div>
				<div id="programs-navigator"></div>
			</div>
		</div>
	<?php endif; ?>

	<?php $conheca = new WP_Query('page_id=618'); ?>
	<?php if($conheca->have_posts()) : $conheca->the_post(); ?>
		<div id="videos">
			<h2>Conheça o CTAv</h2>
			<div id="videos-content">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<!-- include parceiros -->
<?php
$page = get_page_by_path('parceiros');
if ($page->post_status == 'publish') {
  echo apply_filters('the_content', $page->post_content);
}
?>
<?php get_footer(); ?>
