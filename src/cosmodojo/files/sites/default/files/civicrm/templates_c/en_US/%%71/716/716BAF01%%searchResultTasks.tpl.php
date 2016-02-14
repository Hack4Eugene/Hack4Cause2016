<?php /* Smarty version 2.6.27, created on 2016-02-14 08:31:43
         compiled from CRM/common/searchResultTasks.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/common/searchResultTasks.tpl', 1, false),array('block', 'ts', 'CRM/common/searchResultTasks.tpl', 32, false),array('function', 'help', 'CRM/common/searchResultTasks.tpl', 35, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<div id="search-status">
  <table class="form-layout-compressed">
  <tr>
    <td class="font-size12pt" style="width: 40%;">
    <?php if ($this->_tpl_vars['savedSearch']['name']): ?><?php echo $this->_tpl_vars['savedSearch']['name']; ?>
 (<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>smart group<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>) - <?php endif; ?>
    <?php $this->_tag_stack[] = array('ts', array('count' => $this->_tpl_vars['pager']->_totalItems,'plural' => '%count Results')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>%count Result<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php if ($this->_tpl_vars['selectorLabel']): ?>&nbsp;-&nbsp;<?php echo $this->_tpl_vars['selectorLabel']; ?>
<?php endif; ?>
    <?php if ($this->_tpl_vars['context'] == 'Event' && $this->_tpl_vars['participantCount'] && ( $this->_tpl_vars['pager']->_totalItems != $this->_tpl_vars['participantCount'] )): ?>
        <br /><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Actual participant count<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> : <?php echo $this->_tpl_vars['participantCount']; ?>
 <?php echo smarty_function_help(array('id' => "id-actual_participant_count",'file' => "CRM/Event/Form/Search/Results.hlp"), $this);?>
 &nbsp;
    <?php endif; ?>
    </td>
    <td>
                <?php if ($this->_tpl_vars['qill']): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/displaySearchCriteria.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
    </td>
  </tr>
<?php if ($this->_tpl_vars['context'] == 'Contribution'): ?>
  <tr>
    <td colspan="2">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Page/ContributionTotals.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </td>
  </tr>
<?php endif; ?>
  <tr>
    <td class="font-size11pt"> <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Select Records<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>:</td>
    <td class="nowrap">
      <?php echo $this->_tpl_vars['form']['radio_ts']['ts_all']['html']; ?>
 <label for="<?php echo $this->_tpl_vars['ts_all_id']; ?>
"><?php $this->_tag_stack[] = array('ts', array('count' => $this->_tpl_vars['pager']->_totalItems,'plural' => 'All %count records')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>The found record<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label> &nbsp; <?php if ($this->_tpl_vars['pager']->_totalItems > 1): ?> <?php echo $this->_tpl_vars['form']['radio_ts']['ts_sel']['html']; ?>
 <label for="<?php echo $this->_tpl_vars['ts_sel_id']; ?>
"><?php $this->_tag_stack[] = array('ts', array('1' => "<span></span>")); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>%1 Selected records only<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label><?php endif; ?>
    </td>
  </tr>
  <tr>
    <td colspan="2">
        <?php if (! empty ( $this->_tpl_vars['printButtonName'] )): ?>
       <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['printButtonName']]['html']; ?>
 &nbsp; &nbsp;
    <?php elseif (! empty ( $this->_tpl_vars['form']['_qf_Search_next_print'] )): ?>
       <?php echo $this->_tpl_vars['form']['_qf_Search_next_print']['html']; ?>
 &nbsp; &nbsp;
     <?php endif; ?>

      <span id='task-section'>
        <?php echo $this->_tpl_vars['form']['task']['html']; ?>

        <?php if ($this->_tpl_vars['actionButtonName']): ?>
          <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['actionButtonName']]['html']; ?>
 &nbsp; &nbsp;
        <?php else: ?>
          <?php echo $this->_tpl_vars['form']['_qf_Search_next_action']['html']; ?>

        <?php endif; ?>
      </span>
    </td>
  </tr>
  </table>
</div>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>