(function($) {

  // Add subscriber via AJAX
  $("#newsletterForm").validate({
    rules: {
      email: {
        email: true
      }
    },

    submitHandler: function(form) {
      var form = $("#newsletterForm"),
      $fields = form.find('input[type="email"]'),
      url = form.attr('action'),
      data = form.serialize();
      $.ajax({
        dataType: "json",
        type: "post",
        url: url,
        data: data,
        cache: false,
        success: function(response) {
          $('#messags').slideDown(250).delay(2500).slideUp(250);
          $fields.val('');
          if (response.is_new_subscriber === true) {
            $('#messags .success').show();
            $('#messags .notnew').hide();
          } else {
            $('#messags .notnew').show();
          }
        },
        error: function() {
          $('#messags .fail').show();
        }
      });
    }
  });

})(jQuery);