<?php get_header(); ?>

<!-- Body -->
<div id="body">

	<!-- Highlight -->
	<div id="highlight">
	  <!-- Destaque -->
          <div id="destaque" class="bloco-home">
	    <h2>Destaques</h2>
<?php
$cat_destaque = get_category_by_slug('destaque');
$cat_outras_noticias = get_category_by_slug('outras_noticias');
$cat_area_1 = get_category_by_slug('area_1');
$cat_area_2 = get_category_by_slug('area_2');
$cat_area_3 = get_category_by_slug('area_3');

// area_1
$posts_destaque = new WP_Query(array('posts_per_page' => '3', 'category__and' => array($cat_destaque->term_id, $cat_area_1->term_id)));

?>
    <section class="features col-xs-12 carrossel">
        <?php if ( '' != get_the_post_thumbnail() ) : ?>
            <header class="col-xs-12">
    
            <div class="destaques-content">
                <div class="loading">
				    <h2>Carregando...</h2>
                </div>
    
                <div class="destaques">
                <?php foreach ($posts_destaque->posts as $post ): ?>
                    <div class="destaque">
    	              <div class="img-responsive">
                          <a href="<?php echo get_permalink($post->ID); ?>">
                            <img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full'); echo $image[0]; ?>">
			  </a>
                      </div>
    				  <div class="destaque-text">
                          <a href="<?php echo get_permalink($post->ID); ?>">    
                            <h1><?php echo $post->post_title; ?></h1>
			  </a>
	                  </div>

                    </div> <!-- end destaque -->
                <?php endforeach; ?>
                </div> <!-- end destaques -->
                <div class="navigation"></div>
            </div> <!-- end destaques-content -->
            </header>
        
        <?php endif; ?>
    </section>

    <ul>
<?php 
// area_2
$posts_destaque = new WP_Query(array('posts_per_page' => '1', 'category__and' => array($cat_destaque->term_id, $cat_area_2->term_id)));
if ($posts_destaque->have_posts()) { ?>
    <?php while ($posts_destaque->have_posts()) : $posts_destaque->the_post(); ?>
        <li>
            <a href="<?php the_permalink(); ?>" class="bordaNeg" title="<?php the_title(); ?>"><?php if ( has_post_thumbnail() )  the_post_thumbnail(array(230, 135) ); ?></a>
	    <h4><a rel="category tag" title="View all posts in Notícias" href="http://www.ctav.gov.br/categoria/noticias/">Notícias</a></h4>
	    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
        </li>
    <?php endwhile; ?>
    <?php } ?>
<?php 
// area_3
$posts_destaque = new WP_Query(array('posts_per_page' => '1', 'category__and' => array($cat_destaque->term_id, $cat_area_3->term_id)));
if ($posts_destaque->have_posts()) { ?>
    <?php while ($posts_destaque->have_posts()) : $posts_destaque->the_post(); ?>
        <li>
            <a href="<?php the_permalink(); ?>" class="bordaNeg" title="<?php the_title(); ?>"><?php if ( has_post_thumbnail() )  the_post_thumbnail(array(230, 135) ); ?></a>
	    <h4><a rel="category tag" title="View all posts in Notícias" href="http://www.ctav.gov.br/categoria/noticias/">Notícias</a></h4>
	    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
        </li>
    <?php endwhile; ?>
<?php } ?>        
	    </ul>    
            <br clear="all">	    
	  </div>
	  
	  <!-- Outras Notícias -->
          <div id="other-posts" class="bloco-home">
	    <h2>Outras notícias</h2>
	    <ul>
<?php
// area_1
    $posts_outras_noticias = new WP_Query(array('posts_per_page' => '1', 'category__and' => array($cat_outras_noticias->term_id, $cat_area_1->term_id), 'category_not_in' => array($cat_destaque->term_id)));

if ($posts_outras_noticias->have_posts()) { ?>
    <?php while ($posts_outras_noticias->have_posts()) : $posts_outras_noticias->the_post(); ?>
        <li>
            <a href="<?php the_permalink(); ?>" class="bordaNeg" title="<?php the_title(); ?>"><?php if ( has_post_thumbnail() )  the_post_thumbnail(array(230, 135) ); ?></a>
	    <h4><a rel="category tag" title="View all posts in Notícias" href="http://www.ctav.gov.br/categoria/noticias/">Notícias</a></h4>
	    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
        </li>
    <?php endwhile; ?>
<?php } ?>
<?php 
// area_2
$posts_outras_noticias = new WP_Query(array('posts_per_page' => '1', 'category__and' => array($cat_outras_noticias->term_id, $cat_area_2->term_id)));
if ($posts_outras_noticias->have_posts()) { ?>
    <?php while ($posts_outras_noticias->have_posts()) : $posts_outras_noticias->the_post(); ?>
        <li>
            <a href="<?php the_permalink(); ?>" class="bordaNeg" title="<?php the_title(); ?>"><?php if ( has_post_thumbnail() )  the_post_thumbnail(array(230, 135) ); ?></a>
	    <h4><a rel="category tag" title="View all posts in Notícias" href="http://www.ctav.gov.br/categoria/noticias/">Notícias</a></h4>
	    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
        </li>
    <?php endwhile; ?>
    <?php } ?>
<?php 
// area_3
$posts_outras_noticias = new WP_Query(array('posts_per_page' => '1', 'category__and' => array($cat_outras_noticias->term_id, $cat_area_3->term_id)));
if ($posts_outras_noticias->have_posts()) { ?>
    <?php while ($posts_outras_noticias->have_posts()) : $posts_outras_noticias->the_post(); ?>
        <li>
            <a href="<?php the_permalink(); ?>" class="bordaNeg" title="<?php the_title(); ?>"><?php if ( has_post_thumbnail() )  the_post_thumbnail(array(230, 135) ); ?></a>
	    <h4><a rel="category tag" title="View all posts in Notícias" href="http://www.ctav.gov.br/categoria/noticias/">Notícias</a></h4>
	    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
        </li>
    <?php endwhile; ?>
<?php } ?>        
	    </ul>
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
