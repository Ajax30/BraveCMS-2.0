    /* Infinite comments
  * ------------------------------------------------------ */
    function infiniteComments() {
      var page = 1; 
      $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - $('.s-footer').height()) {
          page++;
          loadMoreData(page);
        }
      });
    }

    function loadMoreData(page){
      var base_url = window.location.href.split('?')[0];
      $.ajax({
          url: `${base_url}?page=${page}`,
          type: "get",
          beforeSend: function() {
            $('.ajax-load').show();
          }
        })
        .done(function(data) {
          if (data.html == "") {
            $('.ajax-load').hide();
            return;
          }
          $('.ajax-load').hide();
          $(".infinite-scroll").append(data.html);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
          console.log('The server is not responding...');
        });
    }

    $(document).ready(function(){
      infiniteComments();
    });