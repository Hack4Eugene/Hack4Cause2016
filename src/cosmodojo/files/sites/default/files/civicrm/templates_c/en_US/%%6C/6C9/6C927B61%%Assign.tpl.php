<?php /* Smarty version 2.6.27, created on 2016-02-14 08:31:13
         compiled from CRM/Volunteer/Form/Manage/Assign.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Volunteer/Form/Manage/Assign.tpl', 1, false),array('block', 'ts', 'CRM/Volunteer/Form/Manage/Assign.tpl', 30, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo ''; ?><?php echo '<script type="text/template" id="crm-vol-assign-layout-tpl"><div id="crm-vol-assign-flexible-region"><div class="crm-loading-element">'; ?><?php $this->_tag_stack[] = array('ts', array('domain' => 'org.civicrm.volunteer')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'Loading'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '...</div></div><div id="crm-vol-assign-scheduled-region"></div></script><script type="text/template" id="crm-vol-scheduled-assignment-tpl"><td class="crm-vol-name"><span class="icon crm-vol-drag"></span><a target="_blank" href="<%= contactUrl(contact_id) %>"><%= display_name %></a>'; ?><?php echo '<%if (details){%><a href="#" class="icon crm-vol-info"> </a><%}%>'; ?><?php echo '<div class="crm-vol-menu"><a class="crm-vol-menu-button" href="#" title="'; ?><?php $this->_tag_stack[] = array('ts', array('domain' => 'org.civicrm.volunteer')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'Actions'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '"><span></span></a></div></td><td><%= email %></td><td><%= phone %></td></script><script type="text/template" id="crm-vol-flexible-assignment-tpl"><td class="crm-vol-name"><span class="icon crm-vol-drag"></span><a target="_blank" href="<%= contactUrl(contact_id) %>"><%= display_name %></a>'; ?><?php echo '<%if (details){%><a href="#" class="icon crm-vol-info"> </a><%}%>'; ?><?php echo '<div class="crm-vol-menu"><a class="crm-vol-menu-button" href="#" title="'; ?><?php $this->_tag_stack[] = array('ts', array('domain' => 'org.civicrm.volunteer')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'Actions'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '"><span></span></a></div></td></script><script type="text/template" id="crm-vol-scheduled-tpl"><div class="crm-vol-need-ctrls">'; ?><?php echo '<div class="crm-vol-action crm-vol-search"><span class="crm-vol-icon-label">'; ?><?php $this->_tag_stack[] = array('ts', array('domain' => 'org.civicrm.volunteer')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'Search'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '</span><div class="crm-vol-circle"><div class="icon"></div></div></div></div><h3><%= pseudoConstant.volunteer_role[role_id] %> (<%= quantity || \''; ?><?php $this->_tag_stack[] = array('ts', array('domain' => 'org.civicrm.volunteer','escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'Any'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '\' %>): <%= display_time %></h3><table class="row-highlight"><thead><tr><th>'; ?><?php $this->_tag_stack[] = array('ts', array('domain' => 'org.civicrm.volunteer')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'Name'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '</th><th>'; ?><?php $this->_tag_stack[] = array('ts', array('domain' => 'org.civicrm.volunteer')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'Email'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '</th><th>'; ?><?php $this->_tag_stack[] = array('ts', array('domain' => 'org.civicrm.volunteer')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'Phone'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '</th></tr></thead><tbody class="crm-vol-assignment-list"></tbody></table></script><script type="text/template" id="crm-vol-flexible-tpl"><h3>'; ?><?php $this->_tag_stack[] = array('ts', array('domain' => 'org.civicrm.volunteer')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'Available Volunteers'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '</h3><table class="row-highlight"><thead><tr><th>'; ?><?php $this->_tag_stack[] = array('ts', array('domain' => 'org.civicrm.volunteer')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'Name'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '</th></tr></thead><tbody class="crm-vol-assignment-list"></tbody></table><hr style="margin: 1em 1px;"/><input name="add-volunteer" class="crm-action-menu action-icon-plus" placeholder="'; ?><?php $this->_tag_stack[] = array('ts', array('domain' => 'org.civicrm.volunteer','escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'Add Volunteer'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '..." style="width: 100%; max-width: 30em;" /></script><script type="text/template" id="crm-vol-menu-tpl"><div class="crm-vol-menu-items"><ul class="crm-vol-menu-list"><li><a href="#" class="crm-vol-menu-parent">'; ?><?php $this->_tag_stack[] = array('ts', array('domain' => 'org.civicrm.volunteer')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'Move To:'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '</a><ul class="crm-vol-menu-move-to"></ul></li><li><a href="#" class="crm-vol-menu-parent">'; ?><?php $this->_tag_stack[] = array('ts', array('domain' => 'org.civicrm.volunteer')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'Copy To:'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '</a><ul class="crm-vol-menu-copy-to"></ul></li><li><a class="crm-vol-del" href="#">'; ?><?php $this->_tag_stack[] = array('ts', array('domain' => 'org.civicrm.volunteer')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'Delete'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '</a></li></ul></div></script><script type="text/template" id="crm-vol-menu-item-tpl"><li class="crm-vol-menu-item"><a href="#<%= cid %>"><strong><%= title %></strong> <%= time %></a></li></script>'; ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>