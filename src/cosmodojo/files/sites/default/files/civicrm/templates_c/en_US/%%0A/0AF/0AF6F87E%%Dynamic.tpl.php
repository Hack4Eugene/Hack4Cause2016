<?php /* Smarty version 2.6.27, created on 2016-02-14 07:41:39
         compiled from CRM/Profile/Form/Dynamic.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Profile/Form/Dynamic.tpl', 1, false),array('block', 'crmRegion', 'CRM/Profile/Form/Dynamic.tpl', 27, false),array('block', 'ts', 'CRM/Profile/Form/Dynamic.tpl', 34, false),array('modifier', 'truncate', 'CRM/Profile/Form/Dynamic.tpl', 49, false),array('modifier', 'substr', 'CRM/Profile/Form/Dynamic.tpl', 150, false),array('modifier', 'cat', 'CRM/Profile/Form/Dynamic.tpl', 151, false),array('modifier', 'replace', 'CRM/Profile/Form/Dynamic.tpl', 168, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><div class="crm-profile-name-<?php echo $this->_tpl_vars['ufGroupName']; ?>
">
<?php $this->_tag_stack[] = array('crmRegion', array('name' => "profile-form-".($this->_tpl_vars['ufGroupName']))); $_block_repeat=true;smarty_block_crmRegion($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>

<?php if ($this->_tpl_vars['deleteRecord']): ?>
<div class="messages status no-popup">
  <div class="icon inform-icon"></div>&nbsp;
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Are you sure you want to delete this record?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
  </div>

  <div class="crm-submit-buttons">
    <span class="crm-button"><?php echo $this->_tpl_vars['form']['_qf_Edit_upload_delete']['html']; ?>
</span>
    <a class="button cancel" href="<?php echo $this->_tpl_vars['cancelURL']; ?>
"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Cancel<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
  </div>
<?php else: ?>
<?php if (! empty ( $this->_tpl_vars['fields'] )): ?>

  <?php if ($this->_tpl_vars['action'] == 1 || $this->_tpl_vars['action'] == 2 || $this->_tpl_vars['action'] == 4): ?>
  <div id="crm-profile-block" class="crm-container crm-public">
    <?php else: ?>
  <div id="crm-container" class="crm-container crm-public" lang="<?php echo ((is_array($_tmp=$this->_tpl_vars['config']->lcMessages)) ? $this->_run_mod_handler('truncate', true, $_tmp, 2, "", true) : smarty_modifier_truncate($_tmp, 2, "", true)); ?>
" xml:lang="<?php echo ((is_array($_tmp=$this->_tpl_vars['config']->lcMessages)) ? $this->_run_mod_handler('truncate', true, $_tmp, 2, "", true) : smarty_modifier_truncate($_tmp, 2, "", true)); ?>
">
  <?php endif; ?>

  <?php if ($this->_tpl_vars['isDuplicate'] && ( ( $this->_tpl_vars['action'] == 1 && $this->_tpl_vars['mode'] == 4 ) || ( $this->_tpl_vars['action'] == 2 ) || ( $this->_tpl_vars['action'] == 8192 ) )): ?>
    <div class="crm-submit-buttons">
      <span class="crm-button"><?php echo $this->_tpl_vars['form']['_qf_Edit_upload_duplicate']['html']; ?>
</span>
    </div>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['mode'] == 1 || $this->_tpl_vars['activeComponent'] != 'CiviCRM'): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Form/body.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php endif; ?>
  <?php echo ''; ?><?php if ($this->_tpl_vars['help_pre'] && $this->_tpl_vars['action'] != 4): ?><?php echo '<div class="messages help">'; ?><?php echo $this->_tpl_vars['help_pre']; ?><?php echo '</div>'; ?><?php endif; ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/CMSUser.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php if ($this->_tpl_vars['action'] == 2 && $this->_tpl_vars['multiRecordFieldListing']): ?><?php echo '<h1>'; ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'Edit Details'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '</h1><div class="crm-submit-buttons" style=\'float:right\'>'; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php if ($this->_tpl_vars['isDuplicate']): ?><?php echo '<span class="crm-button">'; ?><?php echo $this->_tpl_vars['form']['_qf_Edit_upload_duplicate']['html']; ?><?php echo '</span>'; ?><?php endif; ?><?php echo '</div>'; ?><?php endif; ?><?php echo ''; ?><?php $this->assign('zeroField', 'Initial Non Existent Fieldset'); ?><?php echo ''; ?><?php $this->assign('fieldset', $this->_tpl_vars['zeroField']); ?><?php echo ''; ?><?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fieldName'] => $this->_tpl_vars['field']):
?><?php echo ''; ?><?php if ($this->_tpl_vars['field']['skipDisplay']): ?><?php echo ''; ?><?php continue; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php $this->assign('profileID', $this->_tpl_vars['field']['group_id']); ?><?php echo ''; ?><?php $this->assign('n', $this->_tpl_vars['field']['name']); ?><?php echo ''; ?><?php if ($this->_tpl_vars['field']['groupTitle'] != $this->_tpl_vars['fieldset']): ?><?php echo ''; ?><?php if ($this->_tpl_vars['mode'] != 8 && $this->_tpl_vars['mode'] != 4): ?><?php echo '<div '; ?><?php if ($this->_tpl_vars['context'] != 'dialog'): ?><?php echo 'id="profilewrap'; ?><?php echo $this->_tpl_vars['field']['group_id']; ?><?php echo '"'; ?><?php endif; ?><?php echo '><fieldset><legend>'; ?><?php echo $this->_tpl_vars['field']['groupTitle']; ?><?php echo '</legend>'; ?><?php endif; ?><?php echo ''; ?><?php $this->assign('fieldset', ($this->_tpl_vars['field']['groupTitle'])); ?><?php echo ''; ?><?php $this->assign('groupHelpPost', ($this->_tpl_vars['field']['groupHelpPost'])); ?><?php echo ''; ?><?php if ($this->_tpl_vars['field']['groupHelpPre']): ?><?php echo '<div class="messages help">'; ?><?php echo $this->_tpl_vars['field']['groupHelpPre']; ?><?php echo '</div>'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['field']['field_type'] == 'Formatting'): ?><?php echo ''; ?><?php echo $this->_tpl_vars['field']['help_pre']; ?><?php echo ''; ?><?php elseif ($this->_tpl_vars['n']): ?><?php echo ''; ?><?php if ($this->_tpl_vars['field']['groupTitle'] != $this->_tpl_vars['fieldset']): ?><?php echo ''; ?><?php if ($this->_tpl_vars['fieldset'] != $this->_tpl_vars['zeroField']): ?><?php echo ''; ?><?php if ($this->_tpl_vars['groupHelpPost']): ?><?php echo '<div class="messages help">'; ?><?php echo $this->_tpl_vars['groupHelpPost']; ?><?php echo '</div>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['mode'] != 8 && $this->_tpl_vars['mode'] != 4): ?><?php echo '</div><!-- end form-layout-compressed-div --></fieldset></div>'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo '<div class="form-layout-compressed">'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['field']['help_pre'] && $this->_tpl_vars['action'] != 4 && $this->_tpl_vars['form'][$this->_tpl_vars['n']]['html']): ?><?php echo '<div class="crm-section helprow-'; ?><?php echo $this->_tpl_vars['n']; ?><?php echo '-section" id="helprow-'; ?><?php echo $this->_tpl_vars['n']; ?><?php echo '"><div class="content description">'; ?><?php echo $this->_tpl_vars['field']['help_pre']; ?><?php echo '</div></div>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['field']['options_per_line']): ?><?php echo '<div class="crm-section editrow_'; ?><?php echo $this->_tpl_vars['n']; ?><?php echo '-section form-item" id="editrow-'; ?><?php echo $this->_tpl_vars['n']; ?><?php echo '"><div class="label">'; ?><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['label']; ?><?php echo '</div><div class="content edit-value">'; ?><?php $this->assign('count', '1'); ?><?php echo ''; ?><?php echo '<table class="form-layout-compressed"><tr>'; ?><?php echo ''; ?><?php $this->assign('index', '1'); ?><?php echo ''; ?><?php $_from = $this->_tpl_vars['form'][$this->_tpl_vars['n']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['outer']['iteration']++;
?><?php echo ''; ?><?php if ($this->_tpl_vars['index'] < 10): ?><?php echo ''; ?><?php $this->assign('index', ($this->_tpl_vars['index']+1)); ?><?php echo ''; ?><?php else: ?><?php echo '<td class="labels font-light">'; ?><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']][$this->_tpl_vars['key']]['html']; ?><?php echo '</td>'; ?><?php if ($this->_tpl_vars['count'] == $this->_tpl_vars['field']['options_per_line']): ?><?php echo '</tr><tr>'; ?><?php $this->assign('count', '1'); ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php $this->assign('count', ($this->_tpl_vars['count']+1)); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo '</tr></table>'; ?><?php echo '</div><div class="clear"></div></div>'; ?><?php echo ''; ?><?php else: ?><?php echo '<div id="editrow-'; ?><?php echo $this->_tpl_vars['n']; ?><?php echo '" class="crm-section editrow_'; ?><?php echo $this->_tpl_vars['n']; ?><?php echo '-section form-item"><div class="label">'; ?><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['label']; ?><?php echo '</div><div class="edit-value content">'; ?><?php if (((is_array($_tmp=$this->_tpl_vars['n'])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 3) : substr($_tmp, 0, 3)) == 'im-'): ?><?php echo ''; ?><?php $this->assign('provider', ((is_array($_tmp=$this->_tpl_vars['n'])) ? $this->_run_mod_handler('cat', true, $_tmp, "-provider_id") : smarty_modifier_cat($_tmp, "-provider_id"))); ?><?php echo ''; ?><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['provider']]['html']; ?><?php echo '&nbsp;'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['n'] == 'email_greeting' || $this->_tpl_vars['n'] == 'postal_greeting' || $this->_tpl_vars['n'] == 'addressee'): ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Profile/Form/GreetingType.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php elseif (( $this->_tpl_vars['n'] == 'group' && $this->_tpl_vars['form']['group'] ) || ( $this->_tpl_vars['n'] == 'tag' && $this->_tpl_vars['form']['tag'] )): ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contact/Form/Edit/TagsAndGroups.tpl", 'smarty_include_vars' => array('type' => $this->_tpl_vars['n'],'context' => 'profile')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php elseif (( $this->_tpl_vars['form'][$this->_tpl_vars['n']]['name'] == 'image_URL' )): ?><?php echo ''; ?><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['html']; ?><?php echo ''; ?><?php if (! empty ( $this->_tpl_vars['imageURL'] )): ?><?php echo '<div class="crm-section contact_image-section"><div class="content">'; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contact/Page/ContactImage.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '</div></div>'; ?><?php endif; ?><?php echo ''; ?><?php elseif (((is_array($_tmp=$this->_tpl_vars['n'])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 5) : substr($_tmp, 0, 5)) == 'phone'): ?><?php echo ''; ?><?php $this->assign('phone_ext_field', ((is_array($_tmp=$this->_tpl_vars['n'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'phone', 'phone_ext') : smarty_modifier_replace($_tmp, 'phone', 'phone_ext'))); ?><?php echo ''; ?><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['html']; ?><?php echo ''; ?><?php if ($this->_tpl_vars['form'][$this->_tpl_vars['phone_ext_field']]['html']): ?><?php echo '&nbsp;'; ?><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['phone_ext_field']]['html']; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php if (( $this->_tpl_vars['field']['data_type'] == 'Date' || ( ( ( $this->_tpl_vars['n'] == 'birth_date' ) || ( $this->_tpl_vars['n'] == 'deceased_date' ) || ( $this->_tpl_vars['n'] == 'activity_date_time' ) ) ) ) && $this->_tpl_vars['field']['is_view'] != 1): ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/jcalendar.tpl", 'smarty_include_vars' => array('elementName' => $this->_tpl_vars['n'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['html']; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['field']['html_type'] == 'Autocomplete-Select'): ?><?php echo ''; ?><?php if ($this->_tpl_vars['field']['data_type'] == 'ContactReference'): ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Custom/Form/ContactReference.tpl", 'smarty_include_vars' => array('element_name' => $this->_tpl_vars['n'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo '</div><div class="clear"></div></div>'; ?><?php if ($this->_tpl_vars['form'][$this->_tpl_vars['n']]['type'] == 'file'): ?><?php echo '<div class="crm-section file_displayURL-section file_displayURL'; ?><?php echo $this->_tpl_vars['n']; ?><?php echo '-section"><div class="content">'; ?><?php echo $this->_tpl_vars['customFiles'][$this->_tpl_vars['n']]['displayURL']; ?><?php echo '</div></div><div class="crm-section file_deleteURL-section file_deleteURL'; ?><?php echo $this->_tpl_vars['n']; ?><?php echo '-section"><div class="content">'; ?><?php echo $this->_tpl_vars['customFiles'][$this->_tpl_vars['n']]['deleteURL']; ?><?php echo '</div></div>'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php echo ''; ?><?php if ($this->_tpl_vars['field']['help_post'] && $this->_tpl_vars['action'] != 4 && $this->_tpl_vars['form'][$this->_tpl_vars['n']]['html']): ?><?php echo '<div class="crm-section helprow-'; ?><?php echo $this->_tpl_vars['n']; ?><?php echo '-section" id="helprow-'; ?><?php echo $this->_tpl_vars['n']; ?><?php echo '"><div class="content description">'; ?><?php echo $this->_tpl_vars['field']['help_post']; ?><?php echo '</div></div>'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?><?php if ($this->_tpl_vars['isCaptcha'] && ( $this->_tpl_vars['mode'] == 8 || $this->_tpl_vars['mode'] == 4 || $this->_tpl_vars['mode'] == 1 )): ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/common/ReCAPTCHA.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '<script type="text/javascript">cj(\'.recaptcha_label\').attr(\'width\', \'140px\');</script>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['field']['groupHelpPost']): ?><?php echo '<div class="messages help">'; ?><?php echo $this->_tpl_vars['field']['groupHelpPost']; ?><?php echo '</div>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['mode'] != 8 && $this->_tpl_vars['mode'] != 4): ?><?php echo '</fieldset></div>'; ?><?php endif; ?><?php echo ''; ?><?php if (( $this->_tpl_vars['action'] == 1 && $this->_tpl_vars['mode'] == 4 ) || ( $this->_tpl_vars['action'] == 2 ) || ( $this->_tpl_vars['action'] == 8192 )): ?><?php echo ''; ?><?php if ($this->_tpl_vars['action'] == 2 && $this->_tpl_vars['multiRecordFieldListing']): ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Profile/Page/MultipleRecordFieldsListing.tpl", 'smarty_include_vars' => array('showListing' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php $this->assign('floatStyle', 'float:right'); ?><?php echo ''; ?><?php endif; ?><?php echo '<div class="crm-submit-buttons" style=\''; ?><?php echo $this->_tpl_vars['floatStyle']; ?><?php echo '\'>'; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php if ($this->_tpl_vars['isDuplicate']): ?><?php echo '<span class="crm-button">'; ?><?php echo $this->_tpl_vars['form']['_qf_Edit_upload_duplicate']['html']; ?><?php echo '</span>'; ?><?php endif; ?><?php echo '<a class="button cancel" href="'; ?><?php echo $this->_tpl_vars['cancelURL']; ?><?php echo '">'; ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'Cancel'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '</a></div>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['help_post'] && $this->_tpl_vars['action'] != 4): ?><?php echo '<br /><div class="messages help">'; ?><?php echo $this->_tpl_vars['help_post']; ?><?php echo '</div>'; ?><?php endif; ?><?php echo ''; ?>


</div> 
<script type="text/javascript">
  <?php if ($this->_tpl_vars['drupalCms']): ?>
    <?php echo '
    if ( document.getElementsByName("cms_create_account")[0].checked ) {
      cj(\'#details\').show();
    }
    else {
      cj(\'#details\').hide();
    }
    '; ?>

  <?php endif; ?>
</script>
<?php endif; ?> <?php if ($this->_tpl_vars['multiRecordFieldListing'] && empty ( $this->_tpl_vars['fields'] )): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Profile/Page/MultipleRecordFieldsListing.tpl", 'smarty_include_vars' => array('showListing' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['drupalCms']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/showHideByFieldValue.tpl", 'smarty_include_vars' => array('trigger_field_id' => 'create_account','trigger_value' => "",'target_element_id' => 'details','target_element_type' => 'block','field_type' => 'radio','invert' => 0)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['statusMessage']): ?>
<div class="messages status no-popup">
  <div class="icon inform-icon"></div>
  <?php echo $this->_tpl_vars['statusMessage']; ?>

</div>
<?php endif; ?>
<?php endif; ?> <?php echo '
<script type="text/javascript">

CRM.$(function($) {
  cj(\'#selector tr:even\').addClass(\'odd-row \');
  cj(\'#selector tr:odd \').addClass(\'even-row\');
});
'; ?>

</script>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmRegion($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div> <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>