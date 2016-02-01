<?php get_header(); ?>

<!-- Body -->
<div id="body">
  
  <!-- Page -->
  <div id="post">
    <?php if(have_posts()) : the_post(); ?>
      <div class="options">
        <?php edit_post_link('Editar'); ?>
        <a href="javascript:print()" title="Imprimir" class="imprimir">Imprimir</a>
      </div>
      
      <h2 class="post-title"><?php the_title(); ?></h2>
		  <ul class="pageFilha">
			<?php wp_list_pages("depth=1&title_li=&child_of={$post->ID}"); ?>
		  </ul>
      <div class="entry"><?php the_content(); ?></div>
      <br clear="all" />
    
    <?php else : ?>
      <h2 class="post-title">404</h2>
      <h5 class="post-description">Desculpe! A página que procura não foi encontrada.</h5>
    
    <?php endif; ?>
  </div>
  
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
