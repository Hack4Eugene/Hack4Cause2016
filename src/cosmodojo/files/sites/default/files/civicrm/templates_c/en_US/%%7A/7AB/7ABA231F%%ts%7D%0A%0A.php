<?php /* Smarty version 2.6.27, created on 2016-02-14 08:32:47
         compiled from string:%7Bts+1%3D%24contact.display_name%7DDear+%251%7B/ts%7D%2C%0A%0A%7Bts%7DYour+Event+Registration+has+been+cancelled.%7B/ts%7D%0A%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DEvent+Information+and+Location%7B/ts%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24event.event_title%7D%0A%7B%24event.event_start_date%7CcrmDate%7D%7Bif+%24event.event_end_date%7D-%7Bif+%24event.event_end_date%7Cdate_format:%22%25Y%25m%25d%22+%3D%3D+%24event.event_start_date%7Cdate_format:%22%25Y%25m%25d%22%7D%7B%24event.event_end_date%7CcrmDate:0:1%7D%7Belse%7D%7B%24event.event_end_date%7CcrmDate%7D%7B/if%7D%7B/if%7D%0A%0A%7Bts%7DParticipant+Role%7B/ts%7D:+%7B%24participant.role%7D%0A%0A%7Bif+%24isShowLocation%7D%0A%7Bif+%24event.location.address.1.name%7D%0A%0A%7B%24event.location.address.1.name%7D%0A%7B/if%7D%0A%7Bif+%24event.location.address.1.street_address%7D%7B%24event.location.address.1.street_address%7D%0A%7B/if%7D%0A%7Bif+%24event.location.address.1.supplemental_address_1%7D%7B%24event.location.address.1.supplemental_address_1%7D%0A%7B/if%7D%0A%7Bif+%24event.location.address.1.supplemental_address_2%7D%7B%24event.location.address.1.supplemental_address_2%7D%0A%7B/if%7D%0A%7Bif+%24event.location.address.1.city%7D%7B%24event.location.address.1.city%7D+%7B%24event.location.address.1.postal_code%7D%7Bif+%24event.location.address.1.postal_code_suffix%7D+-+%7B%24event.location.address.1.postal_code_suffix%7D%7B/if%7D%0A%7B/if%7D%0A%0A%7B/if%7D%7B%2AEnd+of+isShowLocation+condition%2A%7D%0A%0A%7Bif+%24event.location.phone.1.phone+%7C%7C+%24event.location.email.1.email%7D%0A%0A%7Bts%7DEvent+Contacts:%7B/ts%7D%0A%7Bforeach+from%3D%24event.location.phone+item%3Dphone%7D%0A%7Bif+%24phone.phone%7D%0A%0A%7Bif+%24phone.phone_type%7D%7B%24phone.phone_type_display%7D%7Belse%7D%7Bts%7DPhone%7B/ts%7D%7B/if%7D:+%7B%24phone.phone%7D%7B/if%7D%0A%7B/foreach%7D%0A%7Bforeach+from%3D%24event.location.email+item%3DeventEmail%7D%0A%7Bif+%24eventEmail.email%7D%0A%0A%7Bts%7DEmail%7B/ts%7D:+%7B%24eventEmail.email%7D%7B/if%7D%7B/foreach%7D%0A%7B/if%7D%0A%0A%7Bif+%24contact.email%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DRegistered+Email%7B/ts%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24contact.email%7D%0A%7B/if%7D%0A%0A%7Bif+%24register_date%7D%0A%7Bts%7DRegistration+Date%7B/ts%7D:+%7B%24participant.register_date%7CcrmDate%7D%0A%7B/if%7D%0A%0A%7Bts+1%3D%24domain.phone+2%3D%24domain.email%7DPlease+contact+us+at+%251+or+send+email+to+%252+if+you+have+questions.%7B/ts%7D%0A%0A */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'string:{ts 1=$contact.display_name}Dear %1{/ts},

{ts}Your Event Registration has been cancelled.{/ts}


