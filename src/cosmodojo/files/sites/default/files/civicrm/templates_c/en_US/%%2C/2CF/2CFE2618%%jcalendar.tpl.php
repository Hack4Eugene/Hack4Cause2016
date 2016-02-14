<?php /* Smarty version 2.6.27, created on 2016-02-14 08:31:02
         compiled from CRM/common/jcalendar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/common/jcalendar.tpl', 1, false),array('block', 'ts', 'CRM/common/jcalendar.tpl', 69, false),array('modifier', 'cat', 'CRM/common/jcalendar.tpl', 28, false),array('modifier', 'crmAddClass', 'CRM/common/jcalendar.tpl', 42, false),array('modifier', 'uniqid', 'CRM/common/jcalendar.tpl', 53, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php if ($this->_tpl_vars['batchUpdate']): ?>
    <?php $this->assign('elementId', $this->_tpl_vars['form']['field'][$this->_tpl_vars['elementIndex']][$this->_tpl_vars['elementName']]['id']); ?>
    <?php $this->assign('tElement', ((is_array($_tmp=$this->_tpl_vars['elementName'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_time') : smarty_modifier_cat($_tmp, '_time'))); ?>
    <?php $this->assign('timeElement', "field_".($this->_tpl_vars['elementIndex'])."_".($this->_tpl_vars['elementName'])."_time"); ?>
    <?php echo $this->_tpl_vars['form']['field'][$this->_tpl_vars['elementIndex']][$this->_tpl_vars['elementName']]['html']; ?>

<?php elseif ($this->_tpl_vars['elementIndex']): ?>
    <?php $this->assign('elementId', $this->_tpl_vars['form'][$this->_tpl_vars['elementName']][$this->_tpl_vars['elementIndex']]['id']); ?>
    <?php $this->assign('timeElement', ((is_array($_tmp=$this->_tpl_vars['elementName'])) ? $this->_run_mod_handler('cat', true, $_tmp, "_time.".($this->_tpl_vars['elementIndex'])) : smarty_modifier_cat($_tmp, "_time.".($this->_tpl_vars['elementIndex'])))); ?>
    <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['elementName']][$this->_tpl_vars['elementIndex']]['html']; ?>

<?php elseif ($this->_tpl_vars['blockId'] && $this->_tpl_vars['blockSection']): ?>
    <?php $this->assign('elementId', $this->_tpl_vars['form'][$this->_tpl_vars['blockSection']][$this->_tpl_vars['blockId']][$this->_tpl_vars['elementName']]['id']); ?>
    <?php $this->assign('tElement', ($this->_tpl_vars['elementName'])."_time"); ?>
    <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['blockSection']][$this->_tpl_vars['blockId']][$this->_tpl_vars['elementName']]['html']; ?>

    <?php $this->assign('timeElement', ($this->_tpl_vars['blockSection'])."_".($this->_tpl_vars['blockId'])."_".($this->_tpl_vars['elementName'])."_time"); ?>
    <?php if ($this->_tpl_vars['tElement']): ?>
      &nbsp;&nbsp;<?php echo $this->_tpl_vars['form'][$this->_tpl_vars['blockSection']][$this->_tpl_vars['blockId']][$this->_tpl_vars['tElement']]['label']; ?>

      &nbsp;&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['form'][$this->_tpl_vars['blockSection']][$this->_tpl_vars['blockId']][$this->_tpl_vars['tElement']]['html'])) ? $this->_run_mod_handler('crmAddClass', true, $_tmp, 'six') : smarty_modifier_crmAddClass($_tmp, 'six')); ?>

    <?php endif; ?>
<?php else: ?>
    <?php if (! $this->_tpl_vars['elementId']): ?>
      <?php $this->assign('elementId', $this->_tpl_vars['form'][$this->_tpl_vars['elementName']]['id']); ?>
    <?php endif; ?>
    <?php $this->assign('timeElement', ((is_array($_tmp=$this->_tpl_vars['elementName'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_time') : smarty_modifier_cat($_tmp, '_time'))); ?>
    <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['elementName']]['html']; ?>

<?php endif; ?>

<?php $this->assign('displayDate', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['elementId'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_display') : smarty_modifier_cat($_tmp, '_display')))) ? $this->_run_mod_handler('cat', true, $_tmp, "_".($this->_tpl_vars['string'])) : smarty_modifier_cat($_tmp, "_".($this->_tpl_vars['string']))))) ? $this->_run_mod_handler('uniqid', true, $_tmp) : uniqid($_tmp))); ?>

<?php if ($this->_tpl_vars['action'] != 1028): ?>
    <input type="text" name="<?php echo $this->_tpl_vars['displayDate']; ?>
" id="<?php echo $this->_tpl_vars['displayDate']; ?>
" class="dateplugin" autocomplete="off"/>
<?php endif; ?>

<?php if ($this->_tpl_vars['batchUpdate'] && $this->_tpl_vars['timeElement'] && $this->_tpl_vars['tElement']): ?>
    &nbsp;&nbsp;<?php echo $this->_tpl_vars['form']['field'][$this->_tpl_vars['elementIndex']][$this->_tpl_vars['tElement']]['label']; ?>
&nbsp;&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['form']['field'][$this->_tpl_vars['elementIndex']][$this->_tpl_vars['tElement']]['html'])) ? $this->_run_mod_handler('crmAddClass', true, $_tmp, 'six') : smarty_modifier_crmAddClass($_tmp, 'six')); ?>

<?php elseif ($this->_tpl_vars['timeElement'] && ! $this->_tpl_vars['tElement']): ?>
    <?php if ($this->_tpl_vars['form'][$this->_tpl_vars['timeElement']]['label']): ?>
      &nbsp;&nbsp;<?php echo $this->_tpl_vars['form'][$this->_tpl_vars['timeElement']]['label']; ?>
&nbsp;&nbsp;
    <?php endif; ?>
    <?php echo ((is_array($_tmp=$this->_tpl_vars['form'][$this->_tpl_vars['timeElement']]['html'])) ? $this->_run_mod_handler('crmAddClass', true, $_tmp, 'six') : smarty_modifier_crmAddClass($_tmp, 'six')); ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['action'] != 1028): ?>
    <a href="#" class="crm-hover-button crm-clear-link" title="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Clear<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"><span class="icon ui-icon-close"></span></a>
<?php endif; ?>

<script type="text/javascript">
    <?php echo '
    CRM.$(function($) {
      '; ?>

      // Workaround for possible duplicate ids in the dom - select by name instead of id and exclude already initialized widgets
      var $dateElement = $('input[name=<?php echo $this->_tpl_vars['displayDate']; ?>
].dateplugin:not(.hasDatepicker)');
      <?php echo '
      if (!$dateElement.length) {
        return;
      }
      '; ?>

      <?php if ($this->_tpl_vars['timeElement']): ?>
        var $timeElement = $dateElement.siblings("#<?php echo $this->_tpl_vars['timeElement']; ?>
");
        var time_format = $timeElement.attr('timeFormat');
          <?php echo '
            $timeElement.timeEntry({ show24Hours : time_format, spinnerImage: \'\' });
          '; ?>

      <?php else: ?>
        var $timeElement = $();
      <?php endif; ?>
      var currentYear = new Date().getFullYear(),
        $originalElement = $dateElement.siblings('#<?php echo $this->_tpl_vars['elementId']; ?>
').hide(),
        date_format = $originalElement.attr('format'),
        altDateFormat = 'mm/dd/yy';
      <?php echo '

      if ( !( ( date_format == \'M yy\' ) || ( date_format == \'yy\' ) || ( date_format == \'yy-mm\' ) ) ) {
          $dateElement.addClass( \'dpDate\' );
      }

      var yearRange = (currentYear - parseInt($originalElement.attr(\'startOffset\'))) +
        \':\' + currentYear + parseInt($originalElement.attr(\'endOffset\')),
        startRangeYr = currentYear - parseInt($originalElement.attr(\'startOffset\')),
        endRangeYr = currentYear + parseInt($originalElement.attr(\'endOffset\'));

      $dateElement.datepicker({
        closeAtTop: true,
        dateFormat: date_format,
        changeMonth: (date_format.indexOf(\'m\') > -1),
        changeYear: (date_format.indexOf(\'y\') > -1),
        altField: $originalElement,
        altFormat: altDateFormat,
        yearRange: yearRange,
        minDate: new Date(startRangeYr, 1 - 1, 1),
        maxDate: new Date(endRangeYr, 12 - 1, 31)
      });

      // format display date
      var displayDateValue = $.datepicker.formatDate(date_format, $.datepicker.parseDate(altDateFormat, $originalElement.val()));
      //support unsaved-changes warning: CRM-14353
      $dateElement.val(displayDateValue).data(\'crm-initial-value\', displayDateValue);

      // Add clear button
      $($timeElement).add($originalElement).add($dateElement).on(\'blur change\', function() {
        var vis = $dateElement.val() || $timeElement.val() ? \'\' : \'hidden\';
        $dateElement.siblings(\'.crm-clear-link\').css(\'visibility\', vis);
      });
      $originalElement.change();
    });

    '; ?>

</script>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>