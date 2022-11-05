var registerServiceWorker = url => {
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('/service-worker.js')
      .then(function(registration) {
        console.log('Registration successful, scope is:', registration.scope);
      })
      .catch(function(error) {
        console.log('Service worker registration failed, error:', error);
      });
    } else {
        console.log("Could not find serviceWorker in navigator");
    }
};
var service_worker = $('meta[name="service_worker"]');
if(service_worker.length > 0 && $('[rel="manifest"]').length > 0) registerServiceWorker(service_worker.attr('content'));
