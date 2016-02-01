/**
 *  stripe.js
 */
 
if (jQuery.stripeSettings === window.undefined)
    jQuery.stripeSettings = {};

jQuery.stripeSettings.even  = {};
jQuery.stripeSettings.odd   = {};

jQuery.fn.extend({

    stripe : function (o)
    {
        o = o || {};
        // Override default settings.
        var even = jQuery.extend({}, jQuery.stripeSettings.even, o.even || {});
        var odd = jQuery.extend({}, jQuery.stripeSettings.odd, o.odd || {});

        return this.each(function ()
        {
            switch (this.nodeName.toLowerCase())
            {
                case 'ul':
                case 'ol':
                    jQuery(this).children('li:even')
                    .css(even)
                    .end().children('li:odd')
                    .css(odd);
                    break;

                case 'table':
                    $self = jQuery(this);
                    if ($self.children('tbody').size() > 0)
                    {
                        $self = $self.children('tbody');
                    }

                    $self.children('tr:even')
                    .css(even)
                    .end().children('tr:odd')
                    .css(odd);
                    break;

                default:
                    break;

            }//END: switch.

        });//END: each.

    }//END: stripe.

});//END: jQuery.fn.extend.