===========================================================
{ts}Event Information and Location{/ts}

===========================================================
{$event.event_title}
{$event.event_start_date|crmDate}{if $event.event_end_date}-{if $event.event_end_date|date_format:"%Y%m%d" == $event.event_start_date|date_format:"%Y%m%d"}{$event.event_end_date|crmDate:0:1}{else}{$event.event_end_date|crmDate}{/if}{/if}

{ts}Participant Role{/ts}: {$participant.role}

{if $isShowLocation}
{if $event.location.address.1.name}

{$event.location.address.1.name}
{/if}
{if $event.location.address.1.street_address}{$event.location.address.1.street_address}
{/if}
{if $event.location.address.1.supplemental_address_1}{$event.location.address.1.supplemental_address_1}
{/if}
{if $event.location.address.1.supplemental_address_2}{$event.location.address.1.supplemental_address_2}
{/if}
{if $event.location.address.1.city}{$event.location.address.1.city} {$event.location.address.1.postal_code}{if $event.location.address.1.postal_code_suffix} - {$event.location.address.1.postal_code_suffix}{/if}
{/if}

{/if}{*End of isShowLocation condition*}

{if $event.location.phone.1.phone || $event.location.email.1.email}

{ts}Event Contacts:{/ts}
{foreach from=$event.location.phone item=phone}
{if $phone.phone}

{if $phone.phone_type}{$phone.phone_type_display}{else}{ts}Phone{/ts}{/if}: {$phone.phone}{/if}
{/foreach}
{foreach from=$event.location.email item=eventEmail}
{if $eventEmail.email}

{ts}Email{/ts}: {$eventEmail.email}{/if}{/foreach}
{/if}

{if $contact.email}

===========================================================
{ts}Registered Email{/ts}

===========================================================
{$contact.email}
{/if}

{if $register_date}
{ts}Registration Date{/ts}: {$participant.register_date|crmDate}
{/if}

{ts 1=$domain.phone 2=$domain.email}Please contact us at %1 or send email to %2 if you have questions.{/ts}

', 1, false),array('block', 'ts', 'string:{ts 1=$contact.display_name}Dear %1{/ts},

{ts}Your Event Registration has been cancelled.{/ts}


===========================================================
{ts}Event Information and Location{/ts}

===========================================================
{$event.event_title}
{$event.event_start_date|crmDate}{if $event.event_end_date}-{if $event.event_end_date|date_format:"%Y%m%d" == $event.event_start_date|date_format:"%Y%m%d"}{$event.event_end_date|crmDate:0:1}{else}{$event.event_end_date|crmDate}{/if}{/if}

{ts}Participant Role{/ts}: {$participant.role}

{if $isShowLocation}
{if $event.location.address.1.name}

{$event.location.address.1.name}
{/if}
{if $event.location.address.1.street_address}{$event.location.address.1.street_address}
{/if}
{if $event.location.address.1.supplemental_address_1}{$event.location.address.1.supplemental_address_1}
{/if}
{if $event.location.address.1.supplemental_address_2}{$event.location.address.1.supplemental_address_2}
{/if}
{if $event.location.address.1.city}{$event.location.address.1.city} {$event.location.address.1.postal_code}{if $event.location.address.1.postal_code_suffix} - {$event.location.address.1.postal_code_suffix}{/if}
{/if}

{/if}{*End of isShowLocation condition*}

{if $event.location.phone.1.phone || $event.location.email.1.email}

{ts}Event Contacts:{/ts}
{foreach from=$event.location.phone item=phone}
{if $phone.phone}

{if $phone.phone_type}{$phone.phone_type_display}{else}{ts}Phone{/ts}{/if}: {$phone.phone}{/if}
{/foreach}
{foreach from=$event.location.email item=eventEmail}
{if $eventEmail.email}

{ts}Email{/ts}: {$eventEmail.email}{/if}{/foreach}
{/if}

{if $contact.email}

===========================================================
{ts}Registered Email{/ts}

===========================================================
{$contact.email}
{/if}

