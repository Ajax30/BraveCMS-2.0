/* Infinite comments
* ------------------------------------------------------ */
$(document).ready(function () {

    // console.log('Loaded infinite-comments.js');

    let flagMoreCommentsToDisplay = true;
    let flagCommentsBlockNewRequest = false;
    let domInfiniteScroll = $(".infinite-scroll");

    infiniteComments();

    function infiniteComments() {
        let page = 1;
        $(window).scroll(function () {
            if (flagCommentsBlockNewRequest === false) {
                if ($(window).scrollTop() + $(window).height() >= $(document).height() - $('.s-footer').height()) {
                    if (flagMoreCommentsToDisplay) {
                        flagCommentsBlockNewRequest = true;
                        page++;
                        loadMoreData(page);
                    }
                }
            }
        });
    }

    function loadMoreData(page) {
        let base_url = window.location.origin
        $.ajax({
            url: base_url + '/load_comments',
            type: 'POST', dataType: 'json',
            data: {'_token': token, 'page': page, 'article_id': article_id},
            beforeSend: function () {
                $('.ajax-load').show();
            }
        })
            .done(function (data) {
                $('.ajax-load').hide();
                let commentHtml = data.html;
                flagMoreCommentsToDisplay = data.more_comments_to_display;
                if (flagMoreCommentsToDisplay) {
                    if (commentHtml !== '') {
                        domInfiniteScroll.append(commentHtml);
                    }
                }
                flagCommentsBlockNewRequest = false;
            })
            .fail(function () {
                flagCommentsBlockNewRequest = false;
            });
    }
});
