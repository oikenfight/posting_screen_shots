# Posting Screen Shots

adb コマンドを利用して Android 端末のスクリーンショットを撮り、Web で見れるようにする。

# Getting Started.

### Configuration

We need configuration laravel's ".env" files.

#### laravel's ".env" files

Copy laravel's ".env" file template.

```bash
$ cp .env.examaple .env
```

#### Directory Permission

Just run following command.

```bash
$ chmod -R 777 storage/
```

### Build & Up with docker-compose

Build with docker-compose, run following command.

```bash
$ docker-compose build
```

Or, following commands are automatically build (when not yet build case) and up docker containers.

```bash
$ docker-compose up
```

### Install dependencies

To run following command.

```bash
## enter your container
$ docker-compose exec workspace sh
```

```bash
$ composer install
```

```bash
$ npm install
```

```bash
$ artisan key:generate
```

### server start

```bash
## press ctl+c in your container
$ php artisan serve --port=80 --host 0.0.0.0
```

## screen shot
```bash
## press ctl+c in your terminal
$ ./post_screen_shot.sh
```

## link public/ to storage/ 
```bash
## in your container
$ php artisan storage:link
```