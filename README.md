# SilverStripe Context Aware Upload Field

## Requirements
 * SilverStripe ^3.1

## Installation

The recommended way to install the module is via composer

```
composer require marketo/contextawareuploadfield:dev-master
```

If you aren't using composer, pull down the code into its own directory.

## Examples

To add this to a Page object, you can put the following code into your YAML configuration.

```
ContextAwareUploadField:
  upload_paths:
    Page: some/location/$ClassName/$URLSegment
```

The segments in the URL directly correspond to fields in the database. The location will always be under assets.

------

If you wish to override all UploadField instances, you can use the following code.

```
Injector:
  UploadField:
    class: ContextAwareUploadField
```

Run a `dev/build?flush=1` to flush the config manifests to enable the new configuration.

## License

See [License](LICENSE.md)

## Maintainers

 * Nathan J. Brauer <nathan@marketera.com>
 
## Bugtracker

https://github.com/Marketo/SilverStripe-ContextAwareUploadField/issues
