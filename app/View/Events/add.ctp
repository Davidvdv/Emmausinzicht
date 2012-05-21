<h2>Voeg een vooruit- of terugblik toe</h2> 
<div class="form">
<?php
	$current_year = date('Y');
	$min_year = $current_year;
	$max_year = $current_year+8;
	echo $this->Form->create('Event');
?>
	<fieldset>
<?php
	echo $this->Form->input('title', array('label' => 'Titel'));
	echo $this->Form->input('date',array('minYear'=> $current_year-8,'maxYear'=>$max_year, 'label' => 'Het is gebeurd of gaat gebeuren op', 'dateFormat' => 'DMY'));
	echo $this->Form->input('description', array('rows' => '7', 'label' => 'Tekst'));
	echo $this->Form->input('publish_on',array('minYear'=>$min_year,'maxYear'=>$max_year, 'label' => 'Uitbrengen op', 'dateFormat' => 'DMY'));
?>
	</fieldset>
<?php
	echo $this->Form->end('Verstuur');
?>
</div>
