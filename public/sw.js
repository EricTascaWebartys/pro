importScripts('https://storage.googleapis.com/workbox-cdn/releases/6.4.1/workbox-sw.js');

workbox.routing.registerRoute(
    new RegExp("/"),
    workbox.strategies.networkFirst({
        cacheName: "image-cache",
        plugins: [
            new workbox.cacheableResponse.Plugin({
                statuses: [0, 200]
            })
        ]
    })
);

workbox.routing.registerRoute(
    // Cache CSS files
    /.*\.js/,
    // Use cache but update in the background ASAP
    workbox.strategies.networkFirst({
        // Use a custom cache name
        cacheName: 'js-cache',
    })
);

workbox.routing.registerRoute(
    // Cache CSS files
    /.*\.css/,
    // Use cache but update in the background ASAP
    workbox.strategies.networkFirst({
        // Use a custom cache name
        cacheName: 'css-cache',
    })
);
workbox.routing.registerRoute(
    // Cache image files
    /.*\.(?:png|jpg|jpeg|svg|gif)/,
    // Use the cache if it's available
    workbox.strategies.networkFirst({
        // Use a custom cache name
        cacheName: 'image-cache',
        plugins: [
            new workbox.expiration.Plugin({
                // Cache only 20 images
                maxEntries: 20,
                // Cache for a maximum of a week
                maxAgeSeconds: 7 * 24 * 60 * 60,
            })
        ],
    })
);

workbox.routing.registerRoute(
    new RegExp('^https://fonts.googleapis.com/'),
    workbox.strategies.networkFirst({
        cacheName: 'third-cache',
        plugins: [
            new workbox.cacheableResponse.Plugin({
                statuses: [0, 200],
            })
        ]
    })
);


workbox.precaching.precacheAndRoute(self.__precacheManifest || []);
self.addEventListener('fetch', function(evt) {
    console.log('The service worker is serving the asset.');
    evt.respondWith(fromCache(evt.request));
});  

self.addEventListener("fetch", function(event) {
    event.respondWith(
        caches.match(event.request).then(function(response) {
            return response || fetch(event.request);
        })
    );
});

// pre-cache pages
workbox.precaching.precacheAndRoute([{
    url: '/',
    revision: Date.now()
}])

/**
 * save pages to cache on visit & serve when offline
 * or if not cached then serve the "offline view"
 */
const customHandler = async(args) => {
    try {
        return await workbox.strategies.networkFirst({
            cacheName: 'pages',
            plugins: [
                new workbox.expiration.Plugin({
                    maxEntries: 20,
                    purgeOnQuotaError: true
                })
            ]
        }).handle(args) || caches.match('offline')
    } catch (error) {
        return caches.match('offline')
    }
}

const navigationRoute = new workbox.routing.NavigationRoute(customHandler, {
    // dont cache this urls
    blacklist: [
        new RegExp('/(login|register|password|auth)'),
        new RegExp('/admin')
    ]
})

workbox.routing.registerRoute(navigationRoute)
