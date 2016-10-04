<meta charset="UTF-8" />
<title>{!! Config::get('itool.title') !!} </title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<meta name="Keywords" content="{!! Config::get('itool.key') !!}" />
<meta name="Description" content="{!! Config::get('itool.des') !!}" />
<meta name="author" content="jtahstu" />
<link rel="icon" href="{!! Config::get('itool.icon') !!}" />
<link href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{asset('public/css/header.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/css/tool.css')}}" />
{!! Config::get('itool.headAddCode') !!}
{{--注意这里只要有html标签的，请一定要使用上面的写法，不要用{{}}，原因嘛，你懂的. --}}
