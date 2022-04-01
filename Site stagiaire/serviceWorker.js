const assets = [
    // "./index.php",
];




self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open("static").then((cache) => {
            return cache.addAll(assets);
        })
    );
});

self.addEventListener("fetch", function(event) {
    event.respondWith(
        caches.match(event.request).then((response) => {
            return response || fetch(event.request);
        })
    );
});