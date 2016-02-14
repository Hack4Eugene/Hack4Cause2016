<?php /* Smarty version 2.6.27, created on 2016-02-14 08:31:02
         compiled from CRM/common/pagerAToZ.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/common/pagerAToZ.tpl', 1, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><div id="alpha-filter">
    <ul>
    <?php $_from = $this->_tpl_vars['aToZ']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['letter']):
?>
        <li <?php if ($this->_tpl_vars['letter']['class']): ?>class="<?php echo $this->_tpl_vars['letter']['class']; ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['letter']['item']; ?>
</li>
    <?php endforeach; endif; unset($_from); ?>
    </ul>
</div>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>