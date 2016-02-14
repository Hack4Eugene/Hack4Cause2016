jQuery(document).ready(function($) {
  // Create send to backpack buttons for all unlocked achievements.
  jQuery('div.achievement-unlocked').each(function (index) {
    var body = jQuery(this).children('div.achievement-body');
    var image = jQuery(this).children('div.achievement-image');
    var a = image.children('a');
    var i = a.children('img');
    var ext = i.attr('src').split('.').pop().toLowerCase();
    // Only create a link for the badge if the badge image is in .png format.
    if (ext == 'png') {
      var bpButton = '<input alt="Send to Mozilla Open Badge Backpack" title="Send to Mozilla Open Badge Backpack" type="button" class="achievement-openbadges-backpack-button">';
      image.append(bpButton);
    }
  });
  // Bind send buttons to the OpenBadges function.
  jQuery('.achievement-openbadges-backpack-button').bind('click', function() {
    // Build the url for the assertion and call the OpenBadges function to issue the assertion.
    var title = jQuery(this).parent('div.achievement-image').parent('div.achievement').children('div.achievement-body').children('div.achievement-title').text();
    var url = Drupal.settings.baseRoot + Drupal.settings.basePath + 'amobb/assertions/' + encodeURIComponent(title) + '/' + Drupal.settings.uid;
    OpenBadges.issue([url], function(errors, successes) {
      // For logging errors.
       //alert(errors[0]['url']+errors[0]['reason']);
    });
  });
});
