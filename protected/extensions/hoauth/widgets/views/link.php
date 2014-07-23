<?php
/**
 * @var HOAuthWidget $this
 * @var string $provider name of provider
 */

$additionalClass = $this->onlyIcons ? 'icon' : '';
$invitation = '';//Yii::app()->user->isGuest ? HOAuthAction::t('Sign in with') : HOAuthAction::t('Connect with');
?>
<? $providers = array(
    'Google' => 'gl',
    'Facebook' => 'fb',
    'Vkontakte' => 'vk',
);?>
<li>
    <a href="<?php echo Yii::app()->createUrl($this->route . '/oauth', array('provider' => $provider)); ?>" class="<? echo $providers[$provider]?>"><? if($providers[$provider] =='vk') echo $providers[$provider];?></a>
</li>



