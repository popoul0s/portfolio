<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8" />

    <meta name="application-name" content="<?php echo e(config('app.name')); ?>" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title><?php echo e(config('app.name')); ?></title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>


    <?php echo $__env->yieldPushContent('scripts'); ?>
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-red-500 rounded-full"
                    viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="ml-3 text-xl">Tailblocks</span>
            </a>
            <nav
                class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
                <a class="mr-5 hover:text-gray-900">First Link</a>
                <a class="mr-5 hover:text-gray-900">Second Link</a>
                <a class="mr-5 hover:text-gray-900">Third Link</a>
                <a class="mr-5 hover:text-gray-900">Fourth Link</a>
            </nav>
            <button
                class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Button
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </header>
    <?php echo \Livewire\Livewire::styles(); ?>

</head>

<body class="antialiased">
    <?php echo e($slot); ?>

    <?php echo \Livewire\Livewire::scripts(); ?>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('notifications')->html();
} elseif ($_instance->childHasBeenRendered('H3lgWyd')) {
    $componentId = $_instance->getRenderedChildComponentId('H3lgWyd');
    $componentTag = $_instance->getRenderedChildComponentTagName('H3lgWyd');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('H3lgWyd');
} else {
    $response = \Livewire\Livewire::mount('notifications');
    $html = $response->html();
    $_instance->logRenderedChild('H3lgWyd', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</body>

</html>
<?php /**PATH C:\laragon\www\stage\portfolio-app\resources\views/layouts/app.blade.php ENDPATH**/ ?>