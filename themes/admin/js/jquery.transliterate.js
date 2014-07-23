(function($){

  $.fn.transliterate = function(options){

    return this.each(function(){

      var opts = $.extend({}, $.fn.transliterate.defaults, options);
      var $target = $(this);

      var $source = $('.'+opts.input);

      $target
        .on('keyup blur change', function(e){
			$source.val($.fn.transliterate.convert($target.val(), opts.table));
        });
    });
  };

  $.fn.transliterate.defaults = { 
  };

  $.fn.transliterate.convert = function(plaintext, table){ 
    $.each(table, function(i, pairs){
      var before = pairs[0];
      var after = pairs[1];
      var pattern = new RegExp(before, 'g');
      plaintext = plaintext.replace(pattern, after, 'g');
    });
    return plaintext;
  };

})(this.jQuery);
