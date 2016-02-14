<?php /* Smarty version 2.6.27, created on 2016-02-14 08:31:02
         compiled from CRM/Block/Add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Block/Add.tpl', 1, false),array('block', 'ts', 'CRM/Block/Add.tpl', 31, false),array('function', 'crmKey', 'CRM/Block/Add.tpl', 61, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><div id="crm-quick-create" class="crm-container">
<form action="<?php echo $this->_tpl_vars['postURL']; ?>
" method="post">

<div class="form-item">
    <div>
        <label for="qa_first_name"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>First Name:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
    </div>
    <div>
        <input type="text" name="first_name" id="qa_first_name" class="form-text" maxlength="64" />
    </div>
</div>

<div class="form-item">
    <div>
        <label for="qa_last_name"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Last Name:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
    </div>
    <div>
        <input type="text" name="last_name" id="qa_last_name" class="form-text required" maxlength="64" />
    </div>
</div>

<div class="form-item">
    <div>
        <label for="qa_email"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Email:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
    </div>
    <div>
        <input type="email" name="email[1][email]" id="qa_email" class="form-text" maxlength="64" />
    </div>

    <input type="hidden" name="email[1][location_type_id]" value="<?php echo $this->_tpl_vars['primaryLocationType']; ?>
" />
    <input type="hidden" name="email[1][is_primary]" value="1" />
    <input type="hidden" name="ct" value="Individual" />
    <input type="hidden" name="email_greeting_id" value="<?php echo $this->_tpl_vars['email_greeting_id']; ?>
" />
    <input type="hidden" name="postal_greeting_id" value="<?php echo $this->_tpl_vars['postal_greeting_id']; ?>
" />
    <input type="hidden" name="addressee_id" value="<?php echo $this->_tpl_vars['addressee_id']; ?>
" />
    <input type="hidden" name="qfKey" value="<?php echo smarty_function_crmKey(array('name' => 'CRM_Contact_Form_Contact','addSequence' => 1), $this);?>
" />
</div>

<div class="form-item"><input type="submit" name="_qf_Contact_next" value="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Save<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" class="crm-form-submit" /></div>

</form>
</div>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>