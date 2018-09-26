define([
    "jquery",
    'mage/validation'
], function($) {
    "use strict";
    $.widget('currencyconverter.ajax', {
        options: {
            url: $('#currency-form').attr('action'),
            method: 'post',
            triggerEvent: 'click'
        },

        _create: function() {
            this._bind();
        },

        _bind: function() {
            var self = this;
            self.element.on(self.options.triggerEvent, function() {
                self._ajaxSubmit();
            });
        },

        _ajaxSubmit: function() {
            var currencyValue = $('#currency_value').val();
            var self = this;
            $.ajax({
                url: self.options.url + "?currency_value=" + currencyValue,
                type: self.options.method,
                dataType: 'json',
                beforeSend: function() {
                    if (!$('#currency-form').valid()) {
                        return false;
                    }
                    $('body').trigger('processStart');
                },
                success: function(res) {
                    $('.result').html(res.html);
                    $('body').trigger('processStop');
                }
            });
        },

    });

    return $.currencyconverter.ajax;
});
