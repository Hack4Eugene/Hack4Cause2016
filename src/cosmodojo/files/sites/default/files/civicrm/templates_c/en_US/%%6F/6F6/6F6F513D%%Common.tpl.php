<?php /* Smarty version 2.6.27, created on 2016-02-14 08:31:32
         compiled from CRM/Event/Form/Search/Common.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Event/Form/Search/Common.tpl', 1, false),array('block', 'ts', 'CRM/Event/Form/Search/Common.tpl', 36, false),array('modifier', 'crmAddClass', 'CRM/Event/Form/Search/Common.tpl', 28, false),array('function', 'help', 'CRM/Event/Form/Search/Common.tpl', 53, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><tr>
  <td class="crm-event-form-block-event_id">
      <?php echo $this->_tpl_vars['form']['event_id']['label']; ?>
  <br /><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['event_id']['html'])) ? $this->_run_mod_handler('crmAddClass', true, $_tmp, 'huge') : smarty_modifier_crmAddClass($_tmp, 'huge')); ?>

      <div class="crm-event-form-block-event_include_repeating_events">
        <?php echo $this->_tpl_vars['form']['event_include_repeating_events']['label']; ?>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['form']['event_include_repeating_events']['html']; ?>

      </div>
  </td>
  <td class="crm-event-form-block-event_type_id"> <?php echo $this->_tpl_vars['form']['event_type_id']['label']; ?>
<br /><?php echo $this->_tpl_vars['form']['event_type_id']['html']; ?>
 </td>
</tr>
<tr>
  <td colspan="2"><label><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Event Dates<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label></td>
</tr>
<tr>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Core/DateRange.tpl", 'smarty_include_vars' => array('fieldName' => 'event','from' => '_start_date_low','to' => '_end_date_high')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</tr>
<tr>
  <td class="crm-event-form-block-participant_status"><label><?php echo $this->_tpl_vars['form']['participant_status_id']['label']; ?>
</label>
    <br />
    <?php echo $this->_tpl_vars['form']['participant_status_id']['html']; ?>

  </td>
  <td class="crm-event-form-block-participant_role_id"><label><?php echo $this->_tpl_vars['form']['participant_role_id']['label']; ?>
</label>
    <br />
    <?php echo $this->_tpl_vars['form']['participant_role_id']['html']; ?>

  </td>
</tr>
<tr>
  <td class="crm-event-form-block-participant_test">
  <?php echo $this->_tpl_vars['form']['participant_test']['label']; ?>
 <?php echo smarty_function_help(array('id' => "is-test",'file' => "CRM/Contact/Form/Search/Advanced"), $this);?>

    &nbsp; <?php echo $this->_tpl_vars['form']['participant_test']['html']; ?>

  </td>
  <td class="crm-event-form-block-participant_pay_later">
  <?php echo $this->_tpl_vars['form']['participant_is_pay_later']['label']; ?>
 <?php echo $this->_tpl_vars['form']['participant_is_pay_later']['html']; ?>

  </td>
</tr>
<tr>
  <td class="crm-event-form-block-participant_fee_id">
    <?php echo $this->_tpl_vars['form']['participant_fee_id']['label']; ?>
<br /><?php echo $this->_tpl_vars['form']['participant_fee_id']['html']; ?>

  </td>
  <td class="crm-event-form-block-participant_fee_amount">
    <label><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Fee Amount<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label><br />
    <?php echo $this->_tpl_vars['form']['participant_fee_amount_low']['label']; ?>
 &nbsp; <?php echo $this->_tpl_vars['form']['participant_fee_amount_low']['html']; ?>
 &nbsp;&nbsp;
    <?php echo $this->_tpl_vars['form']['participant_fee_amount_high']['label']; ?>
 &nbsp; <?php echo $this->_tpl_vars['form']['participant_fee_amount_high']['html']; ?>

  </td>
</tr>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Campaign/Form/addCampaignToComponent.tpl", 'smarty_include_vars' => array('campaignContext' => 'componentSearch','campaignTrClass' => '','campaignTdClass' => 'crm-event-form-block-participant_campaign_id')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['participantGroupTree']): ?>
<tr>
  <td colspan="4">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Custom/Form/Search.tpl", 'smarty_include_vars' => array('groupTree' => $this->_tpl_vars['participantGroupTree'],'showHideLinks' => false)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </td>
</tr>
<?php endif; ?>

<?php echo '
<script type="text/javascript">
CRM.$(function($) {
  var recurringLabel = $(\'label[for=event_include_repeating_events]\').html();
  // Conditional rule for recurring checkbox
  function toggleRecurrigCheckbox() {
    var isRepeating = false;
    if ($(this).val()) {
      // Workaround: In some cases this code gets called before the select2 initialization.
      if (!$(this).data(\'select2\')) {
        $(this).crmEntityRef();
      }
      isRepeating = $(this).select2(\'data\').extra.is_recur;
    }
    if (isRepeating) {
      $(\'.crm-event-form-block-event_include_repeating_events\').show();
      $(\'label[for=event_include_repeating_events]\').html(recurringLabel.replace(\'%1\', $(this).select2(\'data\').label));
    } else {
      $(\'.crm-event-form-block-event_include_repeating_events\').hide().find(\'input\').prop(\'checked\', false);
    }
  }
  $(\'#event_id\').each(toggleRecurrigCheckbox).change(toggleRecurrigCheckbox);

  // FIXME: This could be much simpler as an entityRef field but the priceFieldValue api doesn\'t currently support the filters we need
  $(\'#participant_fee_id\').crmSelect2({
    placeholder: '; ?>
'<?php $this->_tag_stack[] = array('ts', array('escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>- any -<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>'<?php echo ',
    minimumInputLength: 1,
    allowClear: true,
    ajax: {
      url: "'; ?>
<?php echo $this->_tpl_vars['dataURLEventFee']; ?>
<?php echo '",
      data: function(term) {
        return {term: term};
      },
      results: function(response) {
        return {results: response};
      }
    },
    initSelection: function(el, callback) {
      CRM.api3(\'price_field_value\', \'getsingle\', {id: $(el).val()}).done(function(data) {
        callback({id: data.id, text: data.label});
      });
    }
  });
});
</script>
'; ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>