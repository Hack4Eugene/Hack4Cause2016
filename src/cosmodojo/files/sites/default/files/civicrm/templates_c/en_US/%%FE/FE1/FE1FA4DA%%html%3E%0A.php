<?php /* Smarty version 2.6.27, created on 2016-02-14 08:32:47
         compiled from string:%3C%21DOCTYPE+html+PUBLIC+%22-//W3C//DTD+XHTML+1.0+Transitional//EN%22+%22http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd%22%3E%0A%3Chtml+xmlns%3D%22http://www.w3.org/1999/xhtml%22%3E%0A%3Chead%3E%0A+%3Cmeta+http-equiv%3D%22Content-Type%22+content%3D%22text/html%3B+charset%3DUTF-8%22+/%3E%0A+%3Ctitle%3E%3C/title%3E%0A%3C/head%3E%0A%3Cbody%3E%0A%0A%7Bcapture+assign%3DheaderStyle%7Dcolspan%3D%222%22+style%3D%22text-align:+left%3B+padding:+4px%3B+border-bottom:+1px+solid+%23999%3B+background-color:+%23eee%3B%22%7B/capture%7D%0A%7Bcapture+assign%3DlabelStyle+%7Dstyle%3D%22padding:+4px%3B+border-bottom:+1px+solid+%23999%3B+background-color:+%23f7f7f7%3B%22%7B/capture%7D%0A%7Bcapture+assign%3DvalueStyle+%7Dstyle%3D%22padding:+4px%3B+border-bottom:+1px+solid+%23999%3B%22%7B/capture%7D%0A%0A%3Ccenter%3E%0A+%3Ctable+width%3D%22620%22+border%3D%220%22+cellpadding%3D%220%22+cellspacing%3D%220%22+id%3D%22crm-event_receipt%22+style%3D%22font-family:+Arial%2C+Verdana%2C+sans-serif%3B+text-align:+left%3B%22%3E%0A%0A++%3C%21--+BEGIN+HEADER+--%3E%0A++%3C%21--+You+can+add+table+row%28s%29+here+with+logo+or+other+header+elements+--%3E%0A++%3C%21--+END+HEADER+--%3E%0A%0A++%3C%21--+BEGIN+CONTENT+--%3E%0A%0A++%3Ctr%3E%0A+++%3Ctd%3E%0A++++%3Cp%3E%7Bts+1%3D%24contact.display_name%7DDear+%251%7B/ts%7D%2C%3C/p%3E%0A++++%3Cp%3E%7Bts%7DYour+Event+Registration+has+been+cancelled.%7B/ts%7D%3C/p%3E%0A+++%3C/td%3E%0A++%3C/tr%3E%0A++%3Ctr%3E%0A+++%3Ctd%3E%0A++++%3Ctable+style%3D%22border:+1px+solid+%23999%3B+margin:+1em+0em+1em%3B+border-collapse:+collapse%3B+width:100%25%3B%22%3E%0A+++++%3Ctr%3E%0A++++++%3Cth+%7B%24headerStyle%7D%3E%0A+++++++%7Bts%7DEvent+Information+and+Location%7B/ts%7D%0A++++++%3C/th%3E%0A+++++%3C/tr%3E%0A+++++%3Ctr%3E%0A++++++%3Ctd+colspan%3D%222%22+%7B%24valueStyle%7D%3E%0A+++++++%7B%24event.event_title%7D%3Cbr+/%3E%0A+++++++%7B%24event.event_start_date%7CcrmDate%7D%7Bif+%24event.event_end_date%7D-%7Bif+%24event.event_end_date%7Cdate_format:%22%25Y%25m%25d%22+%3D%3D+%24event.event_start_date%7Cdate_format:%22%25Y%25m%25d%22%7D%7B%24event.event_end_date%7CcrmDate:0:1%7D%7Belse%7D%7B%24event.event_end_date%7CcrmDate%7D%7B/if%7D%7B/if%7D%0A++++++%3C/td%3E%0A+++++%3C/tr%3E%0A+++++%3Ctr%3E%0A++++++%3Ctd+%7B%24labelStyle%7D%3E%0A+++++++%7Bts%7DParticipant+Role%7B/ts%7D:%0A++++++%3C/td%3E%0A++++++%3Ctd+%7B%24valueStyle%7D%3E%0A+++++++%7B%24participant.role%7D%0A++++++%3C/td%3E%0A+++++%3C/tr%3E%0A%0A+++++%7Bif+%24isShowLocation%7D%0A++++++%3Ctr%3E%0A+++++++%3Ctd+colspan%3D%222%22+%7B%24valueStyle%7D%3E%0A++++++++%7Bif+%24event.location.address.1.name%7D%0A+++++++++%7B%24event.location.address.1.name%7D%3Cbr+/%3E%0A++++++++%7B/if%7D%0A++++++++%7Bif+%24event.location.address.1.street_address%7D%0A+++++++++%7B%24event.location.address.1.street_address%7D%3Cbr+/%3E%0A++++++++%7B/if%7D%0A++++++++%7Bif+%24event.location.address.1.supplemental_address_1%7D%0A+++++++++%7B%24event.location.address.1.supplemental_address_1%7D%3Cbr+/%3E%0A++++++++%7B/if%7D%0A++++++++%7Bif+%24event.location.address.1.supplemental_address_2%7D%0A+++++++++%7B%24event.location.address.1.supplemental_address_2%7D%3Cbr+/%3E%0A++++++++%7B/if%7D%0A++++++++%7Bif+%24event.location.address.1.city%7D%0A+++++++++%7B%24event.location.address.1.city%7D+%7B%24event.location.address.1.postal_code%7D%0A+++++++++%7Bif+%24event.location.address.1.postal_code_suffix%7D%0A++++++++++-+%7B%24event.location.address.1.postal_code_suffix%7D%0A+++++++++%7B/if%7D%0A++++++++%7B/if%7D%0A+++++++%3C/td%3E%0A++++++%3C/tr%3E%0A+++++%7B/if%7D%0A%0A+++++%7Bif+%24event.location.phone.1.phone+%7C%7C+%24event.location.email.1.email%7D%0A++++++%3Ctr%3E%0A+++++++%3Ctd+colspan%3D%222%22+%7B%24labelStyle%7D%3E%0A++++++++%7Bts%7DEvent+Contacts:%7B/ts%7D%0A+++++++%3C/td%3E%0A++++++%3C/tr%3E%0A++++++%7Bforeach+from%3D%24event.location.phone+item%3Dphone%7D%0A+++++++%7Bif+%24phone.phone%7D%0A++++++++%3Ctr%3E%0A+++++++++%3Ctd+%7B%24labelStyle%7D%3E%0A++++++++++%7Bif+%24phone.phone_type%7D%7B%24phone.phone_type_display%7D%7Belse%7D%7Bts%7DPhone%7B/ts%7D%7B/if%7D%0A+++++++++%3C/td%3E%0A+++++++++%3Ctd+%7B%24valueStyle%7D%3E%0A++++++++++%7B%24phone.phone%7D%0A+++++++++%3C/td%3E%0A++++++++%3C/tr%3E%0A+++++++%7B/if%7D%0A++++++%7B/foreach%7D%0A++++++%7Bforeach+from%3D%24event.location.email+item%3DeventEmail%7D%0A+++++++%7Bif+%24eventEmail.email%7D%0A++++++++%3Ctr%3E%0A+++++++++%3Ctd+%7B%24labelStyle%7D%3E%0A++++++++++%7Bts%7DEmail%7B/ts%7D%0A+++++++++%3C/td%3E%0A+++++++++%3Ctd+%7B%24valueStyle%7D%3E%0A++++++++++%7B%24eventEmail.email%7D%0A+++++++++%3C/td%3E%0A++++++++%3C/tr%3E%0A+++++++%7B/if%7D%0A++++++%7B/foreach%7D%0A+++++%7B/if%7D%0A%0A+++++%7Bif+%24contact.email%7D%0A++++++%3Ctr%3E%0A+++++++%3Cth+%7B%24headerStyle%7D%3E%0A++++++++%7Bts%7DRegistered+Email%7B/ts%7D%0A+++++++%3C/th%3E%0A++++++%3C/tr%3E%0A++++++%3Ctr%3E%0A+++++++%3Ctd+colspan%3D%222%22+%7B%24valueStyle%7D%3E%0A++++++++%7B%24contact.email%7D%0A+++++++%3C/td%3E%0A++++++%3C/tr%3E%0A+++++%7B/if%7D%0A%0A+++++%7Bif+%24register_date%7D%0A++++++%3Ctr%3E%0A+++++++%3Ctd+%7B%24labelStyle%7D%3E%0A++++++++%7Bts%7DRegistration+Date%7B/ts%7D%0A+++++++%3C/td%3E%0A+++++++%3Ctd+%7B%24valueStyle%7D%3E%0A++++++++%7B%24participant.register_date%7CcrmDate%7D%0A+++++++%3C/td%3E%0A++++++%3C/tr%3E%0A+++++%7B/if%7D%0A%0A++++%3C/table%3E%0A+++%3C/td%3E%0A++%3C/tr%3E%0A%0A++%3Ctr%3E%0A+++%3Ctd%3E%0A++++%3Cp%3E%7Bts+1%3D%24domain.phone+2%3D%24domain.email%7DPlease+contact+us+at+%251+or+send+email+to+%252+if+you+have+questions.%7B/ts%7D%3C/p%3E%0A+++%3C/td%3E%0A++%3C/tr%3E%0A%0A+%3C/table%3E%0A%3C/center%3E%0A%0A%3C/body%3E%0A%3C/html%3E%0A */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'string:<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title></title>
