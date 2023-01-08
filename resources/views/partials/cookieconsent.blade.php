<script>
  window.cookieconsent.initialise({
  container: document.getElementById("cookieconsent"),
  palette:{
  popup: {background: "#323232"},
  button: {background: "#41B883"},
  },
  revokable: true,
  onStatusChange: function(status) {
  console.log(this.hasConsented() ?
    'enable cookies' : 'disable cookies');
  },
  "position": "bottom-left",
  "theme": "classic",
  "secure": true,
  "content": {
    "header": 'Cookies used on the website!',
    "message": 'This website uses cookies to improve your experience.',
    "dismiss": 'Accept cookies!',
    "allow": 'Allow cookies',
    "deny": 'Decline',
    "link": 'Learn more',
    "close": '&#x274c;',
    "policy": 'Cookie Policy',
    "target": '_blank',
    }
});
</script>