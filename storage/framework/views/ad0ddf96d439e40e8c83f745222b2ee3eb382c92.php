<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'forms::components.field-wrapper.index','data' => ['id' => $getId(),'label' => $getLabel(),'labelSrOnly' => $isLabelHidden(),'helperText' => $getHelperText(),'hint' => $getHint(),'hintIcon' => $getHintIcon(),'required' => $isRequired(),'statePath' => $getStatePath()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::field-wrapper'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getId()),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getLabel()),'label-sr-only' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isLabelHidden()),'helper-text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getHelperText()),'hint' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getHint()),'hint-icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getHintIcon()),'required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isRequired()),'state-path' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getStatePath())]); ?>
    <div x-data="{
        state: $wire.<?php echo e($applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')')); ?>,
        clickHandler($event) {
            <?php if($isDisabled()): ?>
                return;
            <?php else: ?>
                let target = $event.target.dataset.index ?  $event.target : $event.target.closest('.rating-item');
                let index = target.dataset.index || false;
                this.state = index;
                this.draw(index);
            <?php endif; ?>
        },
        draw(index) {
            let tag1 = $refs['<?php echo e($getRefId('defaultIcon')); ?>'].getElementsByTagName('svg')[0];
            this.redraw(tag1, <?php echo e($getMax()); ?>);
            let tag2 = $refs['<?php echo e($getRefId('selectedIcon')); ?>'].getElementsByTagName('svg')[0];
            this.redraw(tag2, index);
        },
        redraw(templateTag, maxItems) {

            for(let i=1; i <= maxItems; i++) {
                if(!$refs['<?php echo e($getRefId('ratingIcons')); ?>_' + i]) {
                    continue;
                }

                let ratingTag = $refs['<?php echo e($getRefId('ratingIcons')); ?>_' + i].getElementsByTagName('svg')[0];

                while(ratingTag.attributes.length > 0){
                    ratingTag.removeAttribute(ratingTag.attributes[0].name);
                }

                Array.from(templateTag.attributes).forEach(attribute => {
                    ratingTag.setAttribute(
                        attribute.nodeName === 'id' ? 'data-id' : attribute.nodeName,
                        attribute.nodeValue,
                    );
                });

                ratingTag.innerHTML = templateTag.innerHTML;
            }
        },
        mouseoverHandler($event) {
            <?php if($isDisabled() || !$hasEffects()): ?>
                return;
            <?php else: ?>
                $event.stopPropagation();
                $event.preventDefault();
                let target = $event.target.dataset.index ?  $event.target : $event.target.closest('.rating-item');
                let index = target.dataset.index || false;

                if(!index) {
                    return;
                }

                this.draw(index);
            <?php endif; ?>
        },
        mouseleaveHandler($event) {
            <?php if($isDisabled() || !$hasEffects()): ?>
                return;
            <?php else: ?>
                $event.stopPropagation();
                $event.preventDefault();
                let index = this.state || 0;
                this.draw(index);
            <?php endif; ?>
        },
        clearHandler($event) {
            <?php if($isDisabled() || !$hasEffects()): ?>
                return;
            <?php else: ?>
                this.state = null;
                this.draw(this.state);
            <?php endif; ?>
        }
    }">
        <div class="hidden">
            <div x-ref="<?php echo e($getRefId('defaultIcon')); ?>">
                <?php echo $__env->make('filament-rating-field::forms.components._rating-item', [
                    'component' => $getIcon(),
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div x-ref="<?php echo e($getRefId('selectedIcon')); ?>">
                <?php echo $__env->make('filament-rating-field::forms.components._rating-item', [
                    'component' => $getSelectedIcon(),
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <ul class="ml-auto flex">
        <?php for($i = $getMin(); $i <= $getMax(); $i++): ?>
            <li
                class="rating-item"
                x-on:mouseenter="mouseoverHandler"
                x-on:mouseleave="mouseleaveHandler"
                data-index="<?php echo e($i); ?>"
                x-tooltip.raw="<?php echo e($getTooltip($i)); ?>"
                x-ref="<?php echo e($getRefId('ratingIcons', $i)); ?>">
                <?php echo $__env->make('filament-rating-field::forms.components._rating-item', [
                    'component' => $i <= $getState() ? $getSelectedIcon() : $getIcon(),
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </li>
        <?php endfor; ?>
            <?php if($isClearable()): ?>
            <li>
                <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $getClearIcon()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => 'clearHandler','x-tooltip.raw' => $getClearIconTooltip(),'style' => 'color: '.e($getClearIconColorStyle()).'','class' => 'mr-2 ml-1 rtl:ml-2 rtl:-mr-1 flex-shrink-0 '.e($getSizeClass()).' '.e($getCursorClass()).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
            </li>
            <?php endif; ?>
        </ul>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\stage\portfolio-app\vendor\yepsua\filament-rating-field\src\/../resources/views/forms/components/rating.blade.php ENDPATH**/ ?>