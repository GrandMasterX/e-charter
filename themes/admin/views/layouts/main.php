<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.transliterate.js') ?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/scripts.js') ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
	'type'=>'inverse', // null or 'inverse'
    'brand'=>'Панель администратора',
	'fluid' => true,
    'brandUrl'=>'/admin',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Пользователи', 'icon'=>'user white', 'items'=>array( 
                    array('label'=>'Менеджеры', 'url'=>'/admin/manager/admin', 'items'=>array(
						array('label'=>'Добавить менеджера', 'icon' => 'plus-sign', 'url'=>'/admin/manager/create'),
					)),
                    array('label'=>'Клиенты', 'url'=>'/admin/user/admin', 'items'=>array(
						array('label'=>'Добавить клиента', 'icon' => 'plus-sign', 'url'=>'/admin/user/create'),
					)),
                )),
                array('label'=>'Контент', 'icon'=>'align-justify white', 'items'=>array( 
                    array('label'=>'Новости', 'url'=>'/admin/news/admin', 'items'=>array(
						array('label'=>'Добавить новость', 'icon' => 'plus-sign', 'url'=>'/admin/news/create'),
					)),
                )),
                array('label'=>'Настройки', 'icon'=>'cog white', 'items'=>array( 
                    array('label'=>'Почта', 'url'=>'#', 'items'=>array(
						array('label'=>'Добавить шаблон', 'icon' => 'plus-sign', 'url'=>'#'),
					)),
                )),
            ),
        ),
    ),
)); ?>

<div class="container-fluid">
    <div class="row-fluid ">
        <div class="span3" id="left">
		<?php $controller = Yii::app()->controller->id; ?>
		<?php $this->widget('zii.widgets.CMenu', array(
			'encodeLabel'=>false,
            'items'=>array(
                array(
					'label'=>'
						<i class="icon-align-justify icon-white"></i>
						<span class="link-title">Контент</span> 
						<span class="fa arrow"></span> 
					',
					'url' => 'javascript:;',
					'active' => in_array($controller, array('news', 'country', 'city')),
					'items'=>array( 
						array('label'=>'Новости', 'url'=>'/admin/news/admin'),
                        array('label'=>'Города', 'url'=>'/admin/country/admin'),
                        array('label'=>'Страны', 'url'=>'/admin/city/admin'),
					)
				),
                array(
					'label'=>'
						<i class="icon-cog icon-white"></i>
						<span class="link-title">Настройки</span> 
						<span class="fa arrow"></span> 
					',
					'url' => 'javascript:;',
					'active' => in_array($controller, array('mail', 'config')),		
					'items'=>array( 
						array('label'=>'<i class="icon-envelope icon-white"></i> Почта (шаблоны)', 'url'=>'/admin/mail/admin'),
					)
				),
            ),
			'htmlOptions' =>array(
				'id' => 'menu'
			)
		));  ?>
		</div>

	<div class="span9" id="content">
	
	<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true,
        'fade'=>true,
    )); ?>	
	
	<?php if(isset($this->breadcrumbs)):?>
        <div class="row-fluid">
          	<div class="navbar">
                <div class="navbar-inner" style="height: 40px;">
					<div style="float: left; margin: 8px 10px 0 0;"><i class="icon-chevron-left hide-sidebar"><a href="#" title="Скрыть меню" rel="tooltip">&nbsp;</a></i><i class="icon-chevron-right show-sidebar" style="display:none;"><a href="#" title="Показать меню" rel="tooltip">&nbsp;</a></i></div>
					<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
						'homeLink' => CHtml::link('Главная', '/admin'), 
						'links'=>$this->breadcrumbs,
					)); ?>
                </div>
            </div>
        </div>
	<?php endif ?>
	

	<?php echo $content; ?>

	<div class="clear"></div>
	
	</div>
</div>	
</div>		

	<div id="footer">
	</div><!-- footer -->



</body>
</html>
