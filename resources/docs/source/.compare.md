---
title: API Reference

language_tabs:
- bash
- javascript
- php

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/ielts_tinder/public/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_4b90f657df4927ac7a249b99226ea7e1 -->
## Get the index of a given version.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/docs/search-index/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/docs/search-index/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/docs/search-index/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (403):

```json
{
    "message": ""
}
```

### HTTP Request
`GET docs/search-index/{version}`


<!-- END_4b90f657df4927ac7a249b99226ea7e1 -->

<!-- START_568f07577ee68f8b1116e97fd4a5d842 -->
## docs/styles/{style}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/docs/styles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/docs/styles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/docs/styles/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET docs/styles/{style}`


<!-- END_568f07577ee68f8b1116e97fd4a5d842 -->

<!-- START_7cdb95077f4d2842f8268003be0400e6 -->
## docs/scripts/{script}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/docs/scripts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/docs/scripts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/docs/scripts/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET docs/scripts/{script}`


<!-- END_7cdb95077f4d2842f8268003be0400e6 -->

<!-- START_b49197dda1e390d1c17aa2d177702247 -->
## Redirect the index page of docs to the default version.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/docs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/docs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/docs',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET docs`


<!-- END_b49197dda1e390d1c17aa2d177702247 -->

<!-- START_9befedf0e2960c8902af7f03e63fbcb2 -->
## Show a documentation page.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/docs/1/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/docs/1/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/docs/1/',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
null
```

### HTTP Request
`GET docs/{version}/{page?}`


<!-- END_9befedf0e2960c8902af7f03e63fbcb2 -->

<!-- START_a6b9846a502dede1602e326bbedcf949 -->
## oauth2/{integration}/authorise
> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/oauth2/1/authorise" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/oauth2/1/authorise"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/oauth2/1/authorise',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET oauth2/{integration}/authorise`


<!-- END_a6b9846a502dede1602e326bbedcf949 -->

<!-- START_7124fce8ace8d239c6bd3d593cadc2b7 -->
## oauth2/{integration}/authorize
> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/oauth2/1/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/oauth2/1/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/oauth2/1/authorize',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET oauth2/{integration}/authorize`


<!-- END_7124fce8ace8d239c6bd3d593cadc2b7 -->

<!-- START_ada5f17893238afbf14017f9e0a1335e -->
## oauth2/{integration}/callback
> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/oauth2/1/callback" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/oauth2/1/callback"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/oauth2/1/callback',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (422):

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "code": [
            "The code field is required."
        ]
    }
}
```

### HTTP Request
`GET oauth2/{integration}/callback`


<!-- END_ada5f17893238afbf14017f9e0a1335e -->

<!-- START_c5eeb9023dc1635b186702dd41d834eb -->
## manifest.json
> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/manifest.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/manifest.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/manifest.json',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "name": "IeltsTinder",
    "short_name": "IT",
    "start_url": "http:\/\/localhost\/ielts_tinder\/public\/",
    "display": "standalone",
    "theme_color": "#000000",
    "background_color": "#ffffff",
    "orientation": "any",
    "status_bar": "black",
    "splash": {
        "640x1136": "\/images\/icons\/splash-640x1136.png",
        "750x1334": "\/images\/icons\/splash-750x1334.png",
        "828x1792": "\/images\/icons\/splash-828x1792.png",
        "1125x2436": "\/images\/icons\/splash-1125x2436.png",
        "1242x2208": "\/images\/icons\/splash-1242x2208.png",
        "1242x2688": "\/images\/icons\/splash-1242x2688.png",
        "1536x2048": "\/images\/icons\/splash-1536x2048.png",
        "1668x2224": "\/images\/icons\/splash-1668x2224.png",
        "1668x2388": "\/images\/icons\/splash-1668x2388.png",
        "2048x2732": "\/images\/icons\/splash-2048x2732.png"
    },
    "icons": [
        {
            "src": "\/images\/icons\/icon-72x72.png",
            "type": "image\/png",
            "sizes": "72x72",
            "purpose": "any"
        },
        {
            "src": "\/images\/icons\/icon-96x96.png",
            "type": "image\/png",
            "sizes": "96x96",
            "purpose": "any"
        },
        {
            "src": "\/images\/icons\/icon-128x128.png",
            "type": "image\/png",
            "sizes": "128x128",
            "purpose": "any"
        },
        {
            "src": "\/images\/icons\/icon-144x144.png",
            "type": "image\/png",
            "sizes": "144x144",
            "purpose": "any"
        },
        {
            "src": "\/images\/icons\/icon-152x152.png",
            "type": "image\/png",
            "sizes": "152x152",
            "purpose": "any"
        },
        {
            "src": "\/images\/icons\/icon-192x192.png",
            "type": "image\/png",
            "sizes": "192x192",
            "purpose": "any"
        },
        {
            "src": "\/images\/icons\/icon-384x384.png",
            "type": "image\/png",
            "sizes": "384x384",
            "purpose": "any"
        },
        {
            "src": "\/images\/icons\/icon-512x512.png",
            "type": "image\/png",
            "sizes": "512x512",
            "purpose": "any"
        }
    ],
    "shortcuts": [
        {
            "name": "Shortcut Link 1",
            "description": "Shortcut Link 1 Description",
            "url": "\/shortcutlink1",
            "icons": [
                {
                    "src": "\/images\/icons\/icon-72x72.png",
                    "type": "image\/png",
                    "purpose": "any"
                }
            ]
        },
        {
            "name": "Shortcut Link 2",
            "description": "Shortcut Link 2 Description",
            "url": "\/shortcutlink2",
            "icons": [
                []
            ]
        }
    ]
}
```

