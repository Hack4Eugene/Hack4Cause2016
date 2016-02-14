<?php /* Smarty version 2.6.27, created on 2016-02-14 08:40:09
         compiled from CRM/Custom/Form/Group.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Custom/Form/Group.tpl', 1, false),array('block', 'ts', 'CRM/Custom/Form/Group.tpl', 28, false),array('block', 'crmButton', 'CRM/Custom/Form/Group.tpl', 81, false),array('function', 'help', 'CRM/Custom/Form/Group.tpl', 28, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><div class="crm-block crm-form-block">
    <div id="help"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Use Custom Field Sets to add logically related fields for a specific type of CiviCRM record (e.g. contact records, contribution records, etc.).<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <?php echo smarty_function_help(array('id' => "id-group_intro"), $this);?>
</div>
    <div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'top')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
    <table class="form-layout">
    <tr>
        <td class="label"><?php echo $this->_tpl_vars['form']['title']['label']; ?>
 <?php if ($this->_tpl_vars['action'] == 2): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/I18n/Dialog.tpl', 'smarty_include_vars' => array('table' => 'civicrm_custom_group','field' => 'title','id' => $this->_tpl_vars['gid'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
        <td class="html-adjust"><?php echo $this->_tpl_vars['form']['title']['html']; ?>
 <?php echo smarty_function_help(array('id' => "id-title"), $this);?>
</td>
    </tr>
    <tr>
        <td class="label"><?php echo $this->_tpl_vars['form']['extends']['label']; ?>
</td>
        <td><?php echo $this->_tpl_vars['form']['extends']['html']; ?>
 <?php echo smarty_function_help(array('id' => "id-extends"), $this);?>
</td>
    </tr>
    <tr>
        <td class="label"><?php echo $this->_tpl_vars['form']['weight']['label']; ?>
</td>
        <td><?php echo $this->_tpl_vars['form']['weight']['html']; ?>
 <?php echo smarty_function_help(array('id' => "id-weight"), $this);?>
</td>
    </tr>
    <tr id="is_multiple_row" class="hiddenElement">         <td></td>
        <td class="html-adjust"><?php echo $this->_tpl_vars['form']['is_multiple']['html']; ?>
&nbsp;<?php echo $this->_tpl_vars['form']['is_multiple']['label']; ?>
 <?php echo smarty_function_help(array('id' => "id-is_multiple"), $this);?>
</td>
    </tr>
    <tr id="multiple_row" class="hiddenElement">
        <td class="label"><?php echo $this->_tpl_vars['form']['max_multiple']['label']; ?>
</td>
        <td><?php echo $this->_tpl_vars['form']['max_multiple']['html']; ?>
 <?php echo smarty_function_help(array('id' => "id-max_multiple"), $this);?>
</td>
    </tr>
    <tr id="style_row" class="hiddenElement">
        <td class="label"><?php echo $this->_tpl_vars['form']['style']['label']; ?>
</td>
        <td><?php echo $this->_tpl_vars['form']['style']['html']; ?>
 <?php echo smarty_function_help(array('id' => "id-display_style"), $this);?>
</td>
    </tr>
    <tr class="html-adjust">
        <td>&nbsp;</td>
        <td><?php echo $this->_tpl_vars['form']['collapse_display']['html']; ?>
 <?php echo $this->_tpl_vars['form']['collapse_display']['label']; ?>
 <?php echo smarty_function_help(array('id' => "id-collapse"), $this);?>
</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><?php echo $this->_tpl_vars['form']['collapse_adv_display']['html']; ?>
 <?php echo $this->_tpl_vars['form']['collapse_adv_display']['label']; ?>
 <?php echo smarty_function_help(array('id' => "id-collapse-adv"), $this);?>
</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><?php echo $this->_tpl_vars['form']['is_active']['html']; ?>
 <?php echo $this->_tpl_vars['form']['is_active']['label']; ?>
</td>
    </tr>
    <tr class="html-adjust">
        <td class="label"><?php echo $this->_tpl_vars['form']['help_pre']['label']; ?>
 <!--<?php if ($this->_tpl_vars['action'] == 2): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/I18n/Dialog.tpl', 'smarty_include_vars' => array('table' => 'civicrm_custom_group','field' => 'help_pre','id' => $this->_tpl_vars['gid'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?>--><?php echo smarty_function_help(array('id' => "id-help_pre"), $this);?>
</td>
        <td><?php echo $this->_tpl_vars['form']['help_pre']['html']; ?>
</td>
    </tr>
    <tr class="html-adjust">
        <td class="label"><?php echo $this->_tpl_vars['form']['help_post']['label']; ?>
 <!--<?php if ($this->_tpl_vars['action'] == 2): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/I18n/Dialog.tpl', 'smarty_include_vars' => array('table' => 'civicrm_custom_group','field' => 'help_post','id' => $this->_tpl_vars['gid'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?>--><?php echo smarty_function_help(array('id' => "id-help_post"), $this);?>
</td>
        <td><?php echo $this->_tpl_vars['form']['help_post']['html']; ?>
</td>
    </tr>
    </table>
    <div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
</div>
<?php if ($this->_tpl_vars['action'] == 2 || $this->_tpl_vars['action'] == 4): ?>     <p></p>
    <div class="action-link">
      <?php $this->_tag_stack[] = array('crmButton', array('p' => 'civicrm/admin/custom/group/field','q' => "action=browse&reset=1&gid=".($this->_tpl_vars['gid']))); $_block_repeat=true;smarty_block_crmButton($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Custom Fields for this Set<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmButton($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    </div>
<?php endif; ?>
<?php echo $this->_tpl_vars['initHideBlocks']; ?>

<?php echo '
<script type="text/Javascript">
CRM.$(function($) {
  var tabWithTableOption;

  $(\'#extends_0\').each(showHideStyle).change(showHideStyle);

  var isGroupEmpty = "'; ?>
<?php echo $this->_tpl_vars['isGroupEmpty']; ?>
<?php echo '";
  if (isGroupEmpty) {
    showRange(true);
  }
  $(\'input#is_multiple\').change(showRange);

  // "Collapse" is a bad default for "Tab" display
  $("select#style").change(function() {
    if ($(this).val() == \'Tab\') {
      $(\'#collapse_display\').prop(\'checked\', false);
    }
  });

  /**
   * Check if this is a contact-related set and show/hide other options accordingly
   */
  function showHideStyle() {
    var
      extend = $(this).val(),
      contactTypes = '; ?>
<?php echo $this->_tpl_vars['contactTypes']; ?>
<?php echo ',
      showStyle = "'; ?>
<?php echo $this->_tpl_vars['showStyle']; ?>
<?php echo '",
      showMultiple = "'; ?>
<?php echo $this->_tpl_vars['showMultiple']; ?>
<?php echo '",
      showMaxMultiple = "'; ?>
<?php echo $this->_tpl_vars['showMaxMultiple']; ?>
<?php echo '",
      isContact = ($.inArray(extend, contactTypes) >= 0);

    if (isContact) {
      $("tr#style_row, tr#is_multiple_row").show();
      if ($(\'#is_multiple :checked\').length) {
        $("tr#multiple_row").show();
      }
    }
    else {
      $("tr#style_row, tr#is_multiple_row, tr#multiple_row").hide();
    }

    if (showStyle) {
      $("tr#style_row").show();
    }

    if (showMultiple) {
      $("tr#style_row, tr#is_multiple_row").show();
    }

    if (!showMaxMultiple) {
      $("tr#multiple_row").hide();
    }
    else if ($(\'#is_multiple\').prop(\'checked\')) {
      $("tr#multiple_row").show();
    }
  }

  /**
   * Check if this set supports multiple records and adjust other options accordingly
   *
   * @param onFormLoad
   */
  function showRange(onFormLoad) {
    if($("#is_multiple").is(\':checked\')) {
      $("tr#multiple_row").show();
      if (onFormLoad !== true) {
        $(\'#collapse_display\').prop(\'checked\', false);
        $("select#style").append(tabWithTableOption);
        $("select#style").val(\'Tab with table\');
      }
    }
    else {
      $("tr#multiple_row").hide();
      if ($("select#style").val() === \'Tab with table\') {
        $("select#style").val(\'Inline\');
      }
      tabWithTableOption = $("select#style option[value=\'Tab with table\']").detach();
    }
  }

  // In update mode, when \'extends\' is set to an option which doesn\'t have
  // any options in 2nd selector (for subtypes)
  var subtypes = document.getElementById(\'extends_1\');
  if (subtypes) {
    if (subtypes.options.length <= 0) {
      subtypes.style.display = \'none\';
    }
    else {
      subtypes.style.display = \'inline\';
    }
  }

  // When removing sub-types
  $(\'.crm-warnDataLoss\').on(\'click\', function() {
    var submittedSubtypes = $(\'#extends_1\').val();
    var defaultSubtypes = '; ?>
<?php echo $this->_tpl_vars['defaultSubtypes']; ?>
<?php echo ';

    var warning = false;
    $.each(defaultSubtypes, function(index, subtype) {
      if ($.inArray(subtype, submittedSubtypes) < 0) {
        warning = true;
      }
    });

    if (warning) {
      return confirm('; ?>
'<?php $this->_tag_stack[] = array('ts', array('escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Warning: You have chosen to remove one or more subtypes. This will cause any custom data records associated with those subtypes to be removed.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>'<?php echo ');
    }
    return true;
  });
});
</script>
'; ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>