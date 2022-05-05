# ПХП

[![Build Status](https://github.com/maxbarsukov/l7.X.l7/actions/workflows/ci.yml/badge.svg?branch=master)](https://github.com/maxbarsukov/l7.X.l7/actions/workflows/ci.yml)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/maxbarsukov/l7.X.l7)

![Packagist Version](https://img.shields.io/packagist/v/maxbarsukov/l7.X.l7)
![Packagist Downloads](https://img.shields.io/packagist/dm/maxbarsukov/l7.X.l7)
![Packagist License](https://img.shields.io/packagist/l/maxbarsukov/l7.X.l7)

ПХП (= PHP = **/7 ☦ /7** )

**Description**

## Documentation

Have a look in the [examples](https://github.com/maxbarsukov/l7.X.l7/tree/master/examples) directory to learn more.

## Installation

    $ composer global require maxbarsukov/l7xl7

## Usage

Get help:
```bash
l7xl7 -h
l7xl7 --help
```

**compile** file or directory:
```bash
l7xl7 examples
l7xl7 examples/hello.ruphp
```

Specify **file extensions**:
```bash
l7xl7 examples --inpext=.rphp,.ruphp
```
or **output directory**:
```bash
l7xl7 file.ruphp --outdir=out/examples
```

## Building

### Pre-reqs

To build and run this app locally you will need a few things:

- Install [PHP](https://www.php.net/) (*8 version required*);
- Install [Composer](https://getcomposer.org//);

### Getting start

- Clone the repository
```bash
git clone --depth=1 https://github.com/maxbarsukov/l7.X.l7.git
```
- Install dependencies
```bash
cd l7.X.l7
composer install
```
- **Compile**
```bash
bin/l7xl7 examples
````
- **Tests**
```bash
composer test
```
- **Linting**
```bash
composer lint
composer cs
composer phpstan
```

## Contributing

Bug reports and pull requests are welcome on GitHub at https://github.com/maxbarsukov/l7.X.l7. This project is intended to be a safe, welcoming space for collaboration, and contributors are expected to adhere to the [code of conduct](https://github.com/maxbarsukov/l7.X.l7/blob/master/CODE_OF_CONDUCT.md).

## License

The package is available as open source under the terms of the [GPL-3.0 license](https://www.gnu.org/licenses/gpl-3.0.html).

## Code of Conduct

Everyone interacting in the l7.X.l7 project's codebases, issue trackers, chat rooms and mailing lists is expected to follow the [code of conduct](https://github.com/maxbarsukov/l7.X.l7/blob/master/CODE_OF_CONDUCT.md).
