<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Por favor, n&atilde;o entre diretamente. Obrigado!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments"><?php _e("Este post est&aacute;. Entre com sua senha para ver os coment&aacute;rios."); ?><p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ('open' == $post-> comment_status) : ?>
  <h2 class="comentPublicados"><em><?php comments_number('Nenhum Comentário Publicado', '1 Comentário Publicado', '% Comentários Publicados'); ?></em></h2>
	
	<ol class="commentlist">	
	<?php $commentcounter = 0; ?>
	<?php foreach ($comments as $comment) : ?>
		<?php $commentcounter++; ?>
		<li class="<?php echo $oddcomment; if ($comment->comment_author_email == get_the_author_email()) { echo ' authorcomment'; } ?>" id="comment-<?php comment_ID() ?>">
			<div class="cmtinfo"><em><?php edit_comment_link('editar','',''); ?> em <?php comment_date('d M Y') ?> &agrave;s <?php comment_time() ?></em><cite><?php comment_author_link() ?></cite></div>
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Seu coment&aacute;rio est&aacute; aguardando ser aprovado.</em><br />
			<?php endif; ?>			
			<?php comment_text() ?>			
		</li>
	<?php 
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>
	<?php endforeach; ?>
	</ol>

 <?php else : ?>

  <?php if ('open' == $post-> comment_status) : ?> 	
	 <?php else : // commentarios fechados ?>
		<div id="inputsform">
			<p class="nocomments">Coment&aacute;rios fechados.</p>
		</div>		
  <?php endif; ?>
  
<?php endif; ?>

<?php if ('open' == $post-> comment_status) : ?>
<div id="inputsform">

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Voc&ecirc; deve est&aacute; <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logado</a> para postar um coment&aacute;rio. </p><?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<!-- REMOVIDO A PARTE DE RESPOSTA PARA USAREM EDITANDO OS COMENT POSTS -->


<?php else : ?>


<ul id="abas">
	<li>
		<a href="#aba1">Comentar</a>
	</li>
	<li>		
		<a href="#aba2">Perguntar</a>
	</li>
</ul>

 
<div id="aba1" class="contaba">
<a name="aba1" />

  <div id="comment-form">
    <div id="comment-form-content">
      <form action="<?php print bloginfo('url'); ?>/wp-comments-post.php" method="post">
        <ul>
          <li class="alter">
            <label for="author">Nome</label>
            <input type="text" name="author" id="author" value="<?php print $comment_author; ?>" tabindex="1" />
          </li>
          <li>
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" value="<?php print $comment_author_email; ?>" tabindex="2" />
          </li>
          <li class="alter">
            <label for="url">Website</label>
            <input type="text" name="url" id="url" value="<?php print $comment_author_url; ?>" tabindex="3" />
          </li>
          <li>
            <label><strong>Mensagem</strong></label>
            <textarea name="comment" id="comment" tabindex="5" cols="20" rows="4"></textarea>
            <br clear="all" />
          </li>
          
          <?php if(function_exists('show_authimage')) : ?>
          <li class="alter">
            <label for="code">Validador</label>
            <input type="text" name="code" id="code" value="" tabindex="5" /> <?php print show_authimage(); ?>
            <br clear="all" />
          </li>
          <?php endif; ?>
          
          <li>
            <?php do_action('comment_form', $post->ID); ?>
            <input type="hidden" name="comment_post_ID" value="<?php print $id; ?>" />
            <button type="submit" tabindex="6" title="Enviar"></button>
            
            <h4>Atenção:</h4>
            <p>Todos comentários sao checados pelos admins.</p>
          </li>
        </ul>
      </form>
    </div>
  </div>
 </div>
  
<div id="aba2" class="contaba">
	<a name="aba2" />
	
	<div id="comment-form">
    	
    	<div id="comment-form-content">	
	
			<?php if($_POST['enviar']=='true') :

			$titulo=$_POST['titulo'];
			$email=$_POST['email'];
			$content=$_POST['conteudo'];

                  // Fernão 27/01/2016: ALTEREI DE wp_mail() para mail() pois a primeira não funcionava =/
		  //wp_mail( 'assessoria.ctav@cultura.gov.br;comunicacao.ctav@cultura.gov.br', $titulo, $content, $email );
                  mail( 'assessoria.ctav@cultura.gov.br;comunicacao.ctav@cultura.gov.br', $titulo, $content, $email );

		  
		  endif; ?>

			<form action="" method="post">
			<ul>
			  <li class="alter">
				<label for="author">Assunto:</label>
				<input type="text" name="titulo" tabindex="1" />
			  </li>
			  <li>
				<label for="email">E-mail:</label>
				<input type="text" name="email" tabindex="2" />
			  </li>
			  <li class="alter">
				<label for="url">Perguntar:</label>
				<textarea name="conteudo" tabindex="5" cols="" rows=""></textarea>
			  </li>
				<br clear="all" />			  <li>
				<button name="enviar" value="true" type="submit" class="comentar" tabindex="6" title="Enviar"></button>	
			  </li>
			<ul>
			</form>
		</div>
	</div>
</div>
	<br clear="all" />
	

<?php endif; ?>
</div>
<?php endif; ?>
<?php endif; ?>
