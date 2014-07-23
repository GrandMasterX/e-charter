<?php
$this->breadcrumbs=array(
	'Список страниц'=>array('admin'),
	$model->title,
);
?>

<h1>Cтраница: <?php echo $model->title; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'alias',
		array(
			'label'=>'title',
			'name'=>'pageTitle'
		),
		array(
			'label'=>'description',
			'name'=>'meta_description'
		),
		array(
			'label'=>'keywords',
			'name'=>'meta_keywords'
		),
		array(
			'label' => 'Опубликован',
			'type' => 'raw',
			'value' => $model->is_active ? 'Да' : 'Нет'
		),
	),
)); ?>

<div>
	<?php echo $model->content ?>
</div>

<br>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'primary',
	'url' => array('/admin/page/update', 'id' => $model->id),
	'icon' => 'pencil white',
	'label'=>'Редактировать',
)); ?>
	
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'danger',
	'url' => array('/admin/page/admin'),
	'label'=>'Отмена',
)); ?>