</head>
<body>

{capture assign=headerStyle}colspan="2" style="text-align: left; padding: 4px; border-bottom: 1px solid #999; background-color: #eee;"{/capture}
{capture assign=labelStyle }style="padding: 4px; border-bottom: 1px solid #999; background-color: #f7f7f7;"{/capture}
{capture assign=valueStyle }style="padding: 4px; border-bottom: 1px solid #999;"{/capture}

<center>
 <table width="620" border="0" cellpadding="0" cellspacing="0" id="crm-event_receipt" style="font-family: Arial, Verdana, sans-serif; text-align: left;">

  <!-- BEGIN HEADER -->
  <!-- You can add table row(s) here with logo or other header elements -->
  <!-- END HEADER -->

  <!-- BEGIN CONTENT -->

  <tr>
   <td>
    <p>{ts 1=$contact.display_name}Dear %1{/ts},</p>
    <p>{ts}Your Event Registration has been cancelled.{/ts}</p>
   </td>
  </tr>
  <tr>
   <td>
    <table style="border: 1px solid #999; margin: 1em 0em 1em; border-collapse: collapse; width:100%;">
     <tr>
      <th {$headerStyle}>
       {ts}Event Information and Location{/ts}
      </th>
     </tr>
     <tr>
      <td colspan="2" {$valueStyle}>
       {$event.event_title}<br />
       {$event.event_start_date|crmDate}{if $event.event_end_date}-{if $event.event_end_date|date_format:"%Y%m%d" == $event.event_start_date|date_format:"%Y%m%d"}{$event.event_end_date|crmDate:0:1}{else}{$event.event_end_date|crmDate}{/if}{/if}
      </td>
     </tr>
     <tr>
      <td {$labelStyle}>
       {ts}Participant Role{/ts}:
      </td>
      <td {$valueStyle}>
       {$participant.role}
      </td>
     </tr>

     {if $isShowLocation}
      <tr>
       <td colspan="2" {$valueStyle}>
        {if $event.location.address.1.name}
         {$event.location.address.1.name}<br />
        {/if}
        {if $event.location.address.1.street_address}
         {$event.location.address.1.street_address}<br />
        {/if}
        {if $event.location.address.1.supplemental_address_1}
         {$event.location.address.1.supplemental_address_1}<br />
        {/if}
        {if $event.location.address.1.supplemental_address_2}
         {$event.location.address.1.supplemental_address_2}<br />
        {/if}
        {if $event.location.address.1.city}
         {$event.location.address.1.city} {$event.location.address.1.postal_code}
         {if $event.location.address.1.postal_code_suffix}
          - {$event.location.address.1.postal_code_suffix}
         {/if}
        {/if}
       </td>
      </tr>
     {/if}

     {if $event.location.phone.1.phone || $event.location.email.1.email}
      <tr>
       <td colspan="2" {$labelStyle}>
        {ts}Event Contacts:{/ts}
       </td>
      </tr>
      {foreach from=$event.location.phone item=phone}
       {if $phone.phone}
        <tr>
         <td {$labelStyle}>
          {if $phone.phone_type}{$phone.phone_type_display}{else}{ts}Phone{/ts}{/if}
         </td>
         <td {$valueStyle}>
          {$phone.phone}
         </td>
        </tr>
       {/if}
      {/foreach}
      {foreach from=$event.location.email item=eventEmail}
       {if $eventEmail.email}
        <tr>
         <td {$labelStyle}>
          {ts}Email{/ts}
         </td>
         <td {$valueStyle}>
          {$eventEmail.email}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

     {if $contact.email}
      <tr>
       <th {$headerStyle}>
        {ts}Registered Email{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$valueStyle}>
        {$contact.email}
       </td>
      </tr>
     {/if}

     {if $register_date}
      <tr>
       <td {$labelStyle}>
        {ts}Registration Date{/ts}
       </td>
       <td {$valueStyle}>
        {$participant.register_date|crmDate}
       </td>
      </tr>
     {/if}

    </table>
   </td>
  </tr>

  <tr>
   <td>
    <p>{ts 1=$domain.phone 2=$domain.email}Please contact us at %1 or send email to %2 if you have questions.{/ts}</p>
   </td>
  </tr>

 </table>
