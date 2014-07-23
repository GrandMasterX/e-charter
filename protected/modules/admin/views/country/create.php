<?php
$this->breadcrumbs=array(
	'Список страниц'=>array('admin'),
	'Создать',
);

?>

<h1>Создать страницу</h1>

<div class="create-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>