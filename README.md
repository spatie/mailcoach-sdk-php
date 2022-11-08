# An SDK for using the Mailcoach API in PHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/mailcoach-sdk-php.svg?style=flat-square)](https://packagist.org/packages/spatie/mailcoach-sdk-php)
[![Tests](https://github.com/spatie/mailcoach-sdk-php/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/spatie/mailcoach-sdk-php/actions/workflows/run-tests.yml)
[![PHPStan](https://github.com/spatie/mailcoach-sdk-php/actions/workflows/phpstan.yml/badge.svg)](https://github.com/spatie/mailcoach-sdk-php/actions/workflows/phpstan.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/mailcoach-sdk-php.svg?style=flat-square)](https://packagist.org/packages/spatie/mailcoach-sdk-php)

This package contains the PHP SDK to work with [Mailcoach](https://mailcoach.app). Both self-hosted and hosted Mailcoach are supported. Using this package you can manage email lists, subscribers and campaigns.

Here are a few examples:

```php
$mailcoach = new \Spatie\MailcoachSdk\Mailcoach('<api-key>', '<mailcoach-api-endpoint>')

// creating a campaign
$campaign = $mailcoach->createCampaign([
    'email_list_uuid' => 'use-a-real-email-list-uuid-here',
    'name' => 'My new campaign'
    'fields' => [
        'title' => 'The title on top of the newsletter',
        'content' => '# Welcome to my newsletter'
    ],
]);

// sending a test of the campaign to the given email address
$campaign->sendTest('john@example.com');

// sending a campaign
$campaign->send();
```

By default, Mailcoach' endpoints will are paginated with a limit of 1000. The package makes it easy to work with paginated resources. Just call `->next()` to get the next page.

```php
// listing all subscribers of a list
$subscribers = $mailcoach->emailList('use-a-real-email-list-uuid-here')->subscribers();

do {
    foreach($subscribers as $subscriber) {
        echo $subscriber->email;
    }
} while($subscribers = $subscribers->next())
```

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/mailcoach-sdk-php.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/mailcoach-sdk-php)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require spatie/mailcoach-sdk-php
```

## Usage

```php
$skeleton = new Spatie\MailcoachSdk();
echo $skeleton->echoPhrase('Hello, Spatie!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Freek Van der Herten](https://github.com/freekmurze)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
