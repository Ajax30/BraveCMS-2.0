/* Infinite comments
* ------------------------------------------------------ */
$(document).ready(function () {

    let varCommentsPageCount = 0;
    let varCommentsCurrentPageNumber = 0;
    let flagCommentsNoMoreComments = false;
    let flagCommentsBlockNewRequest = false;


    infiniteComments();


    function infiniteComments() {
        var page = 1;
        $(window).scroll(function () {
            if (flagCommentsBlockNewRequest === false) {
                if ($(window).scrollTop() + $(window).height() >= $(document).height() - $('.s-footer').height()) {
                    page++;
                    flagCommentsBlockNewRequest = true;
                    loadMoreData(page);
                }
            }
        });
    }


    function loadMoreData(page) {
        let base_url = window.location.origin
        $.ajax({
            url: base_url + '/load_comments',
            type: 'POST',
            dataType: 'json',
            data: {'_token': token, 'page': page, 'article_id': article_id},
            beforeSend: function () {
                $('.ajax-load').show();
            }
        })
            .done(function (data) {
                // console.table(data);
                $('.ajax-load').hide();
                let commentHtml = data.html;
                if (!data.no_more_comments) {
                    if (commentHtml !== '') {
                        $(".infinite-scroll").append(commentHtml);
                    }
                }
                flagCommentsBlockNewRequest = false;
            })
            .fail(function () {
                console.log('loadMoreData Response Failed');
                flagCommentsBlockNewRequest = false;
            });
    }
});
