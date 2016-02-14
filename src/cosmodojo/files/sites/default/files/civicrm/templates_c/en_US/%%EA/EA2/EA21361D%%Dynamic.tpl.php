<?php /* Smarty version 2.6.27, created on 2016-02-14 07:45:28
         compiled from CRM/Profile/Page/Dynamic.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Profile/Page/Dynamic.tpl', 1, false),array('block', 'crmRegion', 'CRM/Profile/Page/Dynamic.tpl', 33, false),array('modifier', 'truncate', 'CRM/Profile/Page/Dynamic.tpl', 31, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php if (! empty ( $this->_tpl_vars['row'] )): ?>
    <?php if ($this->_tpl_vars['overlayProfile']): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Profile/Page/Overlay.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php else: ?>
        <div id="crm-container" class="crm-container" lang="<?php echo ((is_array($_tmp=$this->_tpl_vars['config']->lcMessages)) ? $this->_run_mod_handler('truncate', true, $_tmp, 2, "", true) : smarty_modifier_truncate($_tmp, 2, "", true)); ?>
" xml:lang="<?php echo ((is_array($_tmp=$this->_tpl_vars['config']->lcMessages)) ? $this->_run_mod_handler('truncate', true, $_tmp, 2, "", true) : smarty_modifier_truncate($_tmp, 2, "", true)); ?>
">
            <div class="crm-profile-name-<?php echo $this->_tpl_vars['ufGroupName']; ?>
">
            <?php $this->_tag_stack[] = array('crmRegion', array('name' => "profile-view-".($this->_tpl_vars['ufGroupName']))); $_block_repeat=true;smarty_block_crmRegion($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
            <?php $_from = $this->_tpl_vars['profileFields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rowName'] => $this->_tpl_vars['field']):
?>
              <div id="row-<?php echo $this->_tpl_vars['rowName']; ?>
" class="crm-section <?php echo $this->_tpl_vars['rowName']; ?>
-section">
                <div class="label">
                    <?php echo $this->_tpl_vars['field']['label']; ?>

                </div>
                 <div class="content">
                    <?php echo $this->_tpl_vars['field']['value']; ?>

                 </div>
                 <div class="clear"></div>
              </div>
            <?php endforeach; endif; unset($_from); ?>
            <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmRegion($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>