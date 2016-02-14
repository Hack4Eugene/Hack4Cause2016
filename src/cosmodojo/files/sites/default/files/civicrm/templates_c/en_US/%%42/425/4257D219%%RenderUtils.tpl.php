<?php /* Smarty version 2.6.27, created on 2016-02-14 08:31:13
         compiled from RenderUtils.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'RenderUtils.tpl', 1, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo '
<script id="renderutil-select-template" type="text/template">
<select class="crm-form-select" name="<%= name %>">
<% _.each(options, function(optionLabel, optionValue) { %>
    <option value="<%- optionValue %>" <%= selected == optionValue ? \'selected\' : \'\' %>><%- optionLabel %></option>
    <% }); %>
</select>
</script>
'; ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>