</center>

</body>
</html>
', 1, false),array('block', 'ts', 'string:<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title></title>
</head>
<body>

{capture assign=headerStyle}colspan="2" style="text-align: left; padding: 4px; border-bottom: 1px solid #999; background-color: #eee;"{/capture}
{capture assign=labelStyle }style="padding: 4px; border-bottom: 1px solid #999; background-color: #f7f7f7;"{/capture}
{capture assign=valueStyle }style="padding: 4px; border-bottom: 1px solid #999;"{/capture}

<center>
 <table width="620" border="0" cellpadding="0" cellspacing="0" id="crm-event_receipt" style="font-family: Arial, Verdana, sans-serif; text-align: left;">

  <!-- BEGIN HEADER -->
  <!-- You can add table row(s) here with logo or other header elements -->
  <!-- END HEADER -->

  <!-- BEGIN CONTENT -->

  <tr>
   <td>
    <p>{ts 1=$contact.display_name}Dear %1{/ts},</p>
    <p>{ts}Your Event Registration has been cancelled.{/ts}</p>
   </td>
  </tr>
  <tr>
   <td>
    <table style="border: 1px solid #999; margin: 1em 0em 1em; border-collapse: collapse; width:100%;">
     <tr>
      <th {$headerStyle}>
       {ts}Event Information and Location{/ts}
      </th>
     </tr>
     <tr>
      <td colspan="2" {$valueStyle}>
       {$event.event_title}<br />
       {$event.event_start_date|crmDate}{if $event.event_end_date}-{if $event.event_end_date|date_format:"%Y%m%d" == $event.event_start_date|date_format:"%Y%m%d"}{$event.event_end_date|crmDate:0:1}{else}{$event.event_end_date|crmDate}{/if}{/if}
      </td>
     </tr>
     <tr>
      <td {$labelStyle}>
       {ts}Participant Role{/ts}:
      </td>
      <td {$valueStyle}>
       {$participant.role}
      </td>
     </tr>

     {if $isShowLocation}
      <tr>
       <td colspan="2" {$valueStyle}>
        {if $event.location.address.1.name}
         {$event.location.address.1.name}<br />
        {/if}
        {if $event.location.address.1.street_address}
         {$event.location.address.1.street_address}<br />
        {/if}
        {if $event.location.address.1.supplemental_address_1}
         {$event.location.address.1.supplemental_address_1}<br />
        {/if}
        {if $event.location.address.1.supplemental_address_2}
         {$event.location.address.1.supplemental_address_2}<br />
        {/if}
        {if $event.location.address.1.city}
         {$event.location.address.1.city} {$event.location.address.1.postal_code}
         {if $event.location.address.1.postal_code_suffix}
          - {$event.location.address.1.postal_code_suffix}
         {/if}
        {/if}
       </td>
      </tr>
     {/if}

     {if $event.location.phone.1.phone || $event.location.email.1.email}
      <tr>
       <td colspan="2" {$labelStyle}>
        {ts}Event Contacts:{/ts}
       </td>
      </tr>
      {foreach from=$event.location.phone item=phone}
       {if $phone.phone}
        <tr>
         <td {$labelStyle}>
          {if $phone.phone_type}{$phone.phone_type_display}{else}{ts}Phone{/ts}{/if}
         </td>
         <td {$valueStyle}>
          {$phone.phone}
         </td>
        </tr>
       {/if}
      {/foreach}
      {foreach from=$event.location.email item=eventEmail}
       {if $eventEmail.email}
        <tr>
         <td {$labelStyle}>
          {ts}Email{/ts}
         </td>
         <td {$valueStyle}>
          {$eventEmail.email}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

     {if $contact.email}
      <tr>
       <th {$headerStyle}>
        {ts}Registered Email{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$valueStyle}>
        {$contact.email}
       </td>
      </tr>
     {/if}

     {if $register_date}
      <tr>
       <td {$labelStyle}>
        {ts}Registration Date{/ts}
       </td>
       <td {$valueStyle}>
        {$participant.register_date|crmDate}
       </td>
      </tr>
     {/if}

    </table>
   </td>
  </tr>

  <tr>
   <td>
    <p>{ts 1=$domain.phone 2=$domain.email}Please contact us at %1 or send email to %2 if you have questions.{/ts}</p>
   </td>
  </tr>

 </table>
