<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MagAbroad</title>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/open-iconic-bootstrap.min.css'); ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/animate.css'); ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/owl.carousel.min.css'); ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/owl.theme.default.min.css'); ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/magnific-popup.css'); ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/ionicons.min.css'); ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/bootstrap-datepicker.css'); ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/jquery.timepicker.css'); ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/flaticon.css'); ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/icomoon.css'); ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    </head>
    
    <body>
        <div id="app"></div>
        <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery-migrate-3.0.1.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.easing.1.3.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.waypoints.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.magnific-popup.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/aos.js')); ?>"></script>
        
        
        <script src="<?php echo e(asset('js/scrollax.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.stellar.min.js')); ?>"></script>
        
        <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    </body>
</html>
<?php /**PATH D:\Systems\magabroad\resources\views/welcome.blade.php ENDPATH**/ ?>