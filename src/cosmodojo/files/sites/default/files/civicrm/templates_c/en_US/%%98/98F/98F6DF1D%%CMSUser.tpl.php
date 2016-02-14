<?php /* Smarty version 2.6.27, created on 2016-02-14 07:41:39
         compiled from CRM/common/CMSUser.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/common/CMSUser.tpl', 1, false),array('block', 'ts', 'CRM/common/CMSUser.tpl', 30, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php if ($this->_tpl_vars['showCMS']): ?>   <fieldset class="crm-group crm_user-group">
      <div class="messages help cms_user_help-section">
   <?php if (! $this->_tpl_vars['isCMS']): ?>
      <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>If you would like to create an account on this site, check the box below and enter a Username<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php if ($this->_tpl_vars['form']['cms_pass']): ?> <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>and a password<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>.<?php endif; ?>
   <?php else: ?>
      <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Please enter a Username to create an account.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
   <?php endif; ?>
   <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['loginURL'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>If you already have an account <a href='%1'>please login</a> before completing this form.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
      </div>
      <div><?php echo $this->_tpl_vars['form']['cms_create_account']['html']; ?>
 <?php echo $this->_tpl_vars['form']['cms_create_account']['label']; ?>
</div>
      <div id="details" class="crm_user_signup-section">

         <div class="form-layout-compressed">
           <div class="crm-section cms_name-section">
             <div class="label">
               <label for="cms_name"><?php echo $this->_tpl_vars['form']['cms_name']['label']; ?>
</label>
             </div>
             <div class="content">
               <?php echo $this->_tpl_vars['form']['cms_name']['html']; ?>
 <a id="checkavailability" href="#" onClick="return false;"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><strong>Check Availability</strong><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
               <span id="msgbox" style="display:none"></span><br />
               <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Punctuation is not allowed in a Username with the exception of periods, hyphens and underscores.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
             </div>
           </div>

           <?php if ($this->_tpl_vars['form']['cms_pass']): ?>
           <div class="crm-section cms_pass-section">
             <div class="label">
               <label for="cms_pass"><?php echo $this->_tpl_vars['form']['cms_pass']['label']; ?>
</label>
             </div>
             <div class="content">
               <?php echo $this->_tpl_vars['form']['cms_pass']['html']; ?>

             </div>
             <div class="clear"></div>
             <div class="label">
               <label for="crm_confirm_pass-section"><?php echo $this->_tpl_vars['form']['cms_confirm_pass']['label']; ?>
</label>
             </div>
             <div class="content">
               <?php echo $this->_tpl_vars['form']['cms_confirm_pass']['html']; ?>
<br/>
               <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Provide a password for the new account in both fields.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
             </div>
           </div>
           <?php endif; ?>
         </div>

     </div>
   </fieldset>

   <?php echo '
   <script type="text/javascript">
   '; ?>

   <?php if (! $this->_tpl_vars['isCMS']): ?>
      <?php echo '
      if ( document.getElementsByName("cms_create_account")[0].checked ) {
   cj(\'#details\').show();
      } else {
   cj(\'#details\').hide();
      }
      '; ?>

   <?php endif; ?>
   <?php echo '
   function showMessage( frm )
   {
      var cId = '; ?>
'<?php echo $this->_tpl_vars['cId']; ?>
'<?php echo ';
      if ( cId ) {
   alert(\''; ?>
<?php $this->_tag_stack[] = array('ts', array('escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>You are logged-in user<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '\');
   frm.checked = false;
      } else {
   var siteName = '; ?>
'<?php echo $this->_tpl_vars['config']->userFrameworkBaseURL; ?>
'<?php echo ';
   alert(\''; ?>
<?php $this->_tag_stack[] = array('ts', array('escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Please login if you have an account on this site with the link<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo ' \' + siteName  );
      }
   }
   '; ?>

   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/checkUsernameAvailable.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
   <?php echo '
   </script>
   '; ?>

   <?php if (! $this->_tpl_vars['isCMS']): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/showHideByFieldValue.tpl", 'smarty_include_vars' => array('trigger_field_id' => 'cms_create_account','trigger_value' => "",'target_element_id' => 'details','target_element_type' => 'block','field_type' => 'radio','invert' => 0)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
   <?php endif; ?>
<?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>