</center>

</body>
</html>
', 24, false),array('modifier', 'crmDate', 'string:<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title></title>
</head>
<body>

{capture assign=headerStyle}colspan="2" style="text-align: left; padding: 4px; border-bottom: 1px solid #999; background-color: #eee;"{/capture}
{capture assign=labelStyle }style="padding: 4px; border-bottom: 1px solid #999; background-color: #f7f7f7;"{/capture}
{capture assign=valueStyle }style="padding: 4px; border-bottom: 1px solid #999;"{/capture}

<center>
 <table width="620" border="0" cellpadding="0" cellspacing="0" id="crm-event_receipt" style="font-family: Arial, Verdana, sans-serif; text-align: left;">

  <!-- BEGIN HEADER -->
  <!-- You can add table row(s) here with logo or other header elements -->
  <!-- END HEADER -->

  <!-- BEGIN CONTENT -->

  <tr>
   <td>
    <p>{ts 1=$contact.display_name}Dear %1{/ts},</p>
    <p>{ts}Your Event Registration has been cancelled.{/ts}</p>
   </td>
  </tr>
  <tr>
   <td>
    <table style="border: 1px solid #999; margin: 1em 0em 1em; border-collapse: collapse; width:100%;">
     <tr>
      <th {$headerStyle}>
       {ts}Event Information and Location{/ts}
      </th>
     </tr>
     <tr>
      <td colspan="2" {$valueStyle}>
       {$event.event_title}<br />
       {$event.event_start_date|crmDate}{if $event.event_end_date}-{if $event.event_end_date|date_format:"%Y%m%d" == $event.event_start_date|date_format:"%Y%m%d"}{$event.event_end_date|crmDate:0:1}{else}{$event.event_end_date|crmDate}{/if}{/if}
      </td>
     </tr>
     <tr>
      <td {$labelStyle}>
       {ts}Participant Role{/ts}:
      </td>
      <td {$valueStyle}>
       {$participant.role}
      </td>
     </tr>

     {if $isShowLocation}
      <tr>
       <td colspan="2" {$valueStyle}>
        {if $event.location.address.1.name}
         {$event.location.address.1.name}<br />
        {/if}
        {if $event.location.address.1.street_address}
         {$event.location.address.1.street_address}<br />
        {/if}
        {if $event.location.address.1.supplemental_address_1}
         {$event.location.address.1.supplemental_address_1}<br />
        {/if}
        {if $event.location.address.1.supplemental_address_2}
         {$event.location.address.1.supplemental_address_2}<br />
        {/if}
        {if $event.location.address.1.city}
         {$event.location.address.1.city} {$event.location.address.1.postal_code}
         {if $event.location.address.1.postal_code_suffix}
          - {$event.location.address.1.postal_code_suffix}
         {/if}
        {/if}
       </td>
      </tr>
     {/if}

     {if $event.location.phone.1.phone || $event.location.email.1.email}
      <tr>
       <td colspan="2" {$labelStyle}>
        {ts}Event Contacts:{/ts}
       </td>
      </tr>
      {foreach from=$event.location.phone item=phone}
       {if $phone.phone}
        <tr>
         <td {$labelStyle}>
          {if $phone.phone_type}{$phone.phone_type_display}{else}{ts}Phone{/ts}{/if}
         </td>
         <td {$valueStyle}>
          {$phone.phone}
         </td>
        </tr>
       {/if}
      {/foreach}
      {foreach from=$event.location.email item=eventEmail}
       {if $eventEmail.email}
        <tr>
         <td {$labelStyle}>
          {ts}Email{/ts}
         </td>
         <td {$valueStyle}>
          {$eventEmail.email}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

     {if $contact.email}
      <tr>
       <th {$headerStyle}>
        {ts}Registered Email{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$valueStyle}>
        {$contact.email}
       </td>
      </tr>
     {/if}

     {if $register_date}
      <tr>
       <td {$labelStyle}>
        {ts}Registration Date{/ts}
       </td>
       <td {$valueStyle}>
        {$participant.register_date|crmDate}
       </td>
      </tr>
     {/if}

    </table>
   </td>
  </tr>

  <tr>
   <td>
    <p>{ts 1=$domain.phone 2=$domain.email}Please contact us at %1 or send email to %2 if you have questions.{/ts}</p>
   </td>
  </tr>

 </table>
