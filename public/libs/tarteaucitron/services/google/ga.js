
tarteaucitron.user.gajsUa = 'UA-XXXXXXXX-X';
tarteaucitron.user.gajsMore = function () { /* add here your optionnal _ga.push() */ };
(tarteaucitron.job = tarteaucitron.job || []).push('gajs');


// Marqueur du service (à supprimer si installé)
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-XXXXXXX-X']);
_gaq.push(['_trackPageview']);

(function() {
    var ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);
})();