var registerServiceWorker = url => {
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register(url)
        .then(function(reg) {
            console.log("Service worker registered: "+url);
        }).catch(function(err) {
            alert(err)
        });
    } else {
        console.log("Could not find serviceWorker in navigator");
    }
};
var service_worker = $('meta[name="service_worker"]');
if(service_worker.length > 0 && $('[rel="manifest"]').length > 0) registerServiceWorker(service_worker.attr('content'));