</center>

</body>
</html>
', 39, false),array('modifier', 'date_format', 'string:<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title></title>
</head>
<body>

{capture assign=headerStyle}colspan="2" style="text-align: left; padding: 4px; border-bottom: 1px solid #999; background-color: #eee;"{/capture}
{capture assign=labelStyle }style="padding: 4px; border-bottom: 1px solid #999; background-color: #f7f7f7;"{/capture}
{capture assign=valueStyle }style="padding: 4px; border-bottom: 1px solid #999;"{/capture}

<center>
 <table width="620" border="0" cellpadding="0" cellspacing="0" id="crm-event_receipt" style="font-family: Arial, Verdana, sans-serif; text-align: left;">

  <!-- BEGIN HEADER -->
  <!-- You can add table row(s) here with logo or other header elements -->
  <!-- END HEADER -->

  <!-- BEGIN CONTENT -->

  <tr>
   <td>
    <p>{ts 1=$contact.display_name}Dear %1{/ts},</p>
    <p>{ts}Your Event Registration has been cancelled.{/ts}</p>
   </td>
  </tr>
  <tr>
   <td>
    <table style="border: 1px solid #999; margin: 1em 0em 1em; border-collapse: collapse; width:100%;">
     <tr>
      <th {$headerStyle}>
       {ts}Event Information and Location{/ts}
      </th>
     </tr>
     <tr>
      <td colspan="2" {$valueStyle}>
       {$event.event_title}<br />
       {$event.event_start_date|crmDate}{if $event.event_end_date}-{if $event.event_end_date|date_format:"%Y%m%d" == $event.event_start_date|date_format:"%Y%m%d"}{$event.event_end_date|crmDate:0:1}{else}{$event.event_end_date|crmDate}{/if}{/if}
      </td>
     </tr>
     <tr>
      <td {$labelStyle}>
       {ts}Participant Role{/ts}:
      </td>
      <td {$valueStyle}>
       {$participant.role}
      </td>
     </tr>

     {if $isShowLocation}
      <tr>
       <td colspan="2" {$valueStyle}>
        {if $event.location.address.1.name}
         {$event.location.address.1.name}<br />
        {/if}
        {if $event.location.address.1.street_address}
         {$event.location.address.1.street_address}<br />
        {/if}
        {if $event.location.address.1.supplemental_address_1}
         {$event.location.address.1.supplemental_address_1}<br />
        {/if}
        {if $event.location.address.1.supplemental_address_2}
         {$event.location.address.1.supplemental_address_2}<br />
        {/if}
        {if $event.location.address.1.city}
         {$event.location.address.1.city} {$event.location.address.1.postal_code}
         {if $event.location.address.1.postal_code_suffix}
          - {$event.location.address.1.postal_code_suffix}
         {/if}
        {/if}
       </td>
      </tr>
     {/if}

     {if $event.location.phone.1.phone || $event.location.email.1.email}
      <tr>
       <td colspan="2" {$labelStyle}>
        {ts}Event Contacts:{/ts}
       </td>
      </tr>
      {foreach from=$event.location.phone item=phone}
       {if $phone.phone}
        <tr>
         <td {$labelStyle}>
          {if $phone.phone_type}{$phone.phone_type_display}{else}{ts}Phone{/ts}{/if}
         </td>
         <td {$valueStyle}>
          {$phone.phone}
         </td>
        </tr>
       {/if}
      {/foreach}
      {foreach from=$event.location.email item=eventEmail}
       {if $eventEmail.email}
        <tr>
         <td {$labelStyle}>
          {ts}Email{/ts}
         </td>
         <td {$valueStyle}>
          {$eventEmail.email}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

     {if $contact.email}
      <tr>
       <th {$headerStyle}>
        {ts}Registered Email{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$valueStyle}>
        {$contact.email}
       </td>
      </tr>
     {/if}

     {if $register_date}
      <tr>
       <td {$labelStyle}>
        {ts}Registration Date{/ts}
       </td>
       <td {$valueStyle}>
        {$participant.register_date|crmDate}
       </td>
      </tr>
     {/if}

    </table>
   </td>
  </tr>

  <tr>
   <td>
    <p>{ts 1=$domain.phone 2=$domain.email}Please contact us at %1 or send email to %2 if you have questions.{/ts}</p>
   </td>
  </tr>

 </table>
