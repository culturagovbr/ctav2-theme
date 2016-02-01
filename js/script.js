jQuery(function(){
  // Cycle
  jQuery('#highlight-cycle').cycle({
    fx:        'fade',
    timeout:   '5000',
    pager:     '#highlight-thumbs',
    cleartype: 1,
    
    // callback fn that creates a thumbnail to use as pager anchor
    pagerAnchorBuilder: function(idx, slide){
      return '<li><a href="#"><img src="' + jQuery(slide).find('img').attr('src') + '" alt="" height="75" width="220" /></a></li>';
    }
  });
  
  // Cycle Programas
  jQuery('#programs-cycle').cycle({
    fx:        'fade',
    timeout:   '10000',
    pager:     '#programs-navigator',
    cleartype: 1
  });
  
  // Cycle Roll
  jQuery('#highlight-thumbs').css({ marginTop:'-235px' });
  jQuery('#highlight-thumbs').animate({ marginTop:'0px' });
  
  jQuery('.down').click(function(){
    jQuery('#highlight-thumbs').animate({ marginTop:'-235px' });
    
    return false;
  });
  
  jQuery('.up').click(function(){
    jQuery('#highlight-thumbs').animate({ marginTop:'0px' });
    
    return false;
  });
  
  // Seta nos submenus
  jQuery('#menu li:has(ul)').addClass('parent');
  
  // BackToTop
  jQuery('.backtotop').click(function(){ backtotop(); return false; });
  
  // Serviços
  // Edição
  jQuery('#projeto_sinopse').keyup(function(){ limitchars('projeto_sinopse', 2000, 'projeto_sinopse_limit'); });
  jQuery('#projeto_ficha_tecnica').keyup(function(){ limitchars('projeto_ficha_tecnica', 2000, 'projeto_ficha_tecnica_limit'); });
  jQuery('#projeto_elenco').keyup(function(){ limitchars('projeto_elenco', 2000, 'projeto_elenco_limit'); });
  jQuery('#filme_patrocinadores').keyup(function(){ limitchars('filme_patrocinadores', 2000, 'filme_patrocinadores_limit'); });
  jQuery('#filme_diretor_curriculo').keyup(function(){ limitchars('filme_diretor_curriculo', 2000, 'filme_diretor_curriculo_limit'); });
  jQuery('#filme_produtor_curriculo').keyup(function(){ limitchars('filme_produtor_curriculo', 2000, 'filme_produtor_curriculo_limit'); });
  jQuery('#filme_outros').keyup(function(){ limitchars('filme_outros', 2000, 'filme_outros_limit'); });
  
  //jQuery('#').keyup(function(){ limitchars('', 2000, '_limit'); });
});

// Zebra
//<![CDATA[
$(function ()
{
    var settings = {
        even    : {
            'background'  : '#dfedf6'
        },
        odd     : {
            'background'  : '#f8fcfd'
        }
    };
    $('.box-content ul').stripe(settings);
	
	var settings = {
        even    : {
            'background'  : '#dfedf6'
        },
        odd     : {
            'background'  : '#f8fcfd'
        }
    };//]]>

//abas
  $("div.contaba").hide();
  // mostra somente  a primeira aba
  $("div.contaba:first").show();
  // seta a primeira aba como selecionada (na lista de abas)
  $("#abas div").addClass("selected");
  // quando clicar no link de uma aba
  $("#abas a").click(function(){
  // oculta todas as abas
  $("div.contaba").hide();
  // tira a seleção da aba atual
  $("#abas div").removeClass("selected");
  // adiciona a classe selected na selecionada atualmente
  $(this).addClass("selected");
  // mostra a aba clicada
  $($(this).attr("href")).show();
  // pra nao ir para o link
  return false;

  });
    
});


