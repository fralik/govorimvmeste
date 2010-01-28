<?php
class MulticheckboxHelper extends Helper { 
     
	//var $helpers = array('html', 'form');
	
	/**
	 * Creates a table with multiple checkboxes
	 * level_selected - array with key that points to the id of the language nad value is a skill level
	 * add_level - boolean. If true then we add skill level selection
	 */
	function create($options = array(), $selected_arr = array(), $model_name, $model_var, $label, $level_selected = array(), $add_level = true)
	{
		// clear output
		$this->__out = array();
		
		// make selected array a workable array
		$selected = array();
		
		if (!empty($selected_arr) && count($selected_arr) > 0)
		{
			foreach ($selected_arr as $arr)
			{
				if (is_array($arr) && array_key_exists('id', $arr))
				{
					$selected[] = $arr['id'];
				}
				else
				{
					$selected[] = $arr;
				}
			}
		}
		
		$lang = __('Language', true);
		$level = __('My level', true);
		$this->__out[] = "<div id=\"{$model_var}_select\"><label for=\"{$model_name}{$model_var}\" class=\"required\">{$label}</label><input type=\"hidden\" name=\"data[{$model_name}][{$model_var}]\" value=\"\" />";
		$this->__out[] = "<table class=\"multi\">";
		if ($add_level)
		{
			$this->__out[] = "\t<thead><tr class=\"multi\">\n\t\t<td class=\"multi_altrow\" style=\"text-align: left;\">{$lang}</td>";
			$this->__out[] = "\t\t<td class=\"multi_altrow\">{$level}</td>";
			$this->__out[] = "\n\t\t<td class=\"multi\" style=\"text-align: left;\">{$lang}</td>";
			$this->__out[] = "\t\t<td class=\"multi_altrow\">{$level}</td>\n\t</tr></thead>";
		}
			
		$i = 0;
		$closed = 0;

		$level_options = array(__('Native', true), __('Advanced', true), __('Intermediate', true), __('Beginner', true));
		$level_values = array('native', 'advanced', 'intermediate, 'beginner');
		$select_name = "data[{$model_name}][level][{$model_var}][]";
		
		foreach ($options as $id => $language)
		{
		
			$class = " class=\"multi\"";
			if ($i % 2 == 0) 
			{
				$class = ' class="multi_altrow"';
			}
			$closed = 0;
			if ($i == 0)
				$this->__out[] = "<tr class=\"multi\">";
			//$this->__out[] = "<fieldset border=\"1\">";
			$language = __($language, true);

			$checked = "";
			if (in_array($id, $selected))
			{
				$checked = " checked=\"checked\" ";
			}

			$sel_id = $model_var . "_level_" . $id;
			$lang_id = $model_var . "_" . $id;
			// javascript function toggle must be defined
			
			$onchange = "";
			if ($add_level)
				$onchange = "onchange=\"toggle({$lang_id},{$sel_id});\"";
			$this->__out[] = "	<td {$class}><input type=\"checkbox\" class=\"multi\" {$onchange} "
				. "value=\"{$id}\" id=\"{$lang_id}\" name=\"data[{$model_name}][{$model_var}][]\" {$checked} />&nbsp;"
				. "<label class=\"multi\" for=\"{$lang_id}\">{$language}</label></td>";
				
			

			if ($add_level)
			{
				$this->__out[] =  "\t<td {$class} style=\"padding-left: 5px;\">\n\t\t<select id=\"{$sel_id}\" name=\"{$select_name}\">";

				$selected_value = null;
				if (array_key_exists($id, $level_selected))
				{
					$selected_value = $level_selected[$id];
				}
				for ($j = 0; $j < count($level_options); $j++)
				{
					$checked = "";
					if ($selected_value != null && strcmp($selected_value, $level_values[$j]) == 0)
						$checked = " selected=\"selected\" ";
					$this->__out[] = "\t\t\t<option value=\"{$level_values[$j]}\" {$checked}>{$level_options[$j]}</option>";
				}
				$this->__out[] = "\t\t</select>";
			}
			else
			{
				$this->__out[] = "\t<td {$class} style=\"padding-left: 5px;\">";
			}
			$this->__out[] = "\t</td>";
			
			$i++;
			if ($i % 2 == 0)
			{
				$i = 0;
				$this->__out[] = "</tr>\n";
				$closed = 1;
			}
		}
		while ($i % 2 != 0)
		{
			$this->__out[] = "	<td {$class}></td>\n";
			$i++;
		}
		if ($closed == 0)
			$this->__out[] = "</tr>";
			
		$this->__out[] = "</table></div>\n";
		
		return join("\n", $this->__out);
	}
} 
?>