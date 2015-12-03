# Context Aware Upload Field

## Requirements
 * SilverStripe ^3.1
 * Other module
 * Other server requirement
 * Etc

## Installation

```
composer create-project silverstripe-module/skeleton module-name
```

## License
See [License](license.md)

## Documentation


## Example configuration 

## Maintainers

 * Person here <person@emailaddress.com>
 
## Bugtracker

https://github.com/Marketo/SilverStripe-ContextAwareUploadField/issues
 
## Examples

If you wish to add this to a Page object, you can put the following code into your YAML configuration.

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