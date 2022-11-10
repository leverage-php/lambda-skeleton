# Lambda skeleton

## Introduction

This project is designed to make it easier to develop a new AWS Lambda function.

It provides:

- A minimal and empty project which you can base your new Lambda functions on.
- Dev tools like PHPUnit, PHPStan, CS fixer etc.
- Running your function locally, including Xdebug.
- [Bref](https://bref.sh) to run PHP runtime on AWS Lambda.
- [Serverless](https://www.serverless.com) config to easily deploy your function to AWS.
- GitHub Actions workflows to test your code and automatically deploy functions to AWS.

## Usage

To set up a new project, just run:

```
composer create-project leverage-php/lambda-skeleton
```

If you use Docker:

```
docker run -it -v $PWD:/app --rm composer create-project leverage-php/lambda-skeleton

```

It'll create a new folder with a very minimal project and install all dependencies. You also need:

- Copy `.env.dist` to `.env` and set up your env values.

- Edit serverless.yml:

```
#Set up a name of your project. It'll be used in AWS Cloudformation.
service: app

...

functions:
    default:
        #Set up a name for your AWS Lambda function
        name: task-${sls:stage}
```

That's it.

## Development

To invoke your function locally, run:

```
$ bin/local

# With JSON event data
$ bin/local '{"foo": "bar"}'

# With JSON in a file
$ bin/local --file=event.json
```

You can use various dev tools thanks to [leverage-php/toolchain](https://github.com/leverage-php/toolchain):

`bin/composer` - Composer

`vendor/bin/test`- PHPUnit

`vendor/bin/static` - PHPStan

`vendor/bin/codestyle` - PHP CS Fixer

## Deployment

To deploy your function, run:

`bin/deploy`

It'll deploy the project installed on your machine to the dev stage. 

## Github Actions

There are two predefined workflows to set up Github Actions:

- `on-pull-request.yml` runs your test tools (PHPUnit, PHPStan and CS fixer) after creating a pull request.

- `on-push-main.yml` deploys your function to AWS to staging after pushing changes to the main branch.

## PHP config

PHP is configured by Bref and contains optimized settings for AWS runtime. In case you need to change them, just create a folder `php/conf.d` in the root of your project and put your `php.ini` there.


