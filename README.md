# laravel-breadcrumbs
Breadcrumb helper for laravel

## Usage

You can easily define any breadcrumbs in templates, layouts and controllers. 
There are 2 ways to add breadcrumbs: with the breadcrumb helper function or a blade directive.

### helper function

Add breadcrumbs
```
breadcrumbs()->add('Items', route('index'))
breadcrumbs()->add('Item detail')
```

You can also prepend breadcrumbs for e.g. the home link in any layout
```
breadcrumbs()->prepend('Home', '/')
```

Render breadcrumbs
```
breadcrumbs()->render()
```

### blade

same examples in blade 

```
@breadcrumb('Home', '/')
@breadcrumb('Items', route('index'))
@breadcrumb('Item detail')

@section('content')
    
    @breadcrumbs()

@endsection
```
