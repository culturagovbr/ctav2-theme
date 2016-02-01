// function Limitar Caracteres
function limitchars(textid, limit, infodiv)
{
  var text = jQuery('#'+textid).val();
  var textlength = text.length;
  if(textlength > limit)
  {
    jQuery('#'+infodiv).html('(<strong>Voc&ecirc; n&atilde;o pode escrever mais de '+limit+' caracteres!</strong>)');
    jQuery('#'+textid).val(text.substr(0,limit));
    return false;
  }
  else
  {
    jQuery('#' + infodiv).html('('+ (limit - textlength) +' caracteres restantes)');
    return true;
  }
}
