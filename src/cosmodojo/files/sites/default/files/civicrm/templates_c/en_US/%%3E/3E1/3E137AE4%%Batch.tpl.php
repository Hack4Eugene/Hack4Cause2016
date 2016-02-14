<?php /* Smarty version 2.6.27, created on 2016-02-14 08:32:11
         compiled from CRM/Event/Form/Task/Batch.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Event/Form/Task/Batch.tpl', 1, false),array('block', 'ts', 'CRM/Event/Form/Task/Batch.tpl', 30, false),array('function', 'help', 'CRM/Event/Form/Task/Batch.tpl', 31, false),array('function', 'cycle', 'CRM/Event/Form/Task/Batch.tpl', 61, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><div class="batch-update crm-block crm-form-block crm-event-batch-form-block">
<fieldset>
<div id="help">
    <?php if ($this->_tpl_vars['context'] == 'statusChange'): ?>         <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Update the status for each participant individually, OR change all statuses to:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        <?php echo $this->_tpl_vars['form']['status_change']['html']; ?>
  <?php echo smarty_function_help(array('id' => "id-status_change"), $this);?>

        <div class="status">
          <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Participants whose status is changed FROM Pending Pay Later TO Registered or Attended will receive a confirmation email and their payment status will be set to completed. If this is not what you want to do, you can change their participant status by editing their event registration record directly.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </div>
        <?php if ($this->_tpl_vars['notifyingStatuses']): ?>
          <div class="status">
            <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['notifyingStatuses'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Participants whose status is changed TO any of the following will be automatically notified via email: %1.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
          </div>
        <?php endif; ?>
    <?php else: ?>
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Update field values for each participant as needed. To set a field to the same value for ALL rows, enter that value for the first participation and then click the <strong>Copy icon</strong> (next to the column title).<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    <?php endif; ?>
    <p><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Click <strong>Update Participant(s)</strong> below to save all your changes.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
</div>
    <legend><?php echo $this->_tpl_vars['profileTitle']; ?>
</legend>
        <table class="crm-copy-fields">
       <thead class="sticky">
            <tr class="columnheader">
             <?php $_from = $this->_tpl_vars['readOnlyFields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fName'] => $this->_tpl_vars['fTitle']):
?>
              <td><?php echo $this->_tpl_vars['fTitle']; ?>
</td>
           <?php endforeach; endif; unset($_from); ?>

             <td><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Event<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
             <?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fieldName'] => $this->_tpl_vars['field']):
?>
                <td><img  src="<?php echo $this->_tpl_vars['config']->resourceBase; ?>
i/copy.png" alt="<?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['field']['title'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Click to copy %1 from row one to all rows.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" fname="<?php echo $this->_tpl_vars['field']['name']; ?>
" class="action-icon" title="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Click here to copy the value in row one to ALL rows.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" /><?php echo $this->_tpl_vars['field']['title']; ?>
</td>
             <?php endforeach; endif; unset($_from); ?>

         </tr>
         </thead>
            <?php $_from = $this->_tpl_vars['componentIds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pid']):
?>
             <tr class="<?php echo smarty_function_cycle(array('values' => "odd-row,even-row"), $this);?>
" entity_id="<?php echo $this->_tpl_vars['pid']; ?>
">
        <?php $_from = $this->_tpl_vars['readOnlyFields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fName'] => $this->_tpl_vars['fTitle']):
?>
           <td><?php echo $this->_tpl_vars['contactDetails'][$this->_tpl_vars['pid']][$this->_tpl_vars['fName']]; ?>
</td>
        <?php endforeach; endif; unset($_from); ?>

              <td class="crm-event-title"><?php echo $this->_tpl_vars['details'][$this->_tpl_vars['pid']]['title']; ?>
</td>
              <?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fieldName'] => $this->_tpl_vars['field']):
?>
                <?php $this->assign('n', $this->_tpl_vars['field']['name']); ?>
                <?php if (( $this->_tpl_vars['fields'][$this->_tpl_vars['n']]['data_type'] == 'Date' ) || ( $this->_tpl_vars['n'] == 'participant_register_date' )): ?>
                   <td class="compressed"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/jcalendar.tpl", 'smarty_include_vars' => array('elementName' => $this->_tpl_vars['n'],'elementIndex' => $this->_tpl_vars['pid'],'batchUpdate' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
                <?php else: ?>
                  <td class="compressed"><?php echo $this->_tpl_vars['form']['field'][$this->_tpl_vars['pid']][$this->_tpl_vars['n']]['html']; ?>
</td>
                <?php endif; ?>
              <?php endforeach; endif; unset($_from); ?>
             </tr>
            <?php endforeach; endif; unset($_from); ?>
           </tr>
           <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td> <?php if ($this->_tpl_vars['fields']): ?><?php echo $this->_tpl_vars['form']['_qf_Batch_refresh']['html']; ?>
<?php endif; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
              </td>
           </tr>
         </table>

</fieldset>
</div>

<?php if ($this->_tpl_vars['context'] == 'statusChange'): ?> <?php echo '
<script type="text/javascript">
/**
 * Function to update participant status
 */
CRM.$(function($) {
   $(\'#status_change\').change( function() {
      if ( $(this).val() ) {
        $(\'.crm-copy-fields [name^="field["][name*="[participant_status]"]\').val( $(this).val() );
      }
   });

});
</script>
'; ?>

<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/batchCopy.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>