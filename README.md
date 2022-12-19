# Laravel Helpers

[![Latest Version on Packagist](https://img.shields.io/packagist/v/code-distortion/laravel-helpers.svg?style=flat-square)](https://packagist.org/packages/code-distortion/laravel-helpers)
![PHP Version](https://img.shields.io/badge/PHP-8.0%20to%208.2-blue?style=flat-square)
![Laravel](https://img.shields.io/badge/laravel-7%2C%208%20%26%209-blue?style=flat-square)
[![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/code-distortion/laravel-helpers/run-tests.yml?branch=master&style=flat-square)](https://github.com/code-distortion/laravel-helpers/actions)



## Warning

This package was developed for use in my own projects. It might not suit your needs or be documented properly, and may change at any time.



## Installation

Install the package via composer:

``` bash
composer require code-distortion/laravel-helpers
```

The package will automatically register itself.



## String Macros

These macros are applied to `Illuminate\Support\Str` and `Illuminate\Support\Stringable`:

- [`unspace`](#unspace)



### `unspace`

Trim and remove repeated-spaces from a string:

```php
// ' a  b  c ' >> 'a b c'
Str::unspace($string);
Str::of($string)->unspace();
```

> By default, all *whitespace* characters are searched for and replaced with spaces.

You can specify which character/s to search for:

```php
// '_a__b__c_' >> 'a_b_c'
Str::unspace($string, '_');
Str::of($string)->unspace('_');
```

> Searching for an empty string will search for all *whitespace* characters.

And you can specify a replacement:

```php
// ' a  b  c ' >> 'a-b-c'
Str::unspace($string, ' ', '-');
Str::of($string)->unspace(' ', '-');
```

> If no replacement is specified, the character being searched for will be used.
> 
> If more than one character is being searched for, a space is used as the replacement.



## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.



## Testing

``` bash
$ composer test
```



## Contributing

Contributions are not being sought for this package.



## Security

If you discover any security related issues, please email tim@code-distortion.net instead of using the issue tracker.



## Credits

- [Tim Chandler](https://github.com/code-distortion)



## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
