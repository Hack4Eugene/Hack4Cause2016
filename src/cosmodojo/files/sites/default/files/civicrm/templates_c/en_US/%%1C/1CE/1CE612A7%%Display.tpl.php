<?php /* Smarty version 2.6.27, created on 2016-02-14 08:41:22
         compiled from CRM/Admin/Form/Preferences/Display.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Admin/Form/Preferences/Display.tpl', 1, false),array('block', 'ts', 'CRM/Admin/Form/Preferences/Display.tpl', 38, false),array('function', 'crmURL', 'CRM/Admin/Form/Preferences/Display.tpl', 37, false),array('function', 'help', 'CRM/Admin/Form/Preferences/Display.tpl', 148, false),array('function', 'docURL', 'CRM/Admin/Form/Preferences/Display.tpl', 176, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><div class="crm-block crm-form-block crm-preferences-display-form-block">
  <div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'top')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
  <table class="form-layout">
    <tr class="crm-preferences-display-form-block-contact_view_options">
      <td class="label"><?php echo $this->_tpl_vars['form']['contact_view_options']['label']; ?>
</td>
      <td><?php echo $this->_tpl_vars['form']['contact_view_options']['html']; ?>
</td>
    </tr>
    <tr class="crm-preferences-display-form-block-description">
      <td>&nbsp;</td>
      <td class="description">
        <?php ob_start(); ?><?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/admin/setting/component','q' => 'action=add&reset=1'), $this);?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('crmURL', ob_get_contents());ob_end_clean(); ?>
        <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['crmURL'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Select the <strong>tabs</strong>
          that should be displayed when viewing a contact record. EXAMPLE: If your organization does not keep track of
          'Relationships', then un-check this option to simplify the screen display. Tabs for Contributions, Pledges,
          Memberships, Events, Grants and Cases are also hidden if the corresponding component is not enabled. Go to
          <a href="%1">Administer > System Settings > Enable Components</a>
          to modify the components which are available for your site.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
      </td>
    </tr>
    <tr class="crm-preferences-display-form-block-contact_smart_group_display">
      <td class="label"><?php echo $this->_tpl_vars['form']['contact_smart_group_display']['label']; ?>
</td>
      <td><?php echo $this->_tpl_vars['form']['contact_smart_group_display']['html']; ?>
</td>
    </tr>
    <tr class="crm-preferences-display-form-block-description">
      <td>&nbsp;</td>
      <td class="description">
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Controls display of the smart groups that a contact is part of in each contact's "Groups" tab. "Show on Demand" provides the best performance, and is recommended for most sites.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
      </td>
    </tr>
    <tr class="crm-preferences-display-form-block-contact_edit_options">
      <td class="label"><?php echo $this->_tpl_vars['form']['contact_edit_options']['label']; ?>
</td>
      <td>
        <table style="width:90%">
          <tr>
            <td style="width:30%">
              <span class="label"><strong><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Individual Name Fields<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></strong></span>
              <ul id="contactEditNameFields">
                <?php $_from = $this->_tpl_vars['nameFields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['opId'] => $this->_tpl_vars['title']):
?>
                  <li id="preference-<?php echo $this->_tpl_vars['opId']; ?>
-contactedit" class="ui-state-default ui-corner-all"
                      style="padding-left:1px;">
                    <span><?php echo $this->_tpl_vars['form']['contact_edit_options'][$this->_tpl_vars['opId']]['html']; ?>
</span>
                  </li>
                <?php endforeach; endif; unset($_from); ?>
              </ul>
            </td>
            <td style="width:30%">
              <span class="label"><strong><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Contact Details<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></strong></span>
              <ul id="contactEditBlocks">
                <?php $_from = $this->_tpl_vars['contactBlocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['opId'] => $this->_tpl_vars['title']):
?>
                  <li id="preference-<?php echo $this->_tpl_vars['opId']; ?>
-contactedit" class="ui-state-default ui-corner-all"
                      style="padding-left:1px;">
                    <span class='ui-icon ui-icon-arrowthick-2-n-s' style="float:left;"></span>
                    <span><?php echo $this->_tpl_vars['form']['contact_edit_options'][$this->_tpl_vars['opId']]['html']; ?>
</span>
                  </li>
                <?php endforeach; endif; unset($_from); ?>
              </ul>
            </td>
            <td>
              <span class="label"><strong><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Other Panes<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></strong></span>
              <ul id="contactEditOptions">
                <?php $_from = $this->_tpl_vars['editOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['opId'] => $this->_tpl_vars['title']):
?>
                  <li id="preference-<?php echo $this->_tpl_vars['opId']; ?>
-contactedit" class="ui-state-default ui-corner-all"
                      style="padding-left:1px;">
                    <span class='ui-icon ui-icon-arrowthick-2-n-s' style="float:left;"></span>
                    <span><?php echo $this->_tpl_vars['form']['contact_edit_options'][$this->_tpl_vars['opId']]['html']; ?>
</span>
                  </li>
                <?php endforeach; endif; unset($_from); ?>
              </ul>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr class="crm-preferences-display-form-block-description">
      <td>&nbsp;</td>
      <td class="description">
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Select the sections that should be included when adding or editing a contact record. EXAMPLE: If your organization does not record Gender and Birth Date for individuals, then simplify the form by un-checking this option. Drag interface allows you to change the order of the panes displayed on contact add/edit screen.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
      </td>
    </tr>
    <tr class="crm-preferences-display-form-block-advanced_search_options">
      <td class="label"><?php echo $this->_tpl_vars['form']['advanced_search_options']['label']; ?>
</td>
      <td><?php echo $this->_tpl_vars['form']['advanced_search_options']['html']; ?>
</td>
    </tr>
    <tr class="crm-preferences-display-form-block-description">
      <td>&nbsp;</td>
      <td class="description">
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Select the sections that should be included in the Basic and Advanced Search forms. EXAMPLE: If you don't track Relationships - then you do not need this section included in the advanced search form. Simplify the form by un-checking this option.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
      </td>
    </tr>
    <tr class="crm-preferences-display-form-block-contact_ajax_check_similar">
      <td class="label"></td>
      <td><?php echo $this->_tpl_vars['form']['contact_ajax_check_similar']['html']; ?>
 <?php echo $this->_tpl_vars['form']['contact_ajax_check_similar']['label']; ?>
</td>
    </tr>
    <tr class="crm-preferences-display-form-block-description">
      <td>&nbsp;</td>
      <td class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>When enabled, checks for contacts with similar names as the user types values into the contact form name fields.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
      </td>
    </tr>
    <tr class="crm-preferences-display-form-block-activity_assignee_notification">
      <td class="label"></td>
      <td><?php echo $this->_tpl_vars['form']['activity_assignee_notification']['html']; ?>
 <?php echo $this->_tpl_vars['form']['activity_assignee_notification']['label']; ?>
</td>
    </tr>
    <tr class="crm-preferences-display-form-block-description">
      <td>&nbsp;</td>
      <td class="description">
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>When enabled, contacts who are assigned activities will automatically receive an email notification with a copy of the activity.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
      </td>
    </tr>

    <tr class="crm-preferences-display-form-block-activity_assignee_notification_ics">
      <td class="label"></td>
      <td><?php echo $this->_tpl_vars['form']['activity_assignee_notification_ics']['html']; ?>
 <?php echo $this->_tpl_vars['form']['activity_assignee_notification_ics']['label']; ?>
</td>
    </tr>
    <tr class="crm-preferences-display-form-block-description">
      <td>&nbsp;</td>
      <td class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>When enabled, the assignee notification sent out above will also include an ical meeting invite.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
      </td>
    </tr>

    <tr class="crm-preferences-display-form-block-user_dashboard_options">
      <td class="label"><?php echo $this->_tpl_vars['form']['user_dashboard_options']['label']; ?>
</td>
      <td><?php echo $this->_tpl_vars['form']['user_dashboard_options']['html']; ?>
<span id="invoice_help">  <?php echo smarty_function_help(array('id' => "id-invoices_id"), $this);?>
</span></td>
    </tr>
    <tr class="crm-preferences-display-form-block-description">
      <td>&nbsp;</td>
      <td class="description">
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Select the sections that should be included in the Contact Dashboard. EXAMPLE: If you don't want constituents to view their own contribution history, un-check that option.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
      </td>
    </tr>
    <tr class="crm-preferences-display-form-block-editor_id">
      <td class="label"><?php echo $this->_tpl_vars['form']['editor_id']['label']; ?>
</td>
      <td><?php echo $this->_tpl_vars['form']['editor_id']['html']; ?>
</td>
    </tr>
    <?php if ($this->_tpl_vars['form']['wysiwyg_input_format']['html']): ?>
      <tr id="crm-preferences-display-form-block-wysiwyg_input_format" style="display:none;">
        <td class="label"><?php echo $this->_tpl_vars['form']['wysiwyg_input_format']['label']; ?>
</td>
        <td>
          <?php echo $this->_tpl_vars['form']['wysiwyg_input_format']['html']; ?>
<?php echo '
            <script type="text/javascript">
              CRM.$(function($) {
                if ($(\'#editor_id\').val() == 4) {
                  $(\'#crm-preferences-display-form-block-wysiwyg_input_format\').show();
                }
              });
            </script>
          '; ?>

          <br/>
          <span class="description">
            <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>You will need to enable and configure several modules if you want to allow users to upload images while using a Drupal Default Editor.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
            <?php echo smarty_function_docURL(array('page' => 'Configuring CiviCRM to Use the Default Drupal Editor','resource' => 'wiki'), $this);?>

          </span>
        </td>
      </tr>
    <?php endif; ?>
    <tr class="crm-preferences-display-form-block-description">
      <td>&nbsp;</td>
      <td class="description">
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Select the HTML WYSIWYG Editor provided for fields that allow HTML formatting. Select 'Textarea' if you don't want to provide a WYSIWYG Editor (users will type text and / or HTML code into plain text fields).<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <?php echo smarty_function_help(array('id' => "id-editor_id"), $this);?>

      </td>
    </tr>
    <tr class="crm-preferences-display-form-block-ajaxPopupsEnabled">
      <td class="label"><?php echo $this->_tpl_vars['form']['ajaxPopupsEnabled']['label']; ?>
</td>
      <td><?php echo $this->_tpl_vars['form']['ajaxPopupsEnabled']['html']; ?>
</td>
    </tr>
    <tr class="crm-preferences-display-form-block-description">
      <td>&nbsp;</td>
      <td class="description">
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>If you disable this option, the CiviCRM interface will be limited to traditional browsing. Opening a form will refresh the page rather than opening a popup dialog.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
      </td>
    </tr>
    <tr class="crm-preferences-display-form-block-display_name_format">
      <td class="label"><?php echo $this->_tpl_vars['form']['display_name_format']['label']; ?>
</td>
      <td><?php echo $this->_tpl_vars['form']['display_name_format']['html']; ?>
</td>
    </tr>
    <tr class="crm-preferences-display-form-block-description">
      <td>&nbsp;</td>
      <td class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Display name format for individual contact display names.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
    </tr>
    <tr class="crm-preferences-display-form-block-sort_name_format">
      <td class="label"><?php echo $this->_tpl_vars['form']['sort_name_format']['label']; ?>
</td>
      <td><?php echo $this->_tpl_vars['form']['sort_name_format']['html']; ?>
</td>
    </tr>
    <tr class="crm-preferences-display-form-block-description">
      <td>&nbsp;</td>
      <td class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Sort name format for individual contact display names.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
    </tr>
  </table>
  <div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
</div>
<?php if ($this->_tpl_vars['form']['contact_edit_options']['html']): ?>
  <?php echo '
    <script type="text/javascript">
      CRM.$(function($) {
        function getSorting(e, ui) {
          var params = [];
          var y = 0;
          var items = $("#contactEditBlocks li");
          if (items.length > 0) {
            for (var y = 0; y < items.length; y++) {
              var idState = items[y].id.split(\'-\');
              params[y + 1] = idState[1];
            }
          }

          items = $("#contactEditOptions li");
          if (items.length > 0) {
            for (var x = 0; x < items.length; x++) {
              var idState = items[x].id.split(\'-\');
              params[x + y + 1] = idState[1];
            }
          }
          $(\'#contact_edit_preferences\').val(params.toString());
        }

        var invoicesKey = \''; ?>
<?php echo $this->_tpl_vars['invoicesKey']; ?>
<?php echo '\';
        var invoicing = \''; ?>
<?php echo $this->_tpl_vars['invoicing']; ?>
<?php echo '\';
        if (!invoicing) {
          $(\'#user_dashboard_options_\' + invoicesKey).attr("disabled", true);
        }
        $("#invoice_help").insertAfter("label[for=\'user_dashboard_options_" + invoicesKey + "\']");

        $("#contactEditBlocks, #contactEditOptions").sortable({
          placeholder: \'ui-state-highlight\',
          update: getSorting
        });
      });
    </script>
  '; ?>

<?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>