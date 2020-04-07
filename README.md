# Symfony5APIBoilerplateJWT

An API Boilerplate to create a ready-to-use REST API in seconds with Symfony 5

## Install with Composer

```
    $ composer create-project tony133/symfony5-api-boilerplate-jwt myProject
```

## Setting Environment

```
    $ cp .env.dist .env
```

## Generate the SSH keys

```
	$ mkdir config/jwt
	$ openssl genrsa -out config/jwt/private.pem -aes256 4096
	$ openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
```

## Generate Token Authentication with Curl

```
	$ curl -H 'content-type: application/json' -v -X  POST http://127.0.0.1:8000/api/token -H 'Authorization:Basic username:password'
```

## User Registration with Curl

```
 	$ curl -H 'content-type: application/json' -v -X POST -d '{"name": "tony", "surname": "master", "email": "tony_admin@symfony.com", "username":"tony_admin", "password": "admin"}' http://127.0.0.1:8000/api/register
```

## User Forgot Password with Curl

```
	$ curl -H 'content-type: application/json' -v POST -d '{"email": "tony_admin@symfony.com"}' http://127.0.0.1:8000/api/forgot
```

## User Change Password with Curl

```
	$ curl -H 'content-type: application/json' -v POST -d '{"email": "tony_admin@symfony.com", "password":"admin"}' http://127.0.0.1:8000/api/change
```

## Getting phpunit

```
    $ php bin/phpunit or ./bin/phpunit
```

## Example with Symfony5APIBoilerplateJWT

- [How to Build an API-Only JWT Symfony App](https://github.com/Tony133/Symfony5APIBoilerplateJWTBook)
