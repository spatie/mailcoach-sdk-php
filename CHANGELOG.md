# Changelog

All notable changes to `mailcoach-sdk-php` will be documented in this file.

## 1.9.0 - 2025-05-05

### What's Changed

* Add transactional-mails to endpoints
* Bump dependabot/fetch-metadata from 2.2.0 to 2.3.0 by @dependabot in https://github.com/spatie/mailcoach-sdk-php/pull/44
* Bump aglipanci/laravel-pint-action from 2.4 to 2.5 by @dependabot in https://github.com/spatie/mailcoach-sdk-php/pull/45

**Full Changelog**: https://github.com/spatie/mailcoach-sdk-php/compare/1.8.1...1.9.0

## 1.8.1 - 2024-11-08

### What's Changed

* Handle multiple test emails by @edalzell in https://github.com/spatie/mailcoach-sdk-php/pull/43

### New Contributors

* @edalzell made their first contribution in https://github.com/spatie/mailcoach-sdk-php/pull/43

**Full Changelog**: https://github.com/spatie/mailcoach-sdk-php/compare/1.8.0...1.8.1

## 1.8.0 - 2024-11-07

* Fix `isSubscribed` returning `true` when subscriber wasn't confirmed
* Add `isUnconfirmed()` method to subscriber resource

**Full Changelog**: https://github.com/spatie/mailcoach-sdk-php/compare/1.7.1...1.7.2

## 1.7.1 - 2024-11-07

* Don't double encode filter values as `http_build_query` already encodes

**Full Changelog**: https://github.com/spatie/mailcoach-sdk-php/compare/1.7.0...1.7.1

## 1.7.0 - 2024-08-28

### What's Changed

* removeTags & addTags functions added. by @meminuygur in https://github.com/spatie/mailcoach-sdk-php/pull/42

**Full Changelog**: https://github.com/spatie/mailcoach-sdk-php/compare/1.6.0...1.7.0

## 1.6.0 - 2024-07-15

### What's Changed

* Bump ramsey/composer-install from 2 to 3 by @dependabot in https://github.com/spatie/mailcoach-sdk-php/pull/30
* Bump dependabot/fetch-metadata from 1.6.0 to 2.1.0 by @dependabot in https://github.com/spatie/mailcoach-sdk-php/pull/36
* Bump dependabot/fetch-metadata from 2.1.0 to 2.2.0 by @dependabot in https://github.com/spatie/mailcoach-sdk-php/pull/39
* added Unsubscribe by Email method by @meminuygur in https://github.com/spatie/mailcoach-sdk-php/pull/40

### New Contributors

* @meminuygur made their first contribution in https://github.com/spatie/mailcoach-sdk-php/pull/40

**Full Changelog**: https://github.com/spatie/mailcoach-sdk-php/compare/1.5.0...1.6.0

## 1.5.0 - 2024-05-02

### What's Changed

* Bump aglipanci/laravel-pint-action from 2.3.1 to 2.4 by @dependabot in https://github.com/spatie/mailcoach-sdk-php/pull/33
* Fix #34 -- Added a isSubscribed method on the Subscriber resource by @philipsorensen in https://github.com/spatie/mailcoach-sdk-php/pull/37

### New Contributors

* @philipsorensen made their first contribution in https://github.com/spatie/mailcoach-sdk-php/pull/37

**Full Changelog**: https://github.com/spatie/mailcoach-sdk-php/compare/1.4.1...1.5.0

## 1.4.1 - 2024-04-12

### What's Changed

* Fix data retrieval when creating a campaign by @mariomka in https://github.com/spatie/mailcoach-sdk-php/pull/32

### New Contributors

* @mariomka made their first contribution in https://github.com/spatie/mailcoach-sdk-php/pull/32

**Full Changelog**: https://github.com/spatie/mailcoach-sdk-php/compare/1.4.0...1.4.1

## 1.4.0 - 2024-02-09

### What's Changed

* Tags: GET, UPDATE & DELETE endpoints by @Nielsvanpach in https://github.com/spatie/mailcoach-sdk-php/pull/24

**Full Changelog**: https://github.com/spatie/mailcoach-sdk-php/compare/1.3.1...1.4.0

## 1.3.1 - 2024-02-08

