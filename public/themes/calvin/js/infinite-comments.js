/* Infinite comments
* ------------------------------------------------------ */
$(document).ready(function () {
    infiniteComments();


    function infiniteComments() {
        var page = 1;
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - $('.s-footer').height()) {
                page++;
                loadMoreData(page);
            }
        });
    }


    function loadMoreData(page) {
        let base_url = window.location.origin
        $.ajax({
            url: base_url +'/load_comments',
            type: 'POST',
            dataType: 'json',
            data: {'_token': token, 'page': page, 'article_id': article_id},
            beforeSend: function () {
                $('.ajax-load').show();
            }
        })
            .done(function (data) {
                $('.ajax-load').hide();
                if(data.html !== '') {
                    $(".infinite-scroll").append(data.html);
                }
            })
            .fail(function () {
                console.log('loadMoreData Response Failed');
            });
    }
});
