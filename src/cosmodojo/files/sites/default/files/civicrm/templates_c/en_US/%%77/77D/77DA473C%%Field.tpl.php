<?php /* Smarty version 2.6.27, created on 2016-02-14 08:40:28
         compiled from Slider/CRM/Custom/Form/Field.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'Slider/CRM/Custom/Form/Field.tpl', 1, false),array('block', 'ts', 'Slider/CRM/Custom/Form/Field.tpl', 6, false),array('function', 'help', 'Slider/CRM/Custom/Form/Field.tpl', 4, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><table class="hiddenElement">
  <tbody>
    <tr class="crm-volunteer-slider-custom-field-form-block-is_slider_widget">
      <td class="label"><?php echo $this->_tpl_vars['form']['is_slider_widget']['label']; ?>
 <?php echo smarty_function_help(array('id' => "volunteer-slider",'file' => "Slider/CRM/Custom/Form/Field.hlp"), $this);?>
</td>
      <td class="html-adjust"><?php echo $this->_tpl_vars['form']['is_slider_widget']['html']; ?>

        <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Display option set as a slider? (This functionality is provided by CiviVolunteer.)<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
      </td>
    </tr>
  </tbody>
</table><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>