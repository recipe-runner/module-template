# Module Name

Description of the module goes here.

**Please, review all the files before first commit.**

## Requires

* PHP +7.2
* [Recipe Runner](https://github.com/recipe-runner/recipe-runner)

## Installation

Create a recipe and add the module to the `packages` section:

```yaml
name: "Your recipe name"
extra:
  rr:
    packages:
      "vendor-name/module-name": "1.0.x-dev"
```

## Methods

### method_name

Description of the method goes here.
Types allowed: `number`, `string`, `array`, `null`

**Parameters**

* **parameter1** (`type`) Description of the *parameter1*.
* **parameter2** (`type`) Description of the *parameter2*.

**Return values**

* **name1** (`type`) Description of the *name1*

**Examples**

```yaml
steps:
  - actions:
      - method_name: "bla bla"
```

## For module developers

The preferred installation method is [Composer](https://getcomposer.org):

```bash
$ composer require vendor-name/module-name
```

### Unit tests

You can run the unit tests with the following command:

```bash
$ cd module-dir
$ composer test
```

## License

This library is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
