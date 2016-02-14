<?php /* Smarty version 2.6.27, created on 2016-02-14 08:30:30
         compiled from CRM/Custom/Page/CustomDataView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Custom/Page/CustomDataView.tpl', 1, false),array('block', 'ts', 'CRM/Custom/Page/CustomDataView.tpl', 40, false),array('modifier', 'cat', 'CRM/Custom/Page/CustomDataView.tpl', 33, false),array('modifier', 'crmMoney', 'CRM/Custom/Page/CustomDataView.tpl', 92, false),array('modifier', 'nl2br', 'CRM/Custom/Page/CustomDataView.tpl', 102, false),array('function', 'crmURL', 'CRM/Custom/Page/CustomDataView.tpl', 38, false),array('function', 'crmKey', 'CRM/Custom/Page/CustomDataView.tpl', 57, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php $this->assign('showEdit', 1); ?>
<?php $this->assign('rowCount', 1); ?>
<?php $_from = $this->_tpl_vars['viewCustomData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['customGroupId'] => $this->_tpl_vars['customValues']):
?>
  <?php $_from = $this->_tpl_vars['customValues']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cvID'] => $this->_tpl_vars['cd_edit']):
?>
<?php if ($this->_tpl_vars['multiRecordDisplay'] != 'single'): ?>
    <table class="no-border">
      <?php $this->assign('index', ((is_array($_tmp=$this->_tpl_vars['groupId'])) ? $this->_run_mod_handler('cat', true, $_tmp, "_".($this->_tpl_vars['cvID'])) : smarty_modifier_cat($_tmp, "_".($this->_tpl_vars['cvID'])))); ?>
      <?php if (( $this->_tpl_vars['editOwnCustomData'] && $this->_tpl_vars['showEdit'] ) || ( $this->_tpl_vars['showEdit'] && $this->_tpl_vars['editCustomData'] && $this->_tpl_vars['groupId'] )): ?>
        <tr>
          <td>
            <a
              href="<?php echo CRM_Utils_System::crmURL(array('p' => "civicrm/contact/view/cd/edit",'q' => "tableId=".($this->_tpl_vars['contactId'])."&cid=".($this->_tpl_vars['contactId'])."&groupID=".($this->_tpl_vars['groupId'])."&action=update&reset=1"), $this);?>
"
              class="button" style="margin-left: 6px;"><span><div
                  class="icon ui-icon-pencil"></div><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['cd_edit']['title'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Edit %1<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></a><br/><br/>
          </td>
        </tr>
      <?php endif; ?>
      <?php $this->assign('showEdit', 0); ?>
      <tr>
        <td id="<?php echo $this->_tpl_vars['cd_edit']['name']; ?>
_<?php echo $this->_tpl_vars['index']; ?>
" class="section-shown form-item">
          <div class="crm-accordion-wrapper <?php if ($this->_tpl_vars['cd_edit']['collapse_display'] == 0 || $this->_tpl_vars['skipTitle']): ?> <?php else: ?>collapsed<?php endif; ?>">
            <?php if (! $this->_tpl_vars['skipTitle']): ?>
              <div class="crm-accordion-header">
                <?php echo $this->_tpl_vars['cd_edit']['title']; ?>

              </div>
            <?php endif; ?>
            <div class="crm-accordion-body">
              <?php if ($this->_tpl_vars['groupId'] && $this->_tpl_vars['cvID'] && $this->_tpl_vars['editCustomData']): ?>
                <div class="crm-submit-buttons">
                  <a href="#" class="crm-hover-button crm-custom-value-del"
                     data-post='{"valueID": "<?php echo $this->_tpl_vars['cvID']; ?>
", "groupID": "<?php echo $this->_tpl_vars['customGroupId']; ?>
", "contactId": "<?php echo $this->_tpl_vars['contactId']; ?>
", "key": "<?php echo smarty_function_crmKey(array('name' => 'civicrm/ajax/customvalue'), $this);?>
"}'
                     title="<?php $this->_tag_stack[] = array('ts', array('1' => ((is_array($_tmp=$this->_tpl_vars['cd_edit']['title'])) ? $this->_run_mod_handler('cat', true, $_tmp, " ".($this->_tpl_vars['rowCount'])) : smarty_modifier_cat($_tmp, " ".($this->_tpl_vars['rowCount']))))); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Delete %1<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>">
                    <span class="icon delete-icon"></span> <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Delete<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                  </a>
                </div>
              <?php endif; ?>
              <?php $_from = $this->_tpl_vars['cd_edit']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field_id'] => $this->_tpl_vars['element']):
?>
                <table class="crm-info-panel">
                  <tr>
                    <?php if ($this->_tpl_vars['element']['options_per_line'] != 0): ?>
                      <td class="label"><?php echo $this->_tpl_vars['element']['field_title']; ?>
</td>
                      <td class="html-adjust">
                                                <?php $_from = $this->_tpl_vars['element']['field_value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                          <?php echo $this->_tpl_vars['val']; ?>

                          <br/>
                        <?php endforeach; endif; unset($_from); ?>
                      </td>
                    <?php else: ?>
                      <td class="label"><?php echo $this->_tpl_vars['element']['field_title']; ?>
</td>
                      <?php if ($this->_tpl_vars['element']['field_type'] == 'File'): ?>
                        <?php if ($this->_tpl_vars['element']['field_value']['displayURL']): ?>
                          <td class="html-adjust">
                            <a href="<?php echo $this->_tpl_vars['element']['field_value']['displayURL']; ?>
" class='crm-image-popup'>
                              <img src="<?php echo $this->_tpl_vars['element']['field_value']['displayURL']; ?>
" height="100" width="100">
                            </a>
                          </td>
                        <?php else: ?>
                          <td class="html-adjust">
                            <a href="<?php echo $this->_tpl_vars['element']['field_value']['fileURL']; ?>
"><?php echo $this->_tpl_vars['element']['field_value']['fileName']; ?>
</a>
                          </td>
                        <?php endif; ?>
                      <?php else: ?>
                        <?php if ($this->_tpl_vars['element']['field_data_type'] == 'Money'): ?>
                          <?php if ($this->_tpl_vars['element']['field_type'] == 'Text'): ?>
                            <td class="html-adjust"><?php echo ((is_array($_tmp=$this->_tpl_vars['element']['field_value'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)); ?>
</td>
                          <?php else: ?>
                            <td class="html-adjust"><?php echo $this->_tpl_vars['element']['field_value']; ?>
</td>
                          <?php endif; ?>
                        <?php else: ?>
                          <td class="html-adjust">
                            <?php if ($this->_tpl_vars['element']['contact_ref_id']): ?>
                            <a href='<?php echo CRM_Utils_System::crmURL(array('p' => "civicrm/contact/view",'q' => "reset=1&cid=".($this->_tpl_vars['element']['contact_ref_id'])), $this);?>
'>
                              <?php endif; ?>
                              <?php if ($this->_tpl_vars['element']['field_data_type'] == 'Memo'): ?>
                                <?php echo ((is_array($_tmp=$this->_tpl_vars['element']['field_value'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

                              <?php else: ?>
                                <?php echo $this->_tpl_vars['element']['field_value']; ?>

                              <?php endif; ?>
                              <?php if ($this->_tpl_vars['element']['contact_ref_id']): ?>
                            </a>
                            <?php endif; ?>
                          </td>
                        <?php endif; ?>
                      <?php endif; ?>
                    <?php endif; ?>
                  </tr>
                </table>
              <?php endforeach; endif; unset($_from); ?>
              <?php $this->assign('rowCount', $this->_tpl_vars['rowCount']+1); ?>
            </div>
            <!-- end of body -->
            <div class="clear"></div>
          </div>
          <!-- end of main accordian -->
        </td>
      </tr>
    </table>
<?php else: ?>
   <?php $_from = $this->_tpl_vars['cd_edit']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field_id'] => $this->_tpl_vars['element']):
?>
     <div class="crm-section">
      <?php if ($this->_tpl_vars['element']['options_per_line'] != 0): ?>
          <div class="label"><?php echo $this->_tpl_vars['element']['field_title']; ?>
</div>
          <div class="content">
                    <?php $_from = $this->_tpl_vars['element']['field_value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
             <?php echo $this->_tpl_vars['val']; ?>

             <br/>
          <?php endforeach; endif; unset($_from); ?>
          </div>
       <?php else: ?>
          <div class="label"><?php echo $this->_tpl_vars['element']['field_title']; ?>
</div>
          <?php if ($this->_tpl_vars['element']['field_type'] == 'File'): ?>
          <?php if ($this->_tpl_vars['element']['field_value']['displayURL']): ?>
            <div class="content">
              <a href="<?php echo $this->_tpl_vars['element']['field_value']['displayURL']; ?>
" class='crm-image-popup'>
               <img src="<?php echo $this->_tpl_vars['element']['field_value']['displayURL']; ?>
" height="100" width="100">
              </a>
            </div>
          <?php else: ?>
            <div class="content">
             <?php if ($this->_tpl_vars['element']['field_value']): ?>
              <a href="<?php echo $this->_tpl_vars['element']['field_value']['fileURL']; ?>
"><?php echo $this->_tpl_vars['element']['field_value']['fileName']; ?>
</a>
             <?php else: ?>
              <br/>
             <?php endif; ?>
            </div>
          <?php endif; ?>
          <?php else: ?>
            <?php if ($this->_tpl_vars['element']['field_data_type'] == 'Money'): ?>
              <?php if ($this->_tpl_vars['element']['field_type'] == 'Text'): ?>
                 <div class="content"><?php if ($this->_tpl_vars['element']['field_value']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['element']['field_value'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)); ?>
<?php else: ?><br/><?php endif; ?></div>
              <?php else: ?>
                 <div class="content"><?php if ($this->_tpl_vars['element']['field_value']): ?><?php echo $this->_tpl_vars['element']['field_value']; ?>
<?php else: ?><br/><?php endif; ?></div>
              <?php endif; ?>
            <?php else: ?>
              <div class="content">
                <?php if ($this->_tpl_vars['element']['contact_ref_id']): ?>
                  <a href='<?php echo CRM_Utils_System::crmURL(array('p' => "civicrm/contact/view",'q' => "reset=1&cid=".($this->_tpl_vars['element']['contact_ref_id'])), $this);?>
'>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['element']['field_data_type'] == 'Memo'): ?>
                  <?php echo ((is_array($_tmp=$this->_tpl_vars['element']['field_value'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

                <?php else: ?>
                  <?php if ($this->_tpl_vars['element']['field_value']): ?><?php echo $this->_tpl_vars['element']['field_value']; ?>
 <?php else: ?><br/><?php endif; ?>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['element']['contact_ref_id']): ?>
                  </a>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          <?php endif; ?>
       <?php endif; ?>
     </div>
   <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['groupId']): ?>
  <script type="text/javascript">
    <?php echo '
    CRM.$(function($) {
      // Handle delete of multi-record custom data
      $(\'#crm-container\')
        .off(\'.customValueDel\')
        .on(\'click.customValueDel\', \'.crm-custom-value-del\', function(e) {
          e.preventDefault();
          var $el = $(this),
            msg = \''; ?>
<?php $this->_tag_stack[] = array('ts', array('escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>The record will be deleted immediately. This action cannot be undone.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '\';
          CRM.confirm({title: $el.attr(\'title\'), message: msg})
            .on(\'crmConfirm:yes\', function() {
              var url = CRM.url(\'civicrm/ajax/customvalue\');
              var request = $.post(url, $el.data(\'post\'))
                .done(CRM.refreshParent($el));
              CRM.status({success: \''; ?>
<?php $this->_tag_stack[] = array('ts', array('escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Record Deleted<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '\'}, request);
            });
        });
      });
    '; ?>

  </script>
<?php endif; ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>