(function() {
  var sanitise_str;

  sanitise_str = function(str) {
    if (str && str !== "") {
      return 'jckpc-' + str.replace(/[^a-zA-Z0-9-_]/g, '-').toLowerCase();
    }
    return "";
  };

  jQuery(function($) {
    var varSelects;
    $("#jckpc_images").hide();
    varSelects = 'form.variations_form select';
    $('#category-menu .label').on('touchstart', function() {
      return $(this).parent().addClass('touch').toggleClass('active');
    });
    $('.size-finish-info a').on('click', function() {
      var p;
      p = $(".entry-footer").offset().top;
      return $('html,body').animate({
        scrollTop: p
      }, 800, 'easeInOutCubic');
    });
    $(document).on('change', varSelects, function() {
      var $selectField, $variationsForm, selectedAtt, selectedVal;
      $selectField = $(this);
      $variationsForm = $selectField.closest('form');
      selectedAtt = sanitise_str($selectField.attr('name'));
      selectedVal = sanitise_str($selectField.val());
      if (selectedVal.length > 0) {
        $("#image_container").addClass("hidden");
        $("#jckpc_images").fadeIn(200);
      } else {
        $("#jckpc_images").fadeOut(200);
        $("#image_container").removeClass("hidden");
      }
      return $(varSelects).each(function(index) {
        $(this).prop("disabled", false);
        if ($(this).find('option').length === 2) {
          if ($(this).prop('selectedIndex') !== 1) {
            return $(this).prop('selectedIndex', 1).trigger("change");
          }
        }
      });
    });
    return this;
  });

}).call(this);
