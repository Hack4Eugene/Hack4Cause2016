<?php /* Smarty version 2.6.27, created on 2016-02-14 08:40:09
         compiled from CRM/Core/I18n/Dialog.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Core/I18n/Dialog.tpl', 1, false),array('block', 'ts', 'CRM/Core/I18n/Dialog.tpl', 27, false),array('modifier', 'count', 'CRM/Core/I18n/Dialog.tpl', 26, false),array('function', 'crmURL', 'CRM/Core/I18n/Dialog.tpl', 27, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php if (count($this->_tpl_vars['config']->languageLimit) >= 2 && $this->_tpl_vars['translatePermission']): ?>
  <a href="<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/i18n','q' => "reset=1&table=".($this->_tpl_vars['table'])."&field=".($this->_tpl_vars['field'])."&id=".($this->_tpl_vars['id'])), $this);?>
" data-field="<?php echo $this->_tpl_vars['field']; ?>
" class="crm-hover-button crm-multilingual-edit-button" title="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Languages<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>">
    <img src="<?php echo $this->_tpl_vars['config']->resourceBase; ?>
i/langs.png" style="position:relative; top: 2px;"/>
  </a>
<?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>