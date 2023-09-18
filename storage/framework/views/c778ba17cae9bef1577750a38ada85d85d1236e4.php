<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('switch-filament-language')->html();
} elseif ($_instance->childHasBeenRendered('l3391440645-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3391440645-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3391440645-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3391440645-0');
} else {
    $response = \Livewire\Livewire::mount('switch-filament-language');
    $html = $response->html();
    $_instance->logRenderedChild('l3391440645-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH C:\laragon\www\stage\portfolio-app\storage\framework\views/bcb8cb12e72db133d40c96ed11d38143f4892624.blade.php ENDPATH**/ ?>