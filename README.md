# laravel-breadcrumbs
Breadcrumb helper for laravel

## Usage

You can easily define any breadcrumbs in templates, layouts and controllers. 
There are 2 ways to add breadcrumbs: with the breadcrumb helper function or a blade directive.

### helper function

Add breadcrumbs
```php
breadcrumbs()->add('Items', route('index'));
breadcrumbs()->add('Item detail');
```

You can also prepend breadcrumbs for e.g. the home link in any layout
```php
breadcrumbs()->prepend('Home', '/');

// with icon:
// because breadcrumb text is always escaped
// you have to add escape=false
breadcrumbs()->prepend('<i class="fa fas-home" />', route('home'), ['escape' => false]);

```

Render breadcrumbs
```php
breadcrumbs()->render();
```

### blade

same examples in blade 

```php
@breadcrumb('Home', '/')
@breadcrumb('Items', route('index'))
@breadcrumb('Item detail')

@section('content')
    
    @breadcrumbs()

@endsection
```
