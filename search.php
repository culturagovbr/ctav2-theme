<?php get_header(); ?>

<!-- Body -->
<div id="body">
  
  <!-- Archive -->
  <div id="archive">
  	<h2 class="archive-title"><strong>Busca &raquo; <?php the_search_query(); ?></strong></h2>
    
    <?php if(have_posts()) : ?>
      <h5 class="archive-description">Confira abaixo todos os posts relacionados a categoria selecionada.</h5>
      
      <?php while(have_posts()) : the_post(); ?>
        <div class="result <?php if($cor = !$cor) print "alter"; ?>">
          <?php the_thumb('thumbnail', 'class="alignleft" width="75" height="75"'); ?>
          <p class="archive-published">Publicado em <?php the_date('d/m/Y'); ?></p>
          <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
          <p class="archive-author"><strong><?php the_author(); ?></strong> em <?php the_category(', '); ?></p>
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_excerpt(); ?></a>
        </div>
      <?php endwhile; ?>
      
      <?php if(function_exists('wp_pagenavi')) wp_pagenavi(); ?>
      
    <?php else : ?>
      <h5 class="archive-description">Caso não tenha encontrado o artigo desejado, <strong>utilize a busca.</strong></h5>
    
    <?php endif; ?>
  </div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
