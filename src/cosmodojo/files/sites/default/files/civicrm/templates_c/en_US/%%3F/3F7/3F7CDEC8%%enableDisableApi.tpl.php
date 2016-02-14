<?php /* Smarty version 2.6.27, created on 2016-02-14 08:31:02
         compiled from CRM/common/enableDisableApi.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/common/enableDisableApi.tpl', 1, false),array('block', 'ts', 'CRM/common/enableDisableApi.tpl', 34, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo '
<script type="text/javascript">
  CRM.$(function($) {
    var $a, $row, info, enabled, fieldLabel;

    function successMsg() {
      '; ?>
       var msg = enabled ? '<?php $this->_tag_stack[] = array('ts', array('escape' => 'js','1' => "<em>%1</em>")); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>%1 Disabled<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>' : '<?php $this->_tag_stack[] = array('ts', array('escape' => 'js','1' => "<em>%1</em>")); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>%1 Enabled<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>'<?php echo ';
      return ts(msg, {1: fieldLabel});
    }

    function refresh() {
      $a.trigger(\'crmPopupFormSuccess\');
      CRM.refreshParent($row);
    }

    function save() {
      $row.closest(\'table\').block();
      CRM.api3(info.entity, info.action, {id: info.id, field: \'is_active\', value: enabled ? 0 : 1}, {success: successMsg}).done(refresh);
    }

    function checkResponse(e, response) {
      if (response.illegal) {
        $(this).dialog(\'option\', \'buttons\', [
          {text: '; ?>
'<?php $this->_tag_stack[] = array('ts', array('escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Close<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>'<?php echo ', click: function() {$(this).dialog(\'close\');}, icons: {primary: \'ui-icon-close\'}}
        ]);
      }
    }

    function enableDisable() {
      $a = $(this);
      $row = $a.closest(\'.crm-entity\');
      info = $a.crmEditableEntity();
      fieldLabel = info.label || info.title || info.display_name || info.name || '; ?>
'<?php $this->_tag_stack[] = array('ts', array('escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Record<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>'<?php echo ';
      enabled = !$row.hasClass(\'disabled\');
      if (enabled) {
        CRM.confirm({
          url: CRM.url(\'civicrm/ajax/statusmsg\', {entity: info.entity, id: info.id}),
          title: ts(\''; ?>
<?php $this->_tag_stack[] = array('ts', array('escape' => 'js','1' => '%1')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Disable %1<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '\', {1: fieldLabel}),
          options: {'; ?>
yes: '<?php $this->_tag_stack[] = array('ts', array('escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Yes<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>', no: '<?php $this->_tag_stack[] = array('ts', array('escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>No<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>'<?php echo '},
          width: 300,
          height: \'auto\'
        })
          .on(\'crmLoad\', checkResponse)
          .on(\'crmConfirm:yes\', save);
      } else {
        save();
      }
      return false;
    }

    // Because this is an inline script it may get added to the document more than once, so remove handler before adding
    $(\'body\')
      .off(\'.crmEnableDisable\')
      .on(\'click.crmEnableDisable\', \'.action-item.crm-enable-disable\', enableDisable);
  });
</script>
'; ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>