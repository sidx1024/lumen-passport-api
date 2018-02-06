# Lumen API (with Laravel Passport)

[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

This is a simple example to show a Lumen App (API) which works with Laravel Passport (OAuth 2.0).

It uses service provider from : https://github.com/dusterio/lumen-passport 

### Installation
Clone this repository. Run the following commands:

```
$ cd lumen-passport-api
$ cp .env.example .env
$ php artisan key:generate
```

Create your database and enter the details in your `.env` file. Now run the following commands:

```
$ php artisan migrate --seed
$ php artisan passport:install
```
You will get this set of messages:
```
Encryption keys generated successfully.
Personal access client created successfully.
Client ID: 1
Client Secret: aW1qHacErLrFquQfjoAuVIO0cWnlKNXM5LDhXjLi
Password grant client created successfully.
Client ID: 2
Client Secret: dYl1Fgom4LjdkOkvZmhhSMdFDZGQLVnapFokWtMW
```

You should see two client ID and secret pairs.
The first one is Personal Access Client and second one is Password Grant Client.
The Password Grant Client will allow us to generate new tokens for users.

### Testing the API

We have already added two users in UsersTableSeeder.php.
Their credentials are:

```
name : Heisenberg
email : heisenberg@breakingbad.com
password : crystal_meth
```
```
name : Jesse Pinkman
email : Jesse@breakingbad.com
password : chilli_powder
```

#### Obtain access token:

```
curl -X POST \
  http://127.0.0.1:8000/oauth/token \
  -H 'accept: application/json' \
  -H 'cache-control: no-cache' \
  -H 'content-type: multipart/form-data; \
  -F client_id=2 \
  -F client_secret=dYl1Fgom4LjdkOkvZmhhSMdFDZGQLVnapFokWtMW \
  -F grant_type=password \
  -F username=jesse@breakingbad.com \
  -F password=chilli_powder
```

Thus, we will get a response which has access token,

```
 {
    "token_type": "Bearer",
    "expires_in": 31536000,
    "access_token": "VeryVeryVeryLongAccessToken",
    "refresh_token": "YourRefreshToken"
}
```

#### Get elements list:
Finally, we can access secure api endpoint ``/api/element``:

```
curl -X GET \
  http://127.0.0.1:8000/api/element \
  -H 'authorization: Bearer VeryVeryVeryLongAccessToken' \
```

Response:

```
[
    {
        "atomic_number": 1,
        "name": "Hydrogen",
        "symbol": "H"
    },
    {
        "atomic_number": 2,
        "name": "Helium",
        "symbol": "He"
    },
    {
        "atomic_number": 6,
        "name": "Carbon",
        "symbol": "C"
    },
    {
        "atomic_number": 7,
        "name": "Nitrogen",
        "symbol": "N"
    },
    {
        "atomic_number": 8,
        "name": "Oxygen",
        "symbol": "O"
    }
]
```

### License

MIT License.