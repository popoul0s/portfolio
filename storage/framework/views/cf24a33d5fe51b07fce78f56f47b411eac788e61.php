<?php
$affixLabelClasses = ['whitespace-nowrap group-focus-within:text-primary-500', 'text-gray-400' => !$errors->has($getStatePath()), 'text-danger-400' => $errors->has($getStatePath())];
$inputID = str_replace(['.', '-'], '_', $getId());
?>

<?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $getFieldWrapperView()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => $getId(),'label' => $getLabel(),'label-sr-only' => $isLabelHidden(),'helper-text' => $getHelperText(),'hint' => $getHint(),'hint-icon' => $getHintIcon(),'required' => $isRequired(),'state-path' => $getStatePath()]); ?>
    <div
        <?php echo e($attributes->merge($getExtraAttributes())->class(['flex items-center space-x-2 rtl:space-x-reverse group filament-forms-text-input-component'])); ?>>
        <?php if(($prefixAction = $getPrefixAction()) && !$prefixAction->isHidden()): ?>
            <?php echo e($prefixAction); ?>

        <?php endif; ?>

        <?php if($icon = $getPrefixIcon()): ?>
            <?php echo e(svg($icon, 'w-5 h-5')); ?>
        <?php endif; ?>

        <?php if($label = $getPrefixLabel()): ?>
            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses($affixLabelClasses) ?>">
                <?php echo e($label); ?>

            </span>
        <?php endif; ?>

        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'flex-1 filament-phone-input-field',
            'rtl' => $isRtl(),
            ]) ?>">
            <span wire:ignore>
                <input type="tel" x-data="phoneInputFormComponent({
                    getInputTelOptionsUsing: (intlTelInput) => (<?php echo e($getJsonPhoneInputConfiguration()); ?>),
                    state: $wire.<?php echo e($isLazy() ? 'entangle(\'' . $getStatePath() . '\').defer' : $applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')')); ?>,
                    inputID: '<?php echo e($inputID); ?>',
                })"
                dusk="filament.forms.<?php echo e($getStatePath()); ?>"
                <?php echo $isLazy() ? "x-on:blur=\"\$wire.\$refresh\"" : null; ?>

                <?php echo $isDebounced() ? "x-on:input.debounce.{$getDebounce()}=\"\$wire.\$refresh\"" : null; ?>

                <?php echo $isDisabled() ? 'disabled' : null; ?>

                <?php echo ($placeholder = $getPlaceholder()) ? "placeholder=\"{$placeholder}\"" : null; ?>

                id="<?php echo e($getId()); ?>"
                <?php echo e($getExtraInputAttributeBag()->class([
                    'block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70',
                    'dark:bg-gray-700 dark:text-white dark:focus:border-primary-600' => config('forms.dark_mode'),
                    'border-gray-300' => !$errors->has($getStatePath()),
                    'dark:border-gray-600' => !$errors->has($getStatePath()) && config('forms.dark_mode'),
                    'border-danger-600 ring-danger-600' => $errors->has($getStatePath()),
                ])); ?>

                />
            </span>
        </div>

        <?php if($label = $getSuffixLabel()): ?>
            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses($affixLabelClasses) ?>">
                <?php echo e($label); ?>

            </span>
        <?php endif; ?>

        <?php if($icon = $getSuffixIcon()): ?>
            <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $icon] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
        <?php endif; ?>

        <?php if(($suffixAction = $getSuffixAction()) && !$suffixAction->isHidden()): ?>
            <?php echo e($suffixAction); ?>

        <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\stage\portfolio-app\vendor\ysfkaya\filament-phone-input\src\/../resources/views/phone-input.blade.php ENDPATH**/ ?>