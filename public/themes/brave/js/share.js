// Wait for the window to load
window.onload = function () {

  var articleUrl = window.location.href;
  var articleTitle = document.querySelectorAll('.article-title')[0].textContent;
  var fbShareButton = document.querySelectorAll('.facebook')[0];
  var twShareButton = document.querySelectorAll('.twitter')[0];
  var lnShareButton = document.querySelectorAll('.linkedin')[0];

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

};