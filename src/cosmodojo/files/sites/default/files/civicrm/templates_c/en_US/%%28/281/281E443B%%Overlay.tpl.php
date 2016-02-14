<?php /* Smarty version 2.6.27, created on 2016-02-14 08:31:48
         compiled from CRM/Profile/Page/Overlay.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Profile/Page/Overlay.tpl', 1, false),array('modifier', 'count', 'CRM/Profile/Page/Overlay.tpl', 31, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php if ($this->_tpl_vars['overlayProfile']): ?>
<table class="crm-table-group-summary">
<tr><td><?php echo $this->_tpl_vars['displayName']; ?>
</td></tr>
<tr><td>
<?php $this->assign('count', '0'); ?>
<?php $this->assign('totalRows', count($this->_tpl_vars['row'])); ?>
<div class="crm-summary-col-0">
<?php $_from = $this->_tpl_vars['profileFields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rowName'] => $this->_tpl_vars['field']):
?>
  <?php if ($this->_tpl_vars['count'] > $this->_tpl_vars['totalRows']/2): ?>
    </div>
    </td><td>
    <div class="crm-summary-col-1">
    <?php $this->assign('count', '1'); ?>
  <?php endif; ?>
  <div class="crm-section <?php echo $this->_tpl_vars['rowName']; ?>
-section">
    <div class="label">
        <?php echo $this->_tpl_vars['field']['label']; ?>

    </div>
     <div class="content">
        <?php echo $this->_tpl_vars['field']['value']; ?>

     </div>
     <div class="clear"></div>
  </div>
  <?php $this->assign('count', ($this->_tpl_vars['count']+1)); ?>
<?php endforeach; endif; unset($_from); ?>
</div>
</td></tr>
</table>
<?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>