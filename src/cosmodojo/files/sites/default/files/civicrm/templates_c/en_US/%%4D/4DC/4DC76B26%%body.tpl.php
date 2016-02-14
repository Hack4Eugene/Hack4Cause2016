<?php /* Smarty version 2.6.27, created on 2016-02-14 07:41:39
         compiled from CRM/Form/body.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Form/body.tpl', 1, false),array('block', 'ts', 'CRM/Form/body.tpl', 37, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php if ($this->_tpl_vars['form']['javascript']): ?>
  <?php echo $this->_tpl_vars['form']['javascript']; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['form']['hidden']): ?>
  <div><?php echo $this->_tpl_vars['form']['hidden']; ?>
</div>
<?php endif; ?>

<?php if (( $this->_tpl_vars['snippet'] !== 'json' ) && ! $this->_tpl_vars['suppressForm'] && count ( $this->_tpl_vars['form']['errors'] ) > 0): ?>
   <div class="messages crm-error">
       <div class="icon red-icon ui-icon-alert"></div>
     <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Please correct the following errors in the form fields below:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
     <ul id="errorList">
     <?php $_from = $this->_tpl_vars['form']['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['errorName'] => $this->_tpl_vars['error']):
?>
        <?php if (is_array ( $this->_tpl_vars['error'] )): ?>
           <li><?php echo $this->_tpl_vars['error']['label']; ?>
 <?php echo $this->_tpl_vars['error']['message']; ?>
</li>
        <?php else: ?>
           <li><?php echo $this->_tpl_vars['error']; ?>
</li>
        <?php endif; ?>
     <?php endforeach; endif; unset($_from); ?>
     </ul>
   </div>
<?php endif; ?>

<?php if ($this->_tpl_vars['beginHookFormElements']): ?>
  <table class="form-layout-compressed">
  <?php $_from = $this->_tpl_vars['beginHookFormElements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dontCare'] => $this->_tpl_vars['hookFormElement']):
?>
      <tr><td class="label nowrap"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['hookFormElement']]['label']; ?>
</td><td><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['hookFormElement']]['html']; ?>
</td></tr>
  <?php endforeach; endif; unset($_from); ?>
  </table>
<?php endif; ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>