### What's Changed

* Bump aglipanci/laravel-pint-action from 2.3.0 to 2.3.1 by @dependabot in https://github.com/spatie/mailcoach-sdk-php/pull/25
* use correct key for previous url by @Nielsvanpach in https://github.com/spatie/mailcoach-sdk-php/pull/28

**Full Changelog**: https://github.com/spatie/mailcoach-sdk-php/compare/1.3.0...1.3.1

## 1.3.0 - 2023-11-03

### What's Changed

- Bump actions/checkout from 3 to 4 by @dependabot in https://github.com/spatie/mailcoach-sdk-php/pull/20
- Bump stefanzweifel/git-auto-commit-action from 4 to 5 by @dependabot in https://github.com/spatie/mailcoach-sdk-php/pull/22
- Send transaction Mail by @Nielsvanpach in https://github.com/spatie/mailcoach-sdk-php/pull/23

### New Contributors

- @Nielsvanpach made their first contribution in https://github.com/spatie/mailcoach-sdk-php/pull/23

**Full Changelog**: https://github.com/spatie/mailcoach-sdk-php/compare/1.2.0...1.3.0

## 1.2.0 - 2023-08-24

### What's Changed

- retrieve opens, clicks, unsubscribes and bounces for a given campaign by @smknstd in https://github.com/spatie/mailcoach-sdk-php/pull/19

### New Contributors

- @smknstd made their first contribution in https://github.com/spatie/mailcoach-sdk-php/pull/19

**Full Changelog**: https://github.com/spatie/mailcoach-sdk-php/compare/1.1.2...1.2.0

## 1.1.2 - 2023-07-17

### What's Changed

- Bump dependabot/fetch-metadata from 1.5.1 to 1.6.0 by @dependabot in https://github.com/spatie/mailcoach-sdk-php/pull/17
- fix: Problems with finding subscribers with "+" character in their emails by @ImJustToNy in https://github.com/spatie/mailcoach-sdk-php/pull/18

### New Contributors

- @ImJustToNy made their first contribution in https://github.com/spatie/mailcoach-sdk-php/pull/18

**Full Changelog**: https://github.com/spatie/mailcoach-sdk-php/compare/1.1.1...1.1.2

## 1.1.1 - 2023-06-28

### What's Changed

- URLencode filter values by @tinusg in https://github.com/spatie/mailcoach-sdk-php/pull/16

### New Contributors

- @tinusg made their first contribution in https://github.com/spatie/mailcoach-sdk-php/pull/16

**Full Changelog**: https://github.com/spatie/mailcoach-sdk-php/compare/1.1.0...1.1.1

## 1.1.0 - 2023-02-09

- add resubscribe method as requested in https://github.com/spatie/laravel-mailcoach-sdk/issues/10

**Full Changelog**: https://github.com/spatie/mailcoach-sdk-php/compare/1.0.5...1.1.0

## 1.0.5 - 2023-02-02

### What's Changed

- fix missing attributes in subscriber class
- Bump dependabot/fetch-metadata from 1.3.5 to 1.3.6 by @dependabot in https://github.com/spatie/mailcoach-sdk-php/pull/8

**Full Changelog**: https://github.com/spatie/mailcoach-sdk-php/compare/1.0.4...1.0.5

## 1.0.4 - 2023-01-19

- make mailers optional

**Full Changelog**: https://github.com/spatie/mailcoach-sdk-php/compare/1.0.3...1.0.4

## 1.0.3 - 2023-01-04

### What's Changed

- Prevent infinite loop and use correct `subscribers` method by @ash-jc-allen in https://github.com/spatie/mailcoach-sdk-php/pull/6

### New Contributors

- @ash-jc-allen made their first contribution in https://github.com/spatie/mailcoach-sdk-php/pull/6

**Full Changelog**: https://github.com/spatie/mailcoach-sdk-php/compare/1.0.2...1.0.3

## 1.0.2 - 2022-11-25

- fix subscriber endpoint

## 1.0.1 - 2022-11-08

- correct exception names

## 1.0.0 - 2022-11-08

- initial release

## 0.0.3 - 2022-11-08

- experimental release

## 0.0.2 - 2022-11-08

- experimental release

## 0.0.1 - 2022-11-07

- experimental release
