<?php /* Smarty version 2.6.27, created on 2016-02-14 08:31:02
         compiled from CRM/Block/CreateNew.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Block/CreateNew.tpl', 1, false),array('block', 'ts', 'CRM/Block/CreateNew.tpl', 27, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><div class="block-civicrm crm-container">
<div id="crm-create-new-wrapper">
  <a id="crm-create-new-link" class="button" href="#"><span><div class="icon ui-icon-arrow-1-se css_right"></div><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Create New<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></a>
    <div id="crm-create-new-list">
      <div class="crm-create-new-list-inner">
      <ul>
        <?php $_from = $this->_tpl_vars['shortCuts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['short']):
?>
          <li><a href="<?php echo $this->_tpl_vars['short']['url']; ?>
" class="crm-<?php echo $this->_tpl_vars['short']['ref']; ?>
"><?php echo $this->_tpl_vars['short']['title']; ?>
</a>
            <?php if ($this->_tpl_vars['short']['shortCuts']): ?>
              <ul>
                <?php $_from = $this->_tpl_vars['short']['shortCuts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['shortCut']):
?>
                  <li><a href="<?php echo $this->_tpl_vars['shortCut']['url']; ?>
" class="crm-<?php echo $this->_tpl_vars['shortCut']['ref']; ?>
"><?php echo $this->_tpl_vars['shortCut']['title']; ?>
</a></li>
                <?php endforeach; endif; unset($_from); ?>
              </ul>
            <?php endif; ?>
          </li>
        <?php endforeach; endif; unset($_from); ?>
      </ul>
      </div>
    </div>
  </div>
</div>
<div class='clear'></div>
<?php echo '
<script>
(function ($) {
  $(\'#crm-create-new-list > div > ul\').menu();
  $(\'#crm-create-new-link\').click(function (event) {
    $(\'#crm-create-new-list\').toggle();
    $(\'body:not(#crm-create-new-list)\').click(function () {
      $(\'#crm-create-new-list\').hide();
    });
    event.stopPropagation();
    return false;
  });
})(CRM.$);
</script>

'; ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>