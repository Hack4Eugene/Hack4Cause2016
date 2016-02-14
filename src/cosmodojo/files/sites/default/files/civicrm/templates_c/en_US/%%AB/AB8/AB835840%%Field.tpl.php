<?php /* Smarty version 2.6.27, created on 2016-02-14 08:40:28
         compiled from CRM/Custom/Form/Field.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Custom/Form/Field.tpl', 1, false),array('block', 'ts', 'CRM/Custom/Form/Field.tpl', 150, false),array('block', 'crmButton', 'CRM/Custom/Form/Field.tpl', 352, false),array('function', 'crmURL', 'CRM/Custom/Form/Field.tpl', 154, false),array('function', 'help', 'CRM/Custom/Form/Field.tpl', 165, false),array('function', 'docURL', 'CRM/Custom/Form/Field.tpl', 196, false),array('modifier', 'crmAddClass', 'CRM/Custom/Form/Field.tpl', 201, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo '
<script type="text/Javascript">
function custom_option_html_type( ) {
    var html_type_name = document.getElementsByName("data_type[1]")[0].value;
    var data_type_id   = document.getElementsByName("data_type[0]")[0].value;

    if ( !html_type_name && !data_type_id ) {
        return;
    }

    if ( data_type_id == 11) {
      toggleContactRefFilter( );
    } else {
      cj(\'#field_advance_filter\').hide();
      cj(\'#contact_reference_group\').hide();
    }

    if ( data_type_id < 4 ) {
        if ( html_type_name != "Text" ) {
            cj("#showoption").show();
            cj("#hideDefault").hide();
            cj("#hideDesc").hide();
            cj("#searchByRange").hide();
            cj("#searchable").show();
        } else {
            cj("#showoption").hide();
            cj("#hideDefault").show();
            cj("#hideDesc").show();
            cj("#searchable").show();
        }
    } else {
        if ( data_type_id == 9 ) {
            document.getElementById("default_value").value = \'\';
            cj("#hideDefault").hide();
            cj("#searchable").hide();
            cj("#hideDesc").hide();
        } else if ( data_type_id == 11 ) {
            cj("#hideDefault").hide();
        } else {
            cj("#hideDefault").show();
            cj("#searchable").show();
            cj("#hideDesc").show();
        }
        cj("#showoption").hide();
    }

    var radioOption, checkBoxOption;

    for ( var i=1; i<=11; i++) {
        radioOption = \'radio\'+i;
        checkBoxOption = \'checkbox\'+i
        if ( data_type_id < 4 ) {
            if ( html_type_name != "Text") {
                if ( html_type_name == "CheckBox" || html_type_name == "Multi-Select") {
                    cj("#"+checkBoxOption).show();
                    cj("#"+radioOption).hide();
                } else {
                    cj("#"+radioOption).show();
                    cj("#"+checkBoxOption).hide();
                }
            }
        }
    }

    if ( data_type_id < 4 ) {
        if (html_type_name == "CheckBox" || html_type_name == "Radio") {
            cj("#optionsPerLine").show();
        } else {
            cj("#optionsPerLine").hide();
        }
    }

    if ( data_type_id == 5) {
        cj("#startDateRange").show();
        cj("#endDateRange").show();
        cj("#includedDatePart").show();
    } else {
        cj("#startDateRange").hide();
        cj("#endDateRange").hide();
        cj("#includedDatePart").hide();
    }

    if ( data_type_id == 0 ) {
        cj("#textLength").show();
    } else {
        cj("#textLength").hide();
    }

    if ( data_type_id == 4 ) {
        cj("#noteColumns").show();
        cj("#noteRows").show();
        cj("#noteLength").show();
    } else {
        cj("#noteColumns").hide();
        cj("#noteRows").hide();
        cj("#noteLength").hide();
    }

    if ( data_type_id > 3) {
        cj("#optionsPerLine").hide();
    }

    '; ?>
<?php if ($this->_tpl_vars['action'] == 1): ?><?php echo '
    clearSearchBoxes( );
    '; ?>
<?php endif; ?><?php echo '
}
</script>
'; ?>

<div class="crm-block crm-form-block crm-custom-field-form-block">
<div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'top')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
    <table class="form-layout">
        <tr class="crm-custom-field-form-block-label">
            <td class="label"><?php echo $this->_tpl_vars['form']['label']['label']; ?>

            <?php if ($this->_tpl_vars['action'] == 2): ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/I18n/Dialog.tpl', 'smarty_include_vars' => array('table' => 'civicrm_custom_field','field' => 'label','id' => $this->_tpl_vars['id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php endif; ?>
            </td>
            <td class="html-adjust"><?php echo $this->_tpl_vars['form']['label']['html']; ?>
</td>
        </tr>
        <tr class="crm-custom-field-form-block-data_type">
            <td class="label"><?php echo $this->_tpl_vars['form']['data_type']['label']; ?>
</td>
            <td class="html-adjust"><?php echo $this->_tpl_vars['form']['data_type']['html']; ?>

                <?php if ($this->_tpl_vars['action'] != 4 && $this->_tpl_vars['action'] != 2): ?>
                    <br /><span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Select the type of data you want to collect and store for this contact. Then select from the available HTML input field types (choices are based on the type of data being collected).<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
                <?php endif; ?>
    <?php if ($this->_tpl_vars['action'] == 2 && $this->_tpl_vars['changeFieldType']): ?>
    <br />
    <a class="action-item crm-hover-button" href='<?php echo CRM_Utils_System::crmURL(array('p' => "civicrm/admin/custom/group/field/changetype",'q' => "reset=1&id=".($this->_tpl_vars['id'])), $this);?>
'>
      <span class="icon ui-icon-gear"></span>
      <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Change Input Field Type<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    </a>
    <div class='clear'></div>
    <?php endif; ?>
            </td>
        </tr>
       <?php if ($this->_tpl_vars['form']['in_selector']): ?>
       <tr class='crm-custom-field-form-block-in_selector'>
          <td class='label'><?php echo $this->_tpl_vars['form']['in_selector']['label']; ?>
</td>
          <td class='html-adjust'><?php echo $this->_tpl_vars['form']['in_selector']['html']; ?>
 <?php echo smarty_function_help(array('id' => "id-in_selector"), $this);?>
</td>
       </tr>
       <?php endif; ?>
       <tr class="crm-custom-field-form-block-text_length"  id="textLength" <?php if (! ( $this->_tpl_vars['action'] == 1 || $this->_tpl_vars['action'] == 2 ) && ( $this->_tpl_vars['form']['data_type']['value']['0']['0'] != 0 )): ?>class="hiddenElement"<?php endif; ?>>
            <td class="label"><?php echo $this->_tpl_vars['form']['text_length']['label']; ?>
</td>
            <td class="html-adjust"><?php echo $this->_tpl_vars['form']['text_length']['html']; ?>
</td>
        </tr>

        <tr id='showoption' <?php if ($this->_tpl_vars['action'] == 1 || $this->_tpl_vars['action'] == 2): ?>class="hiddenElement"<?php endif; ?>>
            <td colspan="2">
            <table class="form-layout-compressed">
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Custom/Form/Optionfields.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </table>
            </td>
        </tr>
        <tr id='contact_reference_group'>
            <td class="label"><?php echo $this->_tpl_vars['form']['group_id']['label']; ?>
</td>
            <td class="html-adjust">
              <?php echo $this->_tpl_vars['form']['group_id']['html']; ?>

            &nbsp;&nbsp;<span><a href="#" onclick="toggleContactRefFilter('Advance'); return false;"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Advanced Filter<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></span>
              <?php ob_start(); ?><?php echo CRM_Utils_System::crmURL(array('p' => "civicrm/admin/setting/search",'q' => "reset=1"), $this);?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('searchPreferences', ob_get_contents());ob_end_clean(); ?>
            <div class="messages status no-popup"><div class="icon ui-icon-alert"></div> <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['searchPreferences'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>If you are planning on using this field in front-end profile, event registration or contribution forms, you should 'Limit List to Group' or configure an 'Advanced Filter'  (so that you do not unintentionally expose your entire set of contacts). Users must have either 'access contact reference fields' OR 'access CiviCRM' permission in order to use contact reference autocomplete fields. You can assign 'access contact reference fields' to the anonymous role if you want un-authenticated visitors to use this field. Use <a href='%1'>Search Preferences - Contact Reference Options</a> to control the fields included in the search results.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
          </td>
        </tr>
      <tr id='field_advance_filter'>
            <td class="label"><?php echo $this->_tpl_vars['form']['filter']['label']; ?>
</td>
            <td class="html-adjust">
              <?php echo $this->_tpl_vars['form']['filter']['html']; ?>

              &nbsp;&nbsp;<span><a href="#" onclick="toggleContactRefFilter('Group'); return false;"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Filter by Group<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></span>
        <br />
        <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Filter contact search results for this field using Contact get API parameters. EXAMPLE: To list Students in group 3:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> "action=get&group=3&contact_sub_type=Student" <?php echo smarty_function_docURL(array('page' => 'Using the API','resource' => 'wiki'), $this);?>
</span>
            </td>
        </tr>
        <tr  class="crm-custom-field-form-block-options_per_line" id="optionsPerLine" <?php if ($this->_tpl_vars['action'] != 2 && ( $this->_tpl_vars['form']['data_type']['value']['0']['0'] >= 4 && $this->_tpl_vars['form']['data_type']['value']['1']['0'] != 'CheckBox' || $this->_tpl_vars['form']['data_type']['value']['1']['0'] != 'Radio' )): ?>class="hiddenElement"<?php endif; ?>>
            <td class="label"><?php echo $this->_tpl_vars['form']['options_per_line']['label']; ?>
</td>
            <td class="html-adjust"><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['options_per_line']['html'])) ? $this->_run_mod_handler('crmAddClass', true, $_tmp, 'two') : smarty_modifier_crmAddClass($_tmp, 'two')); ?>
</td>
        </tr>
      <tr  class="crm-custom-field-form-block-start_date_years" id="startDateRange" <?php if ($this->_tpl_vars['action'] != 2 && ( $this->_tpl_vars['form']['data_type']['value']['0']['0'] != 5 )): ?>class="hiddenElement"<?php endif; ?>>
            <td class="label"><?php echo $this->_tpl_vars['form']['start_date_years']['label']; ?>
</td>
            <td class="html-adjust"><?php echo $this->_tpl_vars['form']['start_date_years']['html']; ?>
 <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>years prior to current date.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
        </tr>
        <tr class="crm-custom-field-form-block-end_date_years" id="endDateRange" <?php if ($this->_tpl_vars['action'] != 2 && ( $this->_tpl_vars['form']['data_type']['value']['0']['0'] != 5 )): ?>class="hiddenElement"<?php endif; ?>>
            <td class="label"><?php echo $this->_tpl_vars['form']['end_date_years']['label']; ?>
</td>
            <td class="html-adjust"><?php echo $this->_tpl_vars['form']['end_date_years']['html']; ?>
 <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>years after the current date.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
        </tr>
        <tr  class="crm-custom-field-form-block-date_format"  id="includedDatePart" <?php if ($this->_tpl_vars['action'] != 2 && ( $this->_tpl_vars['form']['data_type']['value']['0']['0'] != 5 )): ?>class="hiddenElement"<?php endif; ?>>
            <td class="label"><?php echo $this->_tpl_vars['form']['date_format']['label']; ?>
</td>
            <td class="html-adjust"><?php echo $this->_tpl_vars['form']['date_format']['html']; ?>
&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['form']['time_format']['label']; ?>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['form']['time_format']['html']; ?>
</td>
        </tr>
        <tr  class="crm-custom-field-form-block-note_rows"  id="noteRows" <?php if ($this->_tpl_vars['action'] != 2 && ( $this->_tpl_vars['form']['data_type']['value']['0']['0'] != 4 )): ?>class="hiddenElement"<?php endif; ?>>
            <td class="label"><?php echo $this->_tpl_vars['form']['note_rows']['label']; ?>
</td>
            <td class="html-adjust"><?php echo $this->_tpl_vars['form']['note_rows']['html']; ?>
</td>
        </tr>
      <tr class="crm-custom-field-form-block-note_columns" id="noteColumns" <?php if ($this->_tpl_vars['action'] != 2 && ( $this->_tpl_vars['form']['data_type']['value']['0']['0'] != 4 )): ?>class="hiddenElement"<?php endif; ?>>
            <td class="label"><?php echo $this->_tpl_vars['form']['note_columns']['label']; ?>
</td>
            <td class="html-adjust"><?php echo $this->_tpl_vars['form']['note_columns']['html']; ?>
</td>
        </tr>
        <tr class="crm-custom-field-form-block-note_length" id="noteLength" <?php if ($this->_tpl_vars['action'] != 2 && ( $this->_tpl_vars['form']['data_type']['value']['0']['0'] != 4 )): ?>class="hiddenElement"<?php endif; ?>>
            <td class="label"><?php echo $this->_tpl_vars['form']['note_length']['label']; ?>
</td>
            <td class="html-adjust"><?php echo $this->_tpl_vars['form']['note_length']['html']; ?>
 <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Leave blank for unlimited. This limit is not implemented by all browsers and rich text editors.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td>
        </tr>
        <tr class="crm-custom-field-form-block-weight" >
            <td class="label"><?php echo $this->_tpl_vars['form']['weight']['label']; ?>
</td>
            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['weight']['html'])) ? $this->_run_mod_handler('crmAddClass', true, $_tmp, 'two') : smarty_modifier_crmAddClass($_tmp, 'two')); ?>

                <?php if ($this->_tpl_vars['action'] != 4): ?>
                <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Weight controls the order in which fields are displayed in a group. Enter a positive or negative integer - lower numbers are displayed ahead of higher numbers.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
                <?php endif; ?>
            </td>
        </tr>
        <tr class="crm-custom-field-form-block-default_value" id="hideDefault" <?php if ($this->_tpl_vars['action'] == 2 && ( $this->_tpl_vars['form']['data_type']['value']['0']['0'] < 4 && $this->_tpl_vars['form']['data_type']['value']['1']['0'] != 'Text' )): ?>class="hiddenElement"<?php endif; ?>>
            <td title="hideDefaultValTxt" class="label"><?php echo $this->_tpl_vars['form']['default_value']['label']; ?>
</td>
            <td title="hideDefaultValDef" class="html-adjust"><?php echo $this->_tpl_vars['form']['default_value']['html']; ?>
</td>
        </tr>
        <tr  class="crm-custom-field-form-block-description"  id="hideDesc" <?php if ($this->_tpl_vars['action'] != 4 && $this->_tpl_vars['action'] == 2 && ( $this->_tpl_vars['form']['data_type']['value']['0']['0'] < 4 && $this->_tpl_vars['form']['data_type']['value']['1']['0'] != 'Text' )): ?>class="hiddenElement"<?php endif; ?>>
            <td title="hideDescTxt" class="label">&nbsp;</td>
            <td title="hideDescDef" class="html-adjust"><span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>If you want to provide a default value for this field, enter it here. For date fields, format is YYYY-MM-DD.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td>
        </tr>
        <tr class="crm-custom-field-form-block-help_pre">
            <td class="label"><?php echo $this->_tpl_vars['form']['help_pre']['label']; ?>
 <?php if ($this->_tpl_vars['action'] == 2): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/I18n/Dialog.tpl', 'smarty_include_vars' => array('table' => 'civicrm_custom_field','field' => 'help_pre','id' => $this->_tpl_vars['id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
            <td class="html-adjust"><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['help_pre']['html'])) ? $this->_run_mod_handler('crmAddClass', true, $_tmp, 'huge') : smarty_modifier_crmAddClass($_tmp, 'huge')); ?>
</td>
        </tr>
        <tr class="crm-custom-field-form-block-help_post">
            <td class="label"><?php echo $this->_tpl_vars['form']['help_post']['label']; ?>
 <?php if ($this->_tpl_vars['action'] == 2): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/I18n/Dialog.tpl', 'smarty_include_vars' => array('table' => 'civicrm_custom_field','field' => 'help_post','id' => $this->_tpl_vars['id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
            <td class="html-adjust"><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['help_post']['html'])) ? $this->_run_mod_handler('crmAddClass', true, $_tmp, 'huge') : smarty_modifier_crmAddClass($_tmp, 'huge')); ?>

                <?php if ($this->_tpl_vars['action'] != 4): ?>
                    <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Explanatory text displayed on back-end forms. Pre help is displayed inline on the form (above the field). Post help is displayed in a pop-up - users click the help balloon to view help text.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
                <?php endif; ?>
            </td>
        </tr>
        <tr class="crm-custom-field-form-block-is_required">
            <td class="label"><?php echo $this->_tpl_vars['form']['is_required']['label']; ?>
</td>
            <td class="html-adjust"><?php echo $this->_tpl_vars['form']['is_required']['html']; ?>

            <?php if ($this->_tpl_vars['action'] != 4): ?>
                <br /><span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Do not make custom fields required unless you want to force all users to enter a value anytime they add or edit this type of record. You can always make the field required when used in a specific Profile form.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
            <?php endif; ?>
            </td>
        </tr>
        <tr id ="searchable" class="crm-custom-field-form-block-is_searchable">
            <td class="label"><?php echo $this->_tpl_vars['form']['is_searchable']['label']; ?>
</td>
            <td class="html-adjust"><?php echo $this->_tpl_vars['form']['is_searchable']['html']; ?>

                <?php if ($this->_tpl_vars['action'] != 4): ?>
                    <br /><span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Can you search on this field in the Advanced and component search forms? Also determines whether you can include this field as a display column and / or filter in related detail reports.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
                <?php endif; ?>
            </td>
        </tr>
        <tr id="searchByRange" class="crm-custom-field-form-block-is_search_range">
      <td class="label"><?php echo $this->_tpl_vars['form']['is_search_range']['label']; ?>
</td>
            <td class="html-adjust"><?php echo $this->_tpl_vars['form']['is_search_range']['html']; ?>
</td>
        </tr>
        <tr class="crm-custom-field-form-block-is_active">
            <td class="label"><?php echo $this->_tpl_vars['form']['is_active']['label']; ?>
</td>
            <td class="html-adjust"><?php echo $this->_tpl_vars['form']['is_active']['html']; ?>
</td>
        </tr>
        <tr class="crm-custom-field-form-block-is_view">
            <td class="label"><?php echo $this->_tpl_vars['form']['is_view']['label']; ?>
</td>
            <td class="html-adjust"><?php echo $this->_tpl_vars['form']['is_view']['html']; ?>

                <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Is this field set by PHP code (via a custom hook). This field will not be updated by CiviCRM.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
            </td>
        </tr>
    </table>
         <?php if ($this->_tpl_vars['action'] != 4): ?>
         <div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
      <?php else: ?>
         <div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
      <?php endif; ?>     </div>
<?php echo '
<script type="text/javascript">
  CRM.$(function($) {
    var $form = $(\'form.'; ?>
<?php echo $this->_tpl_vars['form']['formClass']; ?>
<?php echo '\'),
      deprecatedNotice;
    function deprecatedWidgets() {
      deprecatedNotice && deprecatedNotice.close && deprecatedNotice.close();
      switch ($(\'#data_type_1\', $form).val()) {
        case \'AdvMulti-Select\':
          deprecatedNotice = CRM.alert('; ?>
'<?php $this->_tag_stack[] = array('ts', array('escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>The old "Advance Multi-Select" widget is being phased out and will be removed in a future version of CiviCRM. "Multi-Select" is the recommended substitute.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>', '<?php $this->_tag_stack[] = array('ts', array('escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Obsolete widget<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>'<?php echo ', \'alert\', {expires: 0});
          break;
      }
    }
    $(\'#data_type_1\', $form).each(deprecatedWidgets).change(deprecatedWidgets);
  });

    //when page is reload, build show hide boxes
    //as per data type and html type selected.
    custom_option_html_type( );

    function showSearchRange(chkbox) {
        var html_type = document.getElementsByName("data_type[1]")[0].value;
      var data_type = document.getElementsByName("data_type[0]")[0].value;

        if ( ((data_type == 1 || data_type == 2 || data_type == 3) && (html_type == "Text")) || data_type == 5) {
            if (chkbox.checked) {
            document.getElementsByName("is_search_range")[0].checked = true;
                cj("#searchByRange").show();
            } else {
                clearSearchBoxes( );
            }
        }
    }

    //should not clear search boxes for update mode.
    function clearSearchBoxes( ) {
      document.getElementsByName("is_searchable")[0].checked   = false;
      document.getElementsByName("is_search_range")[1].checked = true;
        cj("#searchByRange").hide();
    }

    function toggleContactRefFilter(setSelected) {
      if ( !setSelected ) {
        setSelected =  cj(\'#filter_selected\').val();
      } else {
        cj(\'#filter_selected\').val(setSelected);
      }
      if ( setSelected == \'Advance\' ) {
        cj(\'#contact_reference_group\').hide( );
        cj(\'#field_advance_filter\').show( );
      } else {
        cj(\'#field_advance_filter\').hide( );
        cj(\'#contact_reference_group\').show( );
      }
    }
</script>
'; ?>

<?php if ($this->_tpl_vars['action'] == 2 && ( $this->_tpl_vars['form']['data_type']['value']['1']['0'] == 'CheckBox' || ( $this->_tpl_vars['form']['data_type']['value']['1']['0'] == 'Radio' && $this->_tpl_vars['form']['data_type']['value']['0']['0'] != 6 ) || $this->_tpl_vars['form']['data_type']['value']['1']['0'] == 'Select' || ( $this->_tpl_vars['form']['data_type']['value']['1']['0'] == 'Multi-Select' && $this->_tpl_vars['dontShowLink'] != 1 ) )): ?>
    <div class="action-link">
      <?php $this->_tag_stack[] = array('crmButton', array('p' => "civicrm/admin/custom/group/field/option",'q' => "reset=1&action=browse&fid=".($this->_tpl_vars['id'])."&gid=".($this->_tpl_vars['gid']),'icon' => 'pencil')); $_block_repeat=true;smarty_block_crmButton($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>View / Edit Multiple Choice Options<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmButton($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    </div>
<?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>