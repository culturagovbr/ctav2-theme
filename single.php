<?php get_header(); ?>

<!-- Body -->
<div id="body">
  
  <!-- Archive -->
  <div id="post">
    <?php if(have_posts()) : the_post(); ?>
      <div class="options">
        <?php edit_post_link('Editar'); ?>
        <a href="javascript:print()" title="Imprimir" class="imprimir">Imprimir</a>
      </div>
      
      <h2 class="post-title"><?php the_title(); ?></h2>
      <h5 class="post-description"><?php print $post->post_excerpt; ?></h5>
      <p class="post-published">Publicado em <?php the_date('d \d\e F \d\e Y'); ?></p>
      <p class="post-author">por <?php the_author(); ?></p>
      <div class="entry"><?php the_content(); ?></div>
      <br clear="all" />
      
      <!-- Tags -->
      <div class="post-tags">
        <h3>TAGS</h3>
		<div class="linhaCinza">
        	<?php the_tags(''); ?>
		</div>
      </div>
      
      <!-- Anexos -->
      <?php if(function_exists('post_attachments')) post_attachments(); ?>
      
      <?php comments_template(); ?>
    
    <?php else : ?>
      <h2 class="post-title">404</h2>
      <h5 class="post-description">Desculpe! A página que procura não foi encontrada.</h5>
    
    <?php endif; ?>
  </div>
  
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
