/* helper function for language and level selection.
 * It is used from Users add, edit
 */
function init()
{
	disable_all_levels('offer_select');
}

function disable_all_levels(div_id)
{
	selects = document.getElementsByTagName('select');
	for (var i=0; i < selects.length; i++)
	{
		if (selects[i].id.indexOf('level') != -1)
		{
			// check if corrrresponding languaged is selected
			parts = selects[i].id.split('_');
			lang_id = parts[0] + '_' + parts[2];
			lang = document.getElementById(lang_id);
			selects[i].style.visibility = 'hidden';
			toggle(lang, selects[i]);
		}
	}
}

function toggle(lang, level)
{
	if (!lang || !level)
		return;
		
	if (lang.checked == false)
	{
		level.style.visibility = 'hidden';
	}
	else
	{
		level.style.visibility = 'visible';
	}
}
 