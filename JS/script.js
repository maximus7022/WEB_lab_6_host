$('.decor').submit(function validate_form() {

    var msg = $('.decor').serialize();

    let st_exp = /^[А-ЯІ][а-яі]*?\s[А-ЯІ][а-яі]*?\s[А-ЯІ][а-яі]*?$/;
	let gr_exp = /^[А-ЯІі]{2,2}\-[0-9][0-9]$/;
	let sp_exp = /^\d{3,3}$/;
	let em_exp = /^[a-z0-9._-]+\@[a-z0-9]+\.[a-z]{2,4}$/;
	let student = document.getElementById('st_input').value;
	let group = document.getElementById('gr_input').value;
	let birth = document.getElementById('date_input').value;
	let specialty = document.getElementById('sp_input').value;
	let email = document.getElementById('em_input').value;

	if (student == '')
	{
		$('#message').html('Виникла помилка:</br>Поле ПІБ пусте');
		return false;
	}

    if (st_exp.test(student) == false && student != '')
	{
		$('#message').html('Виникла помилка:</br>ПІБ має бути введене українськими літерами і складатись з трьох слів, що починаються з великої літери');
		return false;
	}

	if (group == '')
	{
		$('#message').html('Виникла помилка:</br>Поле Група пусте');
		return false;
	}

	if (gr_exp.test(group) == false && group != '')
	{
		$('#message').html('Виникла помилка:</br>Поле групи повинне містити дві українські літери верхнього регістру, дефіс та номер');
		return false;
	}

	if (birth == '')
	{
		$('#message').html('Виникла помилка:</br>Поле Дата Народження пусте');
		return false;
	}

	if(birth <= 1960 || birth >= 2003)
	{
		$('#message').html('Виникла помилка:</br>Недопустимий рік народження');
		return false;
	}

	if (specialty == '')
	{
		$('#message').html('Виникла помилка:</br>Поле Спеціальність пусте');
		return false;
	}

	if (sp_exp.test(specialty) == false && specialty != '')
	{
		$('#message').html('Виникла помилка:</br>Номер спеціальності має бути трьохзначним числом');
		return false;
	}

	if(email == '')
	{
		$('#message').html('Виникла помилка:</br>Поле Email пусте');
		return false;
	}

	if (em_exp.test(email) == false && email != '')
	{
		$('#message').html('Виникла помилка:</br>Це не схоже на Email');
		return false;
	}

	else {
	    $.ajax({
	         type: 'POST',
	         url: './PHP/val_form.php',
	         data: msg,
	        success: function(data) { 
	            $('#message').html(data);
	        }
	    });
	    return false;
	}

});