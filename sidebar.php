<!-- Sidebar -->
<div id="sidebar">

<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar()) : ?>

  <!-- Buscar -->
  <div id="search-box" class="box">
    <h2>Buscar</h2>
    <div class="box-content">
      <form action="<?php bloginfo('url'); ?>" method="get">
        <input type="text" name="s" value="<?php the_search_query(); ?>" /><button type="submit">IR</button>
<!--        <select name="cat">
          <option value="">escolha uma categoria</option>
        </select> -->
      </form>
    </div>
  </div>
  
  <!-- Serviços -->
  <div id="services-box" class="box">
    <h2>Serviços</h2>
    <div class="box-content">
      <ul>
        <?php wp_list_pages('depth=1&title_li=&use_desc_for_title=0&hide_empty=0&orderby=order&exclude=538&child_of=506'); ?>
      </ul>
    </div>
  </div>
  
  <!-- Artigos -->
  <?php $artigos = new WP_Query('showposts=2&cat=10'); ?>
  <?php if($artigos->have_posts()) : ?>
    <div id="articles-box" class="box">
      <h2>Artigos</h2>
      <div class="box-content">
        <ul>
          <?php while($artigos->have_posts()) : $artigos->the_post(); ?>
            <li>
              <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php limit_chars(get_the_excerpt(), 100); ?></a>
            </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
  <?php endif; ?>
  
  <!-- NewsLetter -->
  <?php 
    global $newsletter; 
    //var_dump($newsletter);
  ?>
  <?php if(class_exists('newsletter')) : ?>
    <div id="newsletter-box" class="box">
      <h2>Newsletter</h2>
      <div class="box-content">
        <p><strong>Cadastre-se</strong>, receba os informes.</p>
        <?php //$newsletter->newsletter_form(true, 1); ?>
        <?php echo do_shortcode('[newsletter]'); ?>
      </div>
    </div>
  <?php endif; ?>
  
  <!-- Nuvem de Tags -->
  <div id="tags-box" class="box">
    <h2>Nuvem de Tags</h2>
    <div class="box-content">
      <?php wp_tag_cloud('smallest=8&largest=14&number=18'); ?>
    </div>
  </div>
  
<?php endif; ?>

</div>