### HTTP Request
`GET manifest.json`


<!-- END_c5eeb9023dc1635b186702dd41d834eb -->

<!-- START_1a15e4b23b93ad961be7edc60d2ad8fd -->
## offline
> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/offline" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/offline"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/offline',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET offline`


<!-- END_1a15e4b23b93ad961be7edc60d2ad8fd -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/login',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/ielts_tinder/public/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/ielts_tinder/public/login',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## logout
> Example request:

```bash
curl -X POST \
    "http://localhost/ielts_tinder/public/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/ielts_tinder/public/logout',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/register',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/ielts_tinder/public/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/ielts_tinder/public/register',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/password/reset',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST \
    "http://localhost/ielts_tinder/public/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/ielts_tinder/public/password/email',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/password/reset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/password/reset/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://localhost/ielts_tinder/public/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/ielts_tinder/public/password/reset',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_b77aedc454e9471a35dcb175278ec997 -->
## Display the password confirmation view.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/password/confirm',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET password/confirm`


<!-- END_b77aedc454e9471a35dcb175278ec997 -->

<!-- START_54462d3613f2262e741142161c0e6fea -->
## Confirm the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://localhost/ielts_tinder/public/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/ielts_tinder/public/password/confirm',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST password/confirm`


<!-- END_54462d3613f2262e741142161c0e6fea -->

<!-- START_3bcedda78ae45ef5c0f4c97a4963b7a1 -->
## user
> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/user',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user`


<!-- END_3bcedda78ae45ef5c0f4c97a4963b7a1 -->

<!-- START_cb859c8e84c35d7133b6a6c8eac253f8 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/home" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/home"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/home',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET home`


<!-- END_cb859c8e84c35d7133b6a6c8eac253f8 -->

<!-- START_ae8567793cc11432f69aa009564f4123 -->
## index
> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/index" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/index"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/index',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET index`


<!-- END_ae8567793cc11432f69aa009564f4123 -->

<!-- START_91ac6ba66656f5b892f82acf26686833 -->
## about-yourself
> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/about-yourself" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/about-yourself"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/about-yourself',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET about-yourself`


<!-- END_91ac6ba66656f5b892f82acf26686833 -->

<!-- START_405f57e141ec8ced86b42acf0bde8af6 -->
## about-partner
> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/about-partner" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/about-partner"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/about-partner',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET about-partner`


<!-- END_405f57e141ec8ced86b42acf0bde8af6 -->

<!-- START_f9162b8578306d907a9bb9126d8fc733 -->
## get-started
> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/get-started" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/get-started"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/get-started',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET get-started`


<!-- END_f9162b8578306d907a9bb9126d8fc733 -->

<!-- START_c0f505b72e10817948e65eb5eb744708 -->
## search
> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/search" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/search"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/search',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET search`


<!-- END_c0f505b72e10817948e65eb5eb744708 -->

<!-- START_f8e23df123cf972b9863d86c6413e1cd -->
## Redirect the user to the GitHub authentication page.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/login/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/login/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/login/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET login/{provider}`


<!-- END_f8e23df123cf972b9863d86c6413e1cd -->

<!-- START_dc6e1016b832bfbd32be18e2ebaaf8e5 -->
## Obtain the user information from GitHub.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/login/1/callback" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/login/1/callback"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/login/1/callback',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET login/{provider}/callback`


<!-- END_dc6e1016b832bfbd32be18e2ebaaf8e5 -->

<!-- START_107ac156ec53e0cf5ad2237472d499b3 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/feeds" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/feeds"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/feeds',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET feeds`


<!-- END_107ac156ec53e0cf5ad2237472d499b3 -->

<!-- START_cc17d819c6cb12d77568ae07816854d4 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/feeds/moment" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/feeds/moment"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/feeds/moment',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET feeds/moment`


<!-- END_cc17d819c6cb12d77568ae07816854d4 -->

<!-- START_416ba3ebd9ca00b8fd9c7d27b987b3cc -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/feeds/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/feeds/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/feeds/create',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET feeds/create`


<!-- END_416ba3ebd9ca00b8fd9c7d27b987b3cc -->

