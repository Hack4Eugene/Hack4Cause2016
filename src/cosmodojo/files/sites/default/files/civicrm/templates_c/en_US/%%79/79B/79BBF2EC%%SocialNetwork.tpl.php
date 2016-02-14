<?php /* Smarty version 2.6.27, created on 2016-02-14 08:39:34
         compiled from CRM/common/SocialNetwork.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/common/SocialNetwork.tpl', 1, false),array('block', 'ts', 'CRM/common/SocialNetwork.tpl', 29, false),array('modifier', 'replace', 'CRM/common/SocialNetwork.tpl', 39, false),array('modifier', 'escape', 'CRM/common/SocialNetwork.tpl', 49, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<div class="crm-section crm-socialnetwork help">
    <h3 class="nobackground"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Help spread the word<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></h3>
    <div class="description">
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Please help us and let your friends, colleagues and followers know about our page<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php if ($this->_tpl_vars['title']): ?>:
        <span class="bold"><a href="<?php echo $this->_tpl_vars['pageURL']; ?>
"><?php echo $this->_tpl_vars['title']; ?>
</a></span>
        <?php else: ?>.<?php endif; ?>
    </div>
    <div class="crm-fb-tweet-buttons">
        <?php if ($this->_tpl_vars['emailMode'] == true): ?>
                        <a href="http://twitter.com/share?url=<?php echo $this->_tpl_vars['url']; ?>
&amp;text=<?php echo $this->_tpl_vars['title']; ?>
" id="crm_tweet">
                <img title="Twitter Tweet Button" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['config']->userFrameworkResourceURL)) ? $this->_run_mod_handler('replace', true, $_tmp, 'https://', 'http://') : smarty_modifier_replace($_tmp, 'https://', 'http://')); ?>
/i/tweet.png" width="55px" height="20px"  alt="Tweet Button">
            </a>
            <a href="http://www.facebook.com/plugins/like.php?href=<?php echo $this->_tpl_vars['url']; ?>
" target="_blank">
                <img title="Facebook Like Button" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['config']->userFrameworkResourceURL)) ? $this->_run_mod_handler('replace', true, $_tmp, 'https://', 'http://') : smarty_modifier_replace($_tmp, 'https://', 'http://')); ?>
/i/fblike.png" alt="Facebook Button" />
            </a>
        <?php else: ?>
            <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
                        <div class="label">
                <iframe allowtransparency="true" frameborder="0" scrolling="no"
                src="https://platform.twitter.com/widgets/tweet_button.html?text=<?php echo $this->_tpl_vars['title']; ?>
&amp;url=<?php echo ((is_array($_tmp=$this->_tpl_vars['url'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"
                style="width:100px; height:20px;">
                </iframe>
            </div>
            <div class="label">
                <g:plusone href=<?php echo $this->_tpl_vars['url']; ?>
></g:plusone>
            </div>
            <div class="label" style="width:300px;">
                <iframe src="https://www.facebook.com/plugins/like.php?app_id=240719639306341&amp;href=<?php echo ((is_array($_tmp=$this->_tpl_vars['url'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&amp;send=false&amp;layout=standard&amp;show_faces=false&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:30px;" allowTransparency="true">
                </iframe>
            </div>
            <div class="label">
              <script src="https://platform.linkedin.com/in.js" type="text/javascript"></script>
              <script type="IN/Share" data-url=<?php echo $this->_tpl_vars['url']; ?>
 data-counter="right"></script>
            </div>
        <?php endif; ?>
    </div>
    <?php if ($this->_tpl_vars['pageURL']): ?>
      <?php if ($this->_tpl_vars['emailMode'] != true): ?>
        <br/>
      <?php endif; ?>
      <br/>
      <div class="clear"></div>
      <div>
        <span class="bold"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>You can also share the below link in an email or on your website.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
        <br/>
        <a href="<?php echo $this->_tpl_vars['pageURL']; ?>
"><?php echo $this->_tpl_vars['pageURL']; ?>
</a>
      </div>
    <?php else: ?>
      <div class="clear"></div>
    <?php endif; ?>
</div>


<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>