<?php /* Smarty version 2.6.27, created on 2016-02-14 08:31:02
         compiled from CRM/Block/RecentlyViewed.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Block/RecentlyViewed.tpl', 1, false),array('block', 'ts', 'CRM/Block/RecentlyViewed.tpl', 38, false),array('modifier', 'mb_truncate', 'CRM/Block/RecentlyViewed.tpl', 36, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><div id="crm-recently-viewed" class="left crm-container">
    <ul>
    <?php $_from = $this->_tpl_vars['recentlyViewed']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
         <li class="crm-recently-viewed" ><a  href="<?php echo $this->_tpl_vars['item']['url']; ?>
" title="<?php echo $this->_tpl_vars['item']['title']; ?>
">
         <?php if ($this->_tpl_vars['item']['image_url']): ?>
            <span class="icon crm-icon <?php if ($this->_tpl_vars['item']['subtype']): ?><?php echo $this->_tpl_vars['item']['subtype']; ?>
<?php else: ?><?php echo $this->_tpl_vars['item']['type']; ?>
<?php endif; ?>-icon" style="background: url('<?php echo $this->_tpl_vars['item']['image_url']; ?>
')"></span>
         <?php else: ?>
            <span class="icon crm-icon <?php echo $this->_tpl_vars['item']['type']; ?>
<?php if ($this->_tpl_vars['item']['subtype']): ?>-subtype<?php endif; ?>-icon"></span>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['item']['isDeleted']): ?><del><?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 25, "..", true) : smarty_modifier_mb_truncate($_tmp, 25, "..", true)); ?>
<?php if ($this->_tpl_vars['item']['isDeleted']): ?></del><?php endif; ?></a>
         <div class="crm-recentview-wrapper">
           <a href='<?php echo $this->_tpl_vars['item']['url']; ?>
' class="crm-actions-view"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>View<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
         <?php if ($this->_tpl_vars['item']['edit_url']): ?><a href='<?php echo $this->_tpl_vars['item']['edit_url']; ?>
' class="crm-actions-edit"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Edit<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a><?php endif; ?>
       <?php if ($this->_tpl_vars['item']['delete_url']): ?><a href='<?php echo $this->_tpl_vars['item']['delete_url']; ?>
' class="crm-actions-delete"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Delete<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a><?php endif; ?>
         </div>
       </li>
    <?php endforeach; endif; unset($_from); ?>
   </ul>
</div>
<?php echo '
<script type="text/javascript">
    CRM.$(function($) {
      if ($(\'#crm-recently-viewed\').offset().left > 150) {
        $(\'#crm-recently-viewed\').removeClass(\'left\').addClass(\'right\');
      }
    });
</script>
'; ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>