<!-- START_28d809ccd0acfbf443d3e53be75ad1a8 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/feeds/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/feeds/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/feeds/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET feeds/{feed}`


<!-- END_28d809ccd0acfbf443d3e53be75ad1a8 -->

<!-- START_b7452e025e7589a35530a701b9b57000 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/feeds/1/edit-content" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/feeds/1/edit-content"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/feeds/1/edit-content',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET feeds/{feed}/edit-content`


<!-- END_b7452e025e7589a35530a701b9b57000 -->

<!-- START_f879e5ac0e85a1c8d8120f140044b366 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/feeds/1/edit-media" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/feeds/1/edit-media"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/feeds/1/edit-media',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET feeds/{feed}/edit-media`


<!-- END_f879e5ac0e85a1c8d8120f140044b366 -->

<!-- START_59179a56a1b6f1c8ba19ae6711cd5777 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/ielts_tinder/public/feeds" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/feeds"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/ielts_tinder/public/feeds',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST feeds`


<!-- END_59179a56a1b6f1c8ba19ae6711cd5777 -->

<!-- START_c915003299e094e93fb618e3f011a934 -->
## feeds/{feed}/update-content
> Example request:

```bash
curl -X PUT \
    "http://localhost/ielts_tinder/public/feeds/1/update-content" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/feeds/1/update-content"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost/ielts_tinder/public/feeds/1/update-content',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`PUT feeds/{feed}/update-content`


<!-- END_c915003299e094e93fb618e3f011a934 -->

<!-- START_1440392738b427b9dd34402e1c5a7fb2 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/ielts_tinder/public/feeds/1/update-media" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/feeds/1/update-media"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost/ielts_tinder/public/feeds/1/update-media',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`PUT feeds/{feed}/update-media`


<!-- END_1440392738b427b9dd34402e1c5a7fb2 -->

<!-- START_501c0f90b9466478a5bd3d21bb4aae7c -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/profile/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/profile/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/profile/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET profile/{user_id}`


<!-- END_501c0f90b9466478a5bd3d21bb4aae7c -->

<!-- START_8dbd9c439d37134e163821da14b44dc1 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/profile/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/profile/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/profile/create',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET profile/create`


<!-- END_8dbd9c439d37134e163821da14b44dc1 -->

<!-- START_b7e2b92fc653cd75bc4f15e8e264e384 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/profile/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/profile/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/profile/1/edit',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET profile/{profile}/edit`


<!-- END_b7e2b92fc653cd75bc4f15e8e264e384 -->

<!-- START_0949c77c3fab5fce98ab0d939145324b -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/ielts_tinder/public/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/profile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/ielts_tinder/public/profile',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST profile`


<!-- END_0949c77c3fab5fce98ab0d939145324b -->

<!-- START_5923354cd3893edc9968e2c82f8b48ab -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/ielts_tinder/public/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/profile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost/ielts_tinder/public/profile',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`PUT profile`


<!-- END_5923354cd3893edc9968e2c82f8b48ab -->

<!-- START_353d99a365064dd3d5214f629a80a6dd -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/notify" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/notify"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/notify',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET notify`


<!-- END_353d99a365064dd3d5214f629a80a6dd -->

<!-- START_45f54903e38acbc5123e52e076bd52b0 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/notify/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/notify/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/notify/create',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET notify/create`


<!-- END_45f54903e38acbc5123e52e076bd52b0 -->

<!-- START_11bcc56a348dcb0e3c796c036fd48888 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/ielts_tinder/public/notify" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/notify"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/ielts_tinder/public/notify',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST notify`


<!-- END_11bcc56a348dcb0e3c796c036fd48888 -->

<!-- START_7caf2970f0a7ebe4cf4c08916fb61753 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/room" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/room"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/room',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET room`


<!-- END_7caf2970f0a7ebe4cf4c08916fb61753 -->

<!-- START_768ac102d06ec445f8153c89d22afc02 -->
## room/join/{room}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/room/join/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/room/join/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/room/join/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET room/join/{room}`


<!-- END_768ac102d06ec445f8153c89d22afc02 -->

<!-- START_667a46ed51adb053f80beeb482e15e56 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X POST \
    "http://localhost/ielts_tinder/public/room/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/room/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/ielts_tinder/public/room/create',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST room/create`


<!-- END_667a46ed51adb053f80beeb482e15e56 -->

<!-- START_0ce84f3f967f9ce94f8dd704a8b36914 -->
## room/topic
> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/room/topic" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/room/topic"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/room/topic',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET room/topic`


<!-- END_0ce84f3f967f9ce94f8dd704a8b36914 -->

<!-- START_5e71b82c42de2acbe7fad94d851206bf -->
## room/matching
> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/room/matching" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/room/matching"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/room/matching',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET room/matching`


<!-- END_5e71b82c42de2acbe7fad94d851206bf -->

<!-- START_72bfb333fcce10d40fc0d5a99d59fa8f -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ielts_tinder/public/record" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ielts_tinder/public/record"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/ielts_tinder/public/record',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET record`


<!-- END_72bfb333fcce10d40fc0d5a99d59fa8f -->


