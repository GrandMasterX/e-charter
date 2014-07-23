<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'page-form',
    'action' => ($model->isNewRecord) ? $this->createUrl('page/create') : $this->createUrl('page/update', array('id' => $model->id)),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<?php $this->widget('bootstrap.widgets.TbTabs', array(
		'type'=>'tabs',
		'events'=>array(
			'shown'=>"js:function(event) {
				var type = $(event.target).attr('data-type');
				if(type == 'attribute') {
					var id = $('#catalog-id').val();
					var old_id = $('#catalog-old-id').val();
					if(old_id != id) {
						$.get('/admin/filter/getForm', {id: id}, function(html) {
							$('#attribute-filter').html(html);	
							$('.date').datepicker({
								language: 'ru',
								format: 'yyyy-mm-dd'
							});
						})
					}
				}
			}",
		),
		'tabs'=>array(
			array(
				'label' => 'Параметры',
				'content' => $this->renderPartial('_basicTab', array('form' => $form, 'model' => $model), true),
				'active'=>true
			), 
			array(
				'label' => 'SEO',
				'content' => $this->renderPartial('_seoTab', array('form' => $form, 'model' => $model), true),
				'active'=>false
			) 
		)	
	)) ?>	

	<hr class="clear" />
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
	)); ?>
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'danger',
		'url' => array('/admin/page/admin'),
		'label'=>'Отмена',
		'htmlOptions' =>array(
			'class' => 'cancel-button'
		)
	)); ?>

<?php $this->endWidget(); ?>