{if $register_date}
{ts}Registration Date{/ts}: {$participant.register_date|crmDate}
{/if}

{ts 1=$domain.phone 2=$domain.email}Please contact us at %1 or send email to %2 if you have questions.{/ts}

', 1, false),array('modifier', 'crmDate', 'string:{ts 1=$contact.display_name}Dear %1{/ts},

{ts}Your Event Registration has been cancelled.{/ts}


===========================================================
{ts}Event Information and Location{/ts}

===========================================================
{$event.event_title}
{$event.event_start_date|crmDate}{if $event.event_end_date}-{if $event.event_end_date|date_format:"%Y%m%d" == $event.event_start_date|date_format:"%Y%m%d"}{$event.event_end_date|crmDate:0:1}{else}{$event.event_end_date|crmDate}{/if}{/if}

{ts}Participant Role{/ts}: {$participant.role}

{if $isShowLocation}
{if $event.location.address.1.name}

{$event.location.address.1.name}
{/if}
{if $event.location.address.1.street_address}{$event.location.address.1.street_address}
{/if}
{if $event.location.address.1.supplemental_address_1}{$event.location.address.1.supplemental_address_1}
{/if}
{if $event.location.address.1.supplemental_address_2}{$event.location.address.1.supplemental_address_2}
{/if}
{if $event.location.address.1.city}{$event.location.address.1.city} {$event.location.address.1.postal_code}{if $event.location.address.1.postal_code_suffix} - {$event.location.address.1.postal_code_suffix}{/if}
{/if}

{/if}{*End of isShowLocation condition*}

{if $event.location.phone.1.phone || $event.location.email.1.email}

{ts}Event Contacts:{/ts}
{foreach from=$event.location.phone item=phone}
{if $phone.phone}

{if $phone.phone_type}{$phone.phone_type_display}{else}{ts}Phone{/ts}{/if}: {$phone.phone}{/if}
{/foreach}
{foreach from=$event.location.email item=eventEmail}
{if $eventEmail.email}

{ts}Email{/ts}: {$eventEmail.email}{/if}{/foreach}
{/if}

{if $contact.email}

===========================================================
{ts}Registered Email{/ts}

===========================================================
{$contact.email}
{/if}

{if $register_date}
{ts}Registration Date{/ts}: {$participant.register_date|crmDate}
{/if}

{ts 1=$domain.phone 2=$domain.email}Please contact us at %1 or send email to %2 if you have questions.{/ts}

', 11, false),array('modifier', 'date_format', 'string:{ts 1=$contact.display_name}Dear %1{/ts},

{ts}Your Event Registration has been cancelled.{/ts}


===========================================================
{ts}Event Information and Location{/ts}

===========================================================
{$event.event_title}
{$event.event_start_date|crmDate}{if $event.event_end_date}-{if $event.event_end_date|date_format:"%Y%m%d" == $event.event_start_date|date_format:"%Y%m%d"}{$event.event_end_date|crmDate:0:1}{else}{$event.event_end_date|crmDate}{/if}{/if}

{ts}Participant Role{/ts}: {$participant.role}

{if $isShowLocation}
{if $event.location.address.1.name}

{$event.location.address.1.name}
{/if}
{if $event.location.address.1.street_address}{$event.location.address.1.street_address}
{/if}
{if $event.location.address.1.supplemental_address_1}{$event.location.address.1.supplemental_address_1}
{/if}
{if $event.location.address.1.supplemental_address_2}{$event.location.address.1.supplemental_address_2}
{/if}
{if $event.location.address.1.city}{$event.location.address.1.city} {$event.location.address.1.postal_code}{if $event.location.address.1.postal_code_suffix} - {$event.location.address.1.postal_code_suffix}{/if}
{/if}

{/if}{*End of isShowLocation condition*}

{if $event.location.phone.1.phone || $event.location.email.1.email}

{ts}Event Contacts:{/ts}
{foreach from=$event.location.phone item=phone}
{if $phone.phone}

