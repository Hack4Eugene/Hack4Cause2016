<?php /* Smarty version 2.6.27, created on 2016-02-14 08:30:30
         compiled from CRM/common/debug.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/common/debug.tpl', 1, false),array('function', 'debug', 'CRM/common/debug.tpl', 27, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php if ($_GET['smartyDebug']): ?>
<?php echo smarty_function_debug(array(), $this);?>

<?php endif; ?>

<?php if ($_GET['sessionReset']): ?>
<?php echo $this->_tpl_vars['session']->reset($_GET['sessionReset']); ?>

<?php endif; ?>

<?php if ($_GET['sessionDebug']): ?>
<?php echo $this->_tpl_vars['session']->debug($_GET['sessionDebug']); ?>

<?php endif; ?>

<?php if ($_GET['directoryCleanup']): ?>
<?php echo $this->_tpl_vars['config']->cleanup($_GET['directoryCleanup']); ?>

<?php endif; ?>

<?php if ($_GET['cacheCleanup']): ?>
<?php echo $this->_tpl_vars['config']->clearDBCache(); ?>

<?php endif; ?>

<?php if ($_GET['configReset']): ?>
<?php echo $this->_tpl_vars['config']->reset(); ?>

<?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>