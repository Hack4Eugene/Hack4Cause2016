<?php /* Smarty version 2.6.27, created on 2016-02-14 08:31:02
         compiled from CRM/Campaign/Form/addCampaignToComponent.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Campaign/Form/addCampaignToComponent.tpl', 1, false),array('block', 'ts', 'CRM/Campaign/Form/addCampaignToComponent.tpl', 30, false),array('function', 'help', 'CRM/Campaign/Form/addCampaignToComponent.tpl', 19, false),array('modifier', 'crmAddClass', 'CRM/Campaign/Form/addCampaignToComponent.tpl', 23, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php if ($this->_tpl_vars['campaignContext'] == 'componentSearch'): ?>

<tr class="<?php echo $this->_tpl_vars['campaignTrClass']; ?>
">
    <?php $this->assign('elementName', $this->_tpl_vars['campaignInfo']['elementName']); ?>

    <td class="<?php echo $this->_tpl_vars['campaignTdClass']; ?>
"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['elementName']]['label']; ?>
<br />
    <div class="crm-select-container"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['elementName']]['html']; ?>
</div>
    </td>
</tr>

<?php else: ?>

<?php if ($this->_tpl_vars['campaignInfo']['showAddCampaign']): ?>

    <tr class="<?php echo $this->_tpl_vars['campaignTrClass']; ?>
">
        <td class="label"><?php echo $this->_tpl_vars['form']['campaign_id']['label']; ?>
 <?php echo smarty_function_help(array('id' => "id-campaign_id",'file' => "CRM/Campaign/Form/addCampaignToComponent.hlp"), $this);?>
</td>
        <td class="view-value">
                  <?php if ($this->_tpl_vars['campaignInfo']['hasCampaigns']): ?>
            <?php echo ((is_array($_tmp=$this->_tpl_vars['form']['campaign_id']['html'])) ? $this->_run_mod_handler('crmAddClass', true, $_tmp, 'huge') : smarty_modifier_crmAddClass($_tmp, 'huge')); ?>

                      <?php if (( $this->_tpl_vars['action'] == 1 || $this->_tpl_vars['action'] == 2 ) && ! $this->_tpl_vars['campaignInfo']['alreadyIncludedPastCampaigns'] && $this->_tpl_vars['campaignInfo']['includePastCampaignURL']): ?>
                <br />
                <a id='include-past-campaigns' href='#' onClick='includePastCampaigns( "campaign_id" ); return false;'>
                   &raquo;
                   <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Show past campaign(s) in this select list.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                </a>
            <?php endif; ?>
            <?php else: ?>
            <div class="status">
            <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>There are currently no active Campaigns.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
            <?php if ($this->_tpl_vars['campaignInfo']['addCampaignURL']): ?>
              <?php ob_start(); ?>href="<?php echo $this->_tpl_vars['campaignInfo']['addCampaignURL']; ?>
" class="action-item"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('link', ob_get_contents());ob_end_clean(); ?>
              <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['link'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>If you want to associate this record with a campaign, you can <a %1>create a campaign here</a>.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
            <?php endif; ?> <?php echo smarty_function_help(array('id' => "id-campaign_id",'file' => "CRM/Campaign/Form/addCampaignToComponent.hlp"), $this);?>

            </div>
          <?php endif; ?>
        </td>
    </tr>


<?php echo '
<script type="text/javascript">
function includePastCampaigns()
{
    //hide past campaign link.
    cj( "#include-past-campaigns" ).hide( );

    var campaignUrl = '; ?>
'<?php echo $this->_tpl_vars['campaignInfo']['includePastCampaignURL']; ?>
'<?php echo ';
    cj.post( campaignUrl,
             null,
             function( data ) {
          if ( data.status != \'success\' ) return;

          //first reset all select options.
         cj( "#campaign_id" ).val( \'\' );
             cj( "#campaign_id" ).html( \'\' );
         cj(\'input[name="included_past_campaigns"]\').val( 1 );

         var campaigns = data.campaigns;

         //build the new options.
         for ( campaign in campaigns ) {
              title = campaigns[campaign].title;
              value = campaigns[campaign].value;
              className = campaigns[campaign].class;
              if ( !title ) continue;
              cj(\'#campaign_id\').append( cj(\'<option></option>\').val(value).html(title).addClass(className) );
          }
           },
           \'json\');
}
</script>
'; ?>



<?php endif; ?>
<?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>