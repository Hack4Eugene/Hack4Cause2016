<?php /* Smarty version 2.6.27, created on 2016-02-14 08:31:02
         compiled from CRM/Block/Dashboard.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Block/Dashboard.tpl', 1, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><div class="block-civicrm crm-container">
<?php $_from = $this->_tpl_vars['dashboardLinks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dash']):
?>
<a accesskey="<?php echo $this->_tpl_vars['dash']['key']; ?>
" href="<?php echo $this->_tpl_vars['dash']['url']; ?>
"><?php echo $this->_tpl_vars['dash']['title']; ?>
</a>
<?php endforeach; endif; unset($_from); ?>
</div>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>