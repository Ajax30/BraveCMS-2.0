// Wait for the window to load
window.onload = function () { 
  var articleUrl = window.location.href;
  if (document.querySelector('.article-title')) {
    var articleTitle = document.querySelector('.article-title').textContent;
    var fbShareButton = document.querySelector('.facebook');
    var twShareButton = document.querySelector('.twitter');
    var lnShareButton = document.querySelector('.linkedin');

    fbShareButton.addEventListener('click', function () {
      window.open('https://www.facebook.com/sharer/sharer.php?u=' + articleUrl,
        'facebook-share-dialog',
        'width=800,height=600'
      );
      return false;
    });

    twShareButton.addEventListener('click', function () {
      window.open(`https://twitter.com/share?url=${articleUrl}`);
      return false;
    });

    lnShareButton.addEventListener('click', function () {
      window.open(`https://www.linkedin.com/shareArticle?mini=true&url=${articleUrl}&title=${articleTitle}`)
      return false;
    });
  }
};