$(function() {
    // Side Bar Toggle
    $('.hide-sidebar').click(function() {
	  $('#sidebar').hide('fast', function() {
	  	$('#content').removeClass('span9');
	  	$('#content').addClass('span12');
	  	$('.hide-sidebar').hide();
	  	$('.show-sidebar').show();
	  });
	});

	$('.show-sidebar').click(function() {
		$('#content').removeClass('span12');
	   	$('#content').addClass('span9');
	   	$('.show-sidebar').hide();
	   	$('.hide-sidebar').show();
	  	$('#sidebar').show('fast');
	});
	
	$('.title-transliterate').transliterate({
		input: 'alias-transliterate',
		table: [
			['А', 'a'], ['Б', 'b'], ['В', 'v'], ['Г', 'g'], ['Д', 'd'], ['Е', 'e'], ['Ё', 'yo'], ['Ж', 'zh'],
			['З', 'z'], ['И', 'i'], ['Й', 'j'], ['К', 'k'], ['Л', 'l'], ['М', 'm'], ['Н', 'n'], ['О', 'o'],
			['П', 'p'], ['Р', 'r'], ['С', 's'], ['Т', 't'], ['У', 'u'], ['Ф', 'f'], ['Х', 'h'], ['Ц', 'c'],
			['Ч', 'ch'], ['Ш', 'sh'], ['Щ', 'sh'], ['Ъ', ''], ['Ы', 'y'], ['Ь', ''], ['Э', 'e'], ['Ю', 'yu'],
			['Я', 'ya'],
			['а', 'a'], ['б', 'b'], ['в', 'v'], ['г', 'g'], ['д', 'd'], ['е', 'e'], ['ё', 'yo'], ['ж', 'zh'],
			['з', 'z'], ['и', 'i'], ['й', 'j'], ['к', 'k'], ['л', 'l'], ['м', 'm'], ['н', 'n'], ['о', 'o'],
			['п', 'p'], ['р', 'r'], ['с', 's'], ['т', 't'], ['у', 'u'], ['ф', 'f'], ['х', 'h'], ['ц', 'c'],
			['ч', 'ch'], ['ш', 'sh'], ['щ', 'sh'], ['ъ', ''], ['ы', 'y'], ['ь', ''], ['э', 'e'], ['ю', 'yu'],
			['я', 'ya'],
			[' ', '-'],
		]
	});
	
	$('.title_transliterate').transliterate({
		input: 'alias_transliterate',
		table: [
			['А', 'a'], ['Б', 'b'], ['В', 'v'], ['Г', 'g'], ['Д', 'd'], ['Е', 'e'], ['Ё', 'yo'], ['Ж', 'zh'],
			['З', 'z'], ['И', 'i'], ['Й', 'j'], ['К', 'k'], ['Л', 'l'], ['М', 'm'], ['Н', 'n'], ['О', 'o'],
			['П', 'p'], ['Р', 'r'], ['С', 's'], ['Т', 't'], ['У', 'u'], ['Ф', 'f'], ['Х', 'h'], ['Ц', 'c'],
			['Ч', 'ch'], ['Ш', 'sh'], ['Щ', 'sh'], ['Ъ', ''], ['Ы', 'y'], ['Ь', ''], ['Э', 'e'], ['Ю', 'yu'],
			['Я', 'ya'],
			['а', 'a'], ['б', 'b'], ['в', 'v'], ['г', 'g'], ['д', 'd'], ['е', 'e'], ['ё', 'yo'], ['ж', 'zh'],
			['з', 'z'], ['и', 'i'], ['й', 'j'], ['к', 'k'], ['л', 'l'], ['м', 'm'], ['н', 'n'], ['о', 'o'],
			['п', 'p'], ['р', 'r'], ['с', 's'], ['т', 't'], ['у', 'u'], ['ф', 'f'], ['х', 'h'], ['ц', 'c'],
			['ч', 'ch'], ['ш', 'sh'], ['щ', 'sh'], ['ъ', ''], ['ы', 'y'], ['ь', ''], ['э', 'e'], ['ю', 'yu'],
			['я', 'ya'],
			[' ', '_'],
		]
	});
	
	$('#menu a').on('click', function() {
		var ul = $(this).next('ul');
		var block = ul.parent().parent();
		
		$('ul:visible', block).slideToggle();
		
		var li = $(this).parent();
		$('li', block).removeClass('active');
		
		if(!ul.is(':visible')) {
			ul.slideToggle();
			li.addClass('active');
		}
	})
});