{if $phone.phone_type}{$phone.phone_type_display}{else}{ts}Phone{/ts}{/if}: {$phone.phone}{/if}
{/foreach}
{foreach from=$event.location.email item=eventEmail}
{if $eventEmail.email}

{ts}Email{/ts}: {$eventEmail.email}{/if}{/foreach}
{/if}

{if $contact.email}

===========================================================
{ts}Registered Email{/ts}

===========================================================
{$contact.email}
{/if}

{if $register_date}
{ts}Registration Date{/ts}: {$participant.register_date|crmDate}
{/if}

{ts 1=$domain.phone 2=$domain.email}Please contact us at %1 or send email to %2 if you have questions.{/ts}

', 11, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['contact']['display_name'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Dear %1<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>,

<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Your Event Registration has been cancelled.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>


===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Event Information and Location<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

===========================================================
<?php echo $this->_tpl_vars['event']['event_title']; ?>

<?php echo ((is_array($_tmp=$this->_tpl_vars['event']['event_start_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>
<?php if ($this->_tpl_vars['event']['event_end_date']): ?>-<?php if (((is_array($_tmp=$this->_tpl_vars['event']['event_end_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y%m%d") : smarty_modifier_date_format($_tmp, "%Y%m%d")) == ((is_array($_tmp=$this->_tpl_vars['event']['event_start_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y%m%d") : smarty_modifier_date_format($_tmp, "%Y%m%d"))): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['event']['event_end_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp, 0, 1) : smarty_modifier_crmDate($_tmp, 0, 1)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['event']['event_end_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>
<?php endif; ?><?php endif; ?>

<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Participant Role<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['participant']['role']; ?>


<?php if ($this->_tpl_vars['isShowLocation']): ?>
<?php if ($this->_tpl_vars['event']['location']['address']['1']['name']): ?>

<?php echo $this->_tpl_vars['event']['location']['address']['1']['name']; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['event']['location']['address']['1']['street_address']): ?><?php echo $this->_tpl_vars['event']['location']['address']['1']['street_address']; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['event']['location']['address']['1']['supplemental_address_1']): ?><?php echo $this->_tpl_vars['event']['location']['address']['1']['supplemental_address_1']; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['event']['location']['address']['1']['supplemental_address_2']): ?><?php echo $this->_tpl_vars['event']['location']['address']['1']['supplemental_address_2']; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['event']['location']['address']['1']['city']): ?><?php echo $this->_tpl_vars['event']['location']['address']['1']['city']; ?>
 <?php echo $this->_tpl_vars['event']['location']['address']['1']['postal_code']; ?>
<?php if ($this->_tpl_vars['event']['location']['address']['1']['postal_code_suffix']): ?> - <?php echo $this->_tpl_vars['event']['location']['address']['1']['postal_code_suffix']; ?>
<?php endif; ?>
<?php endif; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['event']['location']['phone']['1']['phone'] || $this->_tpl_vars['event']['location']['email']['1']['email']): ?>

<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Event Contacts:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php $_from = $this->_tpl_vars['event']['location']['phone']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['phone']):
?>
<?php if ($this->_tpl_vars['phone']['phone']): ?>

<?php if ($this->_tpl_vars['phone']['phone_type']): ?><?php echo $this->_tpl_vars['phone']['phone_type_display']; ?>
<?php else: ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Phone<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?>: <?php echo $this->_tpl_vars['phone']['phone']; ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php $_from = $this->_tpl_vars['event']['location']['email']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['eventEmail']):
?>
<?php if ($this->_tpl_vars['eventEmail']['email']): ?>

<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Email<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['eventEmail']['email']; ?>
<?php endif; ?><?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['contact']['email']): ?>

===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Registered Email<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

===========================================================
<?php echo $this->_tpl_vars['contact']['email']; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['register_date']): ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Registration Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['participant']['register_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>

<?php endif; ?>

<?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['domain']['phone'],'2' => $this->_tpl_vars['domain']['email'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Please contact us at %1 or send email to %2 if you have questions.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>