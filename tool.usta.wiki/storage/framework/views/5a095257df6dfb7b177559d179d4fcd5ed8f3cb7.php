<meta charset="UTF-8" />
<title><?php echo htmlspecialchars_decode($config['title']); ?> </title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<meta name="Keywords" content="<?php echo htmlspecialchars_decode($config['keyword']); ?>" />
<meta name="Description" content="<?php echo htmlspecialchars_decode($config['des']); ?>" />
<meta name="author" content="jtahstu" />
<link rel="icon" href="<?php echo htmlspecialchars_decode($config['icon']); ?>" />
<link href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/header.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/tool.css')); ?>" />
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="<?php echo e(asset('public/js/tool.js')); ?>"></script>
<?php echo htmlspecialchars_decode($config['headAddCode']); ?>

<?php /*注意这里只要有html标签的，请一定要使用上面的写法，不要用{{}}或不解码，原因嘛，你懂的. */ ?>
