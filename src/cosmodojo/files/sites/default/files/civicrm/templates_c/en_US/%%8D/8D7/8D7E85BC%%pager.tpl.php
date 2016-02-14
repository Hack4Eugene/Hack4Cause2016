<?php /* Smarty version 2.6.27, created on 2016-02-14 08:31:02
         compiled from CRM/common/pager.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/common/pager.tpl', 1, false),array('block', 'ts', 'CRM/common/pager.tpl', 51, false),array('modifier', 'json_encode', 'CRM/common/pager.tpl', 67, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php if ($this->_tpl_vars['pager'] && $this->_tpl_vars['pager']->_response): ?>
    <?php if ($this->_tpl_vars['pager']->_response['numPages'] > 1): ?>
        <div class="crm-pager">
            <span class="element-right">
            <?php if ($this->_tpl_vars['location'] == 'top'): ?>
              <?php echo $this->_tpl_vars['pager']->_response['titleTop']; ?>

            <?php else: ?>
              <?php echo $this->_tpl_vars['pager']->_response['titleBottom']; ?>

            <?php endif; ?>
            </span>
          </span>
          <span class="crm-pager-nav">
          <?php echo $this->_tpl_vars['pager']->_response['first']; ?>
&nbsp;
          <?php echo $this->_tpl_vars['pager']->_response['back']; ?>
&nbsp;
          <?php echo $this->_tpl_vars['pager']->_response['next']; ?>
&nbsp;
          <?php echo $this->_tpl_vars['pager']->_response['last']; ?>
&nbsp;
          <?php echo $this->_tpl_vars['pager']->_response['status']; ?>

          </span>

        </div>
    <?php endif; ?>

        <?php if ($this->_tpl_vars['location'] == 'bottom' && $this->_tpl_vars['pager']->_totalItems > 25): ?>
     <div class="form-item float-right">
       <label for="<?php echo $this->_tpl_vars['form']['formClass']; ?>
-rows-per-page-select"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Rows per page:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label> &nbsp;
       <input class="crm-rows-per-page-select" id="<?php echo $this->_tpl_vars['form']['formClass']; ?>
-rows-per-page-select" type="text" size="3" value="<?php echo $this->_tpl_vars['pager']->_perPage; ?>
"/>
     </div>
     <div class="clear"></div>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['location'] != 'top'): ?>
      <script type="text/javascript">
        <?php echo '
        CRM.$(function($) {
          '; ?>

          var
            $form = $(<?php if (empty ( $this->_tpl_vars['form']['formClass'] )): ?>'#crm-main-content-wrapper'<?php else: ?>'form.<?php echo $this->_tpl_vars['form']['formClass']; ?>
'<?php endif; ?>),
            numPages = <?php echo $this->_tpl_vars['pager']->_response['numPages']; ?>
,
            currentPage = <?php echo $this->_tpl_vars['pager']->_response['currentPage']; ?>
,
            perPageCount = <?php echo $this->_tpl_vars['pager']->_perPage; ?>
,
            currentLocation = <?php echo ((is_array($_tmp=$this->_tpl_vars['pager']->_response['currentLocation'])) ? $this->_run_mod_handler('json_encode', true, $_tmp) : json_encode($_tmp)); ?>
,
            spinning = null,
            refreshing = false;
          <?php echo '
          function refresh(url) {
            if (!refreshing) {
              refreshing = true;
              var options = url ? {url: url} : {};
              $form.off(\'.crm-pager\').closest(\'.crm-ajax-container, #crm-main-content-wrapper\').crmSnippet(options).crmSnippet(\'refresh\');
            }
          }
          function page(num) {
            num = parseInt(num, 10);
            if (isNaN(num) || num < 1 || num > numPages || num === currentPage) {
              return;
            }
            refresh(currentLocation.replace(/crmPID=\\d+/, \'crmPID=\' + num));
          }
          function changeCount(num) {
            num = parseInt(num, 10);
            if (isNaN(num) || num < 1 || num === perPageCount) {
              return;
            }
            refresh(currentLocation.replace(/&crmRowCount=\\d+/, \'\') + \'&crmRowCount=\' + num);
          }
          function preventSubmit(e) {
            if (e.keyCode == 13) {
              e.preventDefault();
              $(this).trigger(\'change\');
              return false;
            }
          }
          $(\'input[name^=crmPID]\', $form)
            .spinner({
              min: 1,
              max: numPages
            })
            .on(\'change\', function() {
              page($(this).spinner(\'value\'));
            })
            .on(\'keyup keydown keypress\', preventSubmit);
          $(\'input.crm-rows-per-page-select\', $form)
            .spinner({
              min: 25,
              step: 25
            })
            .on(\'change\', function() {
              changeCount($(this).spinner(\'value\'));
            })
            .on(\'keyup keydown keypress\', preventSubmit);
          $form
            .on(\'click.crm-pager\', \'a.ui-spinner-button\', function(e) {
              var $el = $(this);
              // Update after a short delay to allow multiple clicks
              spinning !== null && window.clearTimeout(spinning);
              spinning = window.setTimeout(function() {
                if ($el.is(\'.crm-pager a\')) {
                  page($el.siblings(\'input[name^=crmPID]\').spinner(\'value\'));
                } else {
                  changeCount($el.siblings(\'input.crm-rows-per-page-select\').spinner(\'value\'));
                }
              }, 200);
            })
            // Handle sorting, paging and alpha filtering links
            .on(\'click.crm-pager\', \'a.crm-pager-link, #alpha-filter a, th a.sorting, th a.sorting_desc, th a.sorting_asc\', function(e) {
              refresh($(this).attr(\'href\'));
              e.preventDefault();
            });
        });
        '; ?>

      </script>
    <?php endif; ?>

<?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>