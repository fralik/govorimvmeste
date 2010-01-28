<?php
$lang = array('English', 'Russian', 'German');
$countr = array('Russia', 'Germany', 'Ukraine');
$cities = array('Spb', 'Moscow');
echo $form->create(null, array('url' => array('controller' => 'users', 'action' => 'test' ), 'type' => 'get') );
//echo $form->select('language', $lang, 1, array('multiple' => false, 'class' => 'bigger') );
echo $form->input('language', array('label' => 'Looking for', 'options' => $lang));
echo $form->select('country', $countr, 1, array('multiple' => false, 'class' => 'bigger') );
echo "<br>";
echo $form->end(__('Search for the partner', true));

?>