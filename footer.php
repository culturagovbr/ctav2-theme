	  <br clear="all" />
      <!-- Voltar ao Topo -->
      <a href="#" class="backtotop">Voltar ao Topo</a>
      </div>
      <!-- Menu -->
	  <div class="bg-menu-bottom">
		  <div id="menu-bottom">
			<ul>
			  <li><a href="<?php print get_page_link(104); ?>" title="Institucional">Institucional</a></li>
			  <?php wp_list_categories('depth=1&title_li=&use_desc_for_title=0&hide_empty=0&orderby=order&exclude=8,121'); ?>
			  <?php wp_list_pages('depth=1&title_li=&sort_column=menu_order&hide_empty=0&orderby=order&exclude=104,252,618'); ?>
			  <li class="rss-bottom"><a href="<?php bloginfo('rss2_url'); ?>" title="RSS">RSS</a></li>
			</ul>
		  </div>
	  </div>
      <!-- Footer -->
	  <div class="bg-footer">
		  <div id="footer">
			<a href="<?php bloginfo('url'); ?>" title="Centro Técnico Audiovisual" class="ctav-footer">Centro Técnico Audiovisual</a>
			<a href="http://wordpress.org" title="WordPress.org" class="wordpress">WordPress</a>
			<!--<a href="http://creativecommons.org/" title="Creative Commons" class="creative-commons">Creative Commons</a>-->
			<!--<p class="licence">Todo material produzido nesse portal está protegido pelo Creative Commons, e as regras estabelecidas na licença devem ser seguidas</p>-->
			<p class="licence">O conteúdo deste site, vedado o seu uso comercial, poderá ser reproduzido desde que citada a fonte, excetuados os casos especificados em contrário e os conteúdos replicados de outras fontes.</p>
			<p>O <strong>Centro Técnico Audiovisual - CTAv/SAV/MINC</strong> utiliza <a href="http://wordpress.org" title="WordPress">WordPress</a> como seu gerenciador de conteúdos.</p>
			<address>Avenida Brasil, 2482 - Benfica - 20930-040 Rio de Janeiro<br />Central telefônica - (21) 3501-7800</address>
			<br clear="all" />
		  </div>
      </div>


    <!-- Analytics -->
    <script type="text/javascript">
      var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
      document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script type="text/javascript">
      var pageTracker = _gat._getTracker("UA-6494705-1");
      pageTracker._trackPageview();
    </script>
  </body>
</html>
