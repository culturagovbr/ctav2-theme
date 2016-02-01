<?php get_header(); ?>

<!-- Body -->
<div id="body">
  
  <!-- Archive -->
  <div id="archive">
    <?php if(is_category()) : ?>
  	<h2 class="archive-title"><strong>Categoria &raquo; <?php single_cat_title(); ?></strong></h2>
  	<ul class="pageFilha">
  	  <?php wp_list_categories("depth=1&title_li=&use_desc_for_title=0&child_of={$cat}"); ?>
  	</ul>
  	
  	<?php elseif(is_tag()) : ?>
  	<h2 class="archive-title"><strong>Tag &raquo; <?php single_tag_title(); ?></strong></h2>
  	
  	<?php elseif(is_day()) : ?>
  	<h2 class="archive-title"><strong>Arquivos do dia &raquo; <?php get_the_time('F jS, Y'); ?></strong></h2>
  	
  	<?php elseif(is_month()) : ?>
  	<h2 class="archive-title"><strong>Arquivos do mês &raquo; <?php get_the_time('F, Y'); ?></strong></h2>
  	
  	<?php elseif(is_year()) : ?>
  	<h2 class="archive-title"><strong>Arquivos do ano &raquo; <?php get_the_time('Y'); ?></strong></h2>
  	
    <?php elseif(is_author()) : ?>
    <?php $current_author = get_userdata(intval($author)); ?>
  	<h2 class="archive-title"><strong>Arquivos do autor &raquo; <?php print $current_author->user_nicename; ?></strong></h2>
  	
  	<?php else : ?>
  	<h2 class="archive-title"><strong>Arquivos</strong></h2>
  	<?php endif; ?>
    
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
