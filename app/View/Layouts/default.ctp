<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Emmausschool');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<base href="<?php echo $baseUrl; ?>">
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('style');
		echo $this->Html->css('ui-lightness/jquery-ui-1.8.21.custom');
		echo $this->Html->css('timepicker');
	?>
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	
	<?php
		echo $this->Html->script('jquery-ui-1.8.21.custom.min');
		echo $this->Html->script('timepicker');
		echo $this->Html->script('javascript');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');		
	?>
</head>
<body>
	<div id="container">

		<div id="content">
			<?php echo $this->Html->image('logo_header.png', array('class'=>'logo'))?>
			<?php echo $this->Html->image('emmausinzicht_gras_kort.png', array('class'=>'logo'))?>
			<div id="logged-in">
			<?php if($loggedIn): ?>
				Welkom, <?php echo $currentUser['username'] .' '. $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>
			<?php else: ?>
			<?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?>
			<?php endif; ?>
			</div>

			<?php echo $this->Session->flash('auth'); ?>
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