</center>

</body>
</html>
', 39, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title></title>
</head>
<body>

<?php ob_start(); ?>colspan="2" style="text-align: left; padding: 4px; border-bottom: 1px solid #999; background-color: #eee;"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('headerStyle', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?>style="padding: 4px; border-bottom: 1px solid #999; background-color: #f7f7f7;"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('labelStyle', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?>style="padding: 4px; border-bottom: 1px solid #999;"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('valueStyle', ob_get_contents());ob_end_clean(); ?>

<center>
 <table width="620" border="0" cellpadding="0" cellspacing="0" id="crm-event_receipt" style="font-family: Arial, Verdana, sans-serif; text-align: left;">

  <!-- BEGIN HEADER -->
  <!-- You can add table row(s) here with logo or other header elements -->
  <!-- END HEADER -->

  <!-- BEGIN CONTENT -->

  <tr>
   <td>
    <p><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['contact']['display_name'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Dear %1<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>,</p>
    <p><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Your Event Registration has been cancelled.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
   </td>
  </tr>
  <tr>
   <td>
    <table style="border: 1px solid #999; margin: 1em 0em 1em; border-collapse: collapse; width:100%;">
     <tr>
      <th <?php echo $this->_tpl_vars['headerStyle']; ?>
>
       <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Event Information and Location<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
      </th>
     </tr>
     <tr>
      <td colspan="2" <?php echo $this->_tpl_vars['valueStyle']; ?>
>
       <?php echo $this->_tpl_vars['event']['event_title']; ?>
<br />
       <?php echo ((is_array($_tmp=$this->_tpl_vars['event']['event_start_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>
<?php if ($this->_tpl_vars['event']['event_end_date']): ?>-<?php if (((is_array($_tmp=$this->_tpl_vars['event']['event_end_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y%m%d") : smarty_modifier_date_format($_tmp, "%Y%m%d")) == ((is_array($_tmp=$this->_tpl_vars['event']['event_start_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y%m%d") : smarty_modifier_date_format($_tmp, "%Y%m%d"))): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['event']['event_end_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp, 0, 1) : smarty_modifier_crmDate($_tmp, 0, 1)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['event']['event_end_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>
<?php endif; ?><?php endif; ?>
      </td>
     </tr>
     <tr>
      <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
       <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Participant Role<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>:
      </td>
      <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
       <?php echo $this->_tpl_vars['participant']['role']; ?>

      </td>
     </tr>

     <?php if ($this->_tpl_vars['isShowLocation']): ?>
      <tr>
       <td colspan="2" <?php echo $this->_tpl_vars['valueStyle']; ?>
>
        <?php if ($this->_tpl_vars['event']['location']['address']['1']['name']): ?>
         <?php echo $this->_tpl_vars['event']['location']['address']['1']['name']; ?>
<br />
        <?php endif; ?>
        <?php if ($this->_tpl_vars['event']['location']['address']['1']['street_address']): ?>
         <?php echo $this->_tpl_vars['event']['location']['address']['1']['street_address']; ?>
<br />
        <?php endif; ?>
        <?php if ($this->_tpl_vars['event']['location']['address']['1']['supplemental_address_1']): ?>
         <?php echo $this->_tpl_vars['event']['location']['address']['1']['supplemental_address_1']; ?>
<br />
        <?php endif; ?>
        <?php if ($this->_tpl_vars['event']['location']['address']['1']['supplemental_address_2']): ?>
         <?php echo $this->_tpl_vars['event']['location']['address']['1']['supplemental_address_2']; ?>
<br />
        <?php endif; ?>
        <?php if ($this->_tpl_vars['event']['location']['address']['1']['city']): ?>
         <?php echo $this->_tpl_vars['event']['location']['address']['1']['city']; ?>
 <?php echo $this->_tpl_vars['event']['location']['address']['1']['postal_code']; ?>

         <?php if ($this->_tpl_vars['event']['location']['address']['1']['postal_code_suffix']): ?>
          - <?php echo $this->_tpl_vars['event']['location']['address']['1']['postal_code_suffix']; ?>

         <?php endif; ?>
        <?php endif; ?>
       </td>
      </tr>
     <?php endif; ?>

     <?php if ($this->_tpl_vars['event']['location']['phone']['1']['phone'] || $this->_tpl_vars['event']['location']['email']['1']['email']): ?>
      <tr>
       <td colspan="2" <?php echo $this->_tpl_vars['labelStyle']; ?>
>
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Event Contacts:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
       </td>
      </tr>
      <?php $_from = $this->_tpl_vars['event']['location']['phone']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['phone']):
?>
       <?php if ($this->_tpl_vars['phone']['phone']): ?>
        <tr>
         <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
          <?php if ($this->_tpl_vars['phone']['phone_type']): ?><?php echo $this->_tpl_vars['phone']['phone_type_display']; ?>
<?php else: ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Phone<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?>
         </td>
         <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
          <?php echo $this->_tpl_vars['phone']['phone']; ?>

         </td>
        </tr>
       <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
      <?php $_from = $this->_tpl_vars['event']['location']['email']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['eventEmail']):
?>
       <?php if ($this->_tpl_vars['eventEmail']['email']): ?>
        <tr>
         <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
          <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Email<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
         </td>
         <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
          <?php echo $this->_tpl_vars['eventEmail']['email']; ?>

         </td>
        </tr>
       <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
     <?php endif; ?>

     <?php if ($this->_tpl_vars['contact']['email']): ?>
      <tr>
       <th <?php echo $this->_tpl_vars['headerStyle']; ?>
>
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Registered Email<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
       </th>
      </tr>
      <tr>
       <td colspan="2" <?php echo $this->_tpl_vars['valueStyle']; ?>
>
        <?php echo $this->_tpl_vars['contact']['email']; ?>

       </td>
      </tr>
     <?php endif; ?>

     <?php if ($this->_tpl_vars['register_date']): ?>
      <tr>
       <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Registration Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
       </td>
       <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
        <?php echo ((is_array($_tmp=$this->_tpl_vars['participant']['register_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>

       </td>
      </tr>
     <?php endif; ?>

    </table>
   </td>
  </tr>

  <tr>
   <td>
    <p><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['domain']['phone'],'2' => $this->_tpl_vars['domain']['email'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Please contact us at %1 or send email to %2 if you have questions.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
   </td>
  </tr>

 </table>
</center>

</body>
</html>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>