<?php /* Smarty version 2.6.27, created on 2016-02-14 08:32:11
         compiled from CRM/common/batchCopy.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/common/batchCopy.tpl', 1, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo '
<script type="text/javascript">
  CRM.$(function($) {
    /**
     * This function use to copy fields
     *
     * @param fname string field name
     * @return void
     */
    function copyFieldValues( fname ) {
      // this is the most common pattern for elements, so first check if it exits
      // this check field starting with "field[" and contains [fname] and is not
      // hidden ( for checkbox hidden element is created )
      var elementId    = $(\'.crm-copy-fields [name^="field["][name*="[\' + fname +\']"][type!=hidden]\');

      // get the first element and it\'s value
      var firstElement = elementId.eq(0);
      var firstElementValue = firstElement.val();

      //check if it is date element
      var isDateElement     = elementId.attr(\'format\');

      // check if it is wysiwyg element
      var editor = elementId.attr(\'editor\');

      //get the element type
      var elementType       = elementId.attr(\'type\');

      // set the value for all the elements, elements needs to be handled are
      // select, checkbox, radio, date fields, text, textarea, multi-select
      // wysiwyg editor, advanced multi-select ( to do )
      if ( elementType == \'radio\' ) {
        firstElementValue = elementId.filter(\':checked\').eq(0).val();
        elementId.filter("[value=" + firstElementValue + "]").prop("checked",true).change();
      }
      else if ( elementType == \'checkbox\' ) {
        // handle checkbox
        // get the entity id of first element
        var firstEntityId = $(\'.crm-copy-fields > tbody > tr\');

        if ( firstEntityId.length == 0 ) {
          firstEntityId = firstElement.closest(\'div.crm-grid-row\');
        }

        firstEntityId = firstEntityId.attr(\'entity_id\');

        var firstCheckElement = $(\'.crm-copy-fields [type=checkbox][name^="field[\'+ firstEntityId +\'][\'+ fname +\']"][type!=hidden]\');

        if ( firstCheckElement.length > 1 ) {
          // lets uncheck all the checkbox except first one
          $(\'.crm-copy-fields [type=checkbox][name^="field["][name*="[\' + fname +\']"][type=checkbox]:not([name^="field[\'+ firstEntityId +\'][\'+ fname +\']["])\').prop(\'checked\', false);

          //here for each checkbox for first row, check if it is checked and set remaining checkboxes
          firstCheckElement.each(function() {
            if ($(this).prop(\'checked\') ) {
              var elementName = $(this).attr(\'name\');
              var correctIndex = elementName.split(\'field[\'+ firstEntityId +\'][\'+ fname +\'][\');
              correctIndexValue = correctIndex[1].replace(\']\', \'\');
              $(\'.crm-copy-fields [type=checkbox][name^="field["][name*="[\'+ fname +\'][\'+ correctIndexValue+\']"][type!=hidden]\').prop(\'checked\',true).change();
            }
          });
        }
        else {
          if ( firstCheckElement.prop(\'checked\') ) {
            $(\'.crm-copy-fields [type=checkbox][name^="field["][name*="[\'+ fname +\']"][type!=hidden]\').prop(\'checked\',true).change();
          }
          else {
            $(\'.crm-copy-fields [type=checkbox][name^="field["][name*="[\'+ fname +\']"][type!=hidden]\').prop(\'checked\', false).change();
          }
        }
      }
      else if ( editor ) {
        var firstElementId = firstElement.attr(\'id\');
        switch ( editor ) {
          case \'ckeditor\':
            //get the content of first element
            oEditor = CKEDITOR.instances[firstElementId];
            var htmlContent = oEditor.getData( );

            // copy first element content to all the elements
            elementId.each( function() {
              var elemtId = $(this).attr(\'id\');
              oEditor = CKEDITOR.instances[elemtId];
              oEditor.setData( htmlContent );
            });
            break;
          case \'tinymce\':
            //get the content of first element
            var htmlContent = tinyMCE.get( firstElementId ).getContent();

            // copy first element content to all the elements
            elementId.each( function() {
              var elemtId = $(this).attr(\'id\');
              tinyMCE.get( elemtId ).setContent( htmlContent );
            });
            break;
          case \'joomlaeditor\':
          // TO DO
          case \'drupalwysiwyg\':
          // TO DO
          default:
            elementId.val( firstElementValue ).change();

        }
      }
      else {
        if (elementId.is(\'select\') === true && firstElement.parent().find(\':input\').select().index() >= 1 && firstElement.parent().find(\'select\').select().index < 1) {
          // its a multiselect case
          firstElement.parent().find(\':input\').select().each( function(count) {
            var firstElementValue = $(this).val();
            var elementId = $(\'.crm-copy-fields [name^="field["][name*="[\' + fname +\'][\' + count + \'"][type!=hidden]\');
            elementId.val(firstElementValue).not(":first").change();
          });
        }
        else {
          elementId.val(firstElementValue).change();
        }
      }

      // since we use different display field for date we also need to set it.
      // also check for date time field and set the value correctly
      if ( isDateElement ) {
        copyValuesDate( fname );
      }
    }

    /**
     * Special function to handle setting values for date fields
     *
     * @param fname string field name
     * @return void
     */
    function copyValuesDate(fname) {
      var displayElement = $(\'.crm-copy-fields [name^="field_"][name*="_\' + fname +\'_display"]:visible\');
      var timeElement    = $(\'.crm-copy-fields [name^="field["][name*="[\' + fname +\'_time]"][type!=hidden]\');

      displayElement.val( displayElement.eq(0).val() );
      timeElement.val( timeElement.eq(0).val() );
    }

    //bind the click event for action icon
    $(\'.action-icon\').click(function( ) {
      copyFieldValues($(this).attr(\'fname\'));
    });
  });


</script>
'; ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>