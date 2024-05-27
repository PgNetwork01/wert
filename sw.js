// // Service worker code (sw.js)

// // Define the name and version of the cache
// const cacheName = 'my-site-cache-v1';

// // List of URLs to cache
// const urlsToCache = [
//   '/',
//   'style.css',
//   'media.css',
//   'import.css',
//   'index.js'
// ];

// // Install event: cache assets
// self.addEventListener('install', event => {
//   event.waitUntil(
//     caches.open(cacheName)
//       .then(cache => cache.addAll(urlsToCache))
//   );
// });

// // Fetch event: serve assets from cache if available, otherwise fetch from network
// self.addEventListener('fetch', event => {
//   event.respondWith(
//     caches.match(event.request)
//       .then(response => {
//         // Cache hit - return response
//         if (response) {
//           return response;
//         }
//         // No cache match - fetch from network
//         return fetch(event.request);
//       })
//   );
// });
