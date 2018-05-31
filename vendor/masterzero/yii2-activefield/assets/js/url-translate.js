

function translit( text ){
	// Символ, на который будут заменяться все спецсимволы
	space = '-';
	none ='';
	// Берем значение из нужного поля и переводим в нижний регистр

	     
	// Массив для транслитерации
	transl = {
	'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh', 
	'з': 'z', 'и': 'i', 'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
	'о': 'o', 'п': 'p', 'р': 'r','с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h',
	'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sh','ъ': space, 'ы': 'y', 'ь': none, 'э': 'e', 'ю': 'yu', 'я': 'ya',

	'А': 'a', 'Б': 'b', 'В': 'v', 'Г': 'g', 'Д': 'd', 'Е': 'e', 'Ё': 'e', 'Ж': 'zh', 
	'З': 'z', 'И': 'i', 'Й': 'j', 'К': 'k', 'Л': 'l', 'М': 'm', 'Н': 'n',
	'О': 'o', 'П': 'p', 'Р': 'r','С': 's', 'Т': 't', 'У': 'u', 'Ф': 'f', 'Х': 'h',
	'Ц': 'c', 'Ч': 'ch', 'Ш': 'sh', 'Щ': 'sh','Ъ': space, 'Ы': 'y', 'Ь': none, 'Э': 'e', 'Ю': 'yu', 'Я': 'ya',


	' ': space, '_': space, '`': space, '~': space, '!': space, '@': space,
	'#': space, '$': space, '%': space, '^': space, '&': space, '*': space, 
	'(': space, ')': space,'-': space, '\=': space, '+': space, '[': space, 
	']': space, '\\': space, '|': space, '/': space,'.': space, ',': space,
	'{': space, '}': space, '\'': space, '"': space, ';': space, ':': space,
	'?': space, '<': space, '>': space, '№':space
	}
	result = '';
	curent_sim = '';
	for(i = 0; i < text.length; i++) {
	    // Если символ найден в массиве то меняем его
	    if(transl[text[i]] != undefined) {
	        if(curent_sim != transl[text[i]] || curent_sim != space)
	        {
	             result += transl[text[i]];
	             curent_sim = transl[text[i]];
	        }
	    }
	    // Если нет, то оставляем так как есть
	    else {
	        result += text[i];
	        curent_sim = text[i];
	    }
	}

	return result;
}




$(document).ready( function() {
	//console.log("hello world");

	field = $('.url-copy-field input');

	field.keyup(function() {


		typed_name = $(this).val();


		fixed = translit(typed_name);

		$(this).parent().parent().find('.url-generate-field input').val(fixed);
	});



});