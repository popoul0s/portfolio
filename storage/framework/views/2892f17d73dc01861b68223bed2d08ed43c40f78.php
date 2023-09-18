<?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $getFieldWrapperView()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => $getId(),'label' => $getLabel(),'label-sr-only' => $isLabelHidden(),'helper-text' => $getHelperText(),'hint' => $getHint(),'hint-icon' => $getHintIcon(),'required' => $isRequired(),'state-path' => $getStatePath()]); ?>

    <div x-data="{

        state: $wire.<?php echo e($applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')')); ?>,

        disabled: <?php echo e($isDisabled()?$isDisabled():'false'); ?>,

        incrementDisabled: false,

        decrementDisabled: false,

        inputError:null,

        init: function(){

            this.checkDisabled()
        },

        increase: function(){

            this.$refs.stepper.stepUp()
            this.state = Number(this.$refs.stepper.value)
            this.validateData()
            this.checkDisabled()
        },

        decrease: function(){

            this.$refs.stepper.stepDown()
            this.state = Number(this.$refs.stepper.value)
            this.validateData()
            this.checkDisabled()

        },

        checkDisabled: function(){

            let value = this.$refs.stepper.value ? Number(this.$refs.stepper.value) : (this.state ? this.state : null)
            let max = this.$refs.stepper.max ? Number(this.$refs.stepper.max) : null
            let min = this.$refs.stepper.min ? Number(this.$refs.stepper.min) : null

            if(max != null && value >= max){
                this.incrementDisabled = true
            }else{
                this.incrementDisabled = false
            }

            if(min != null && value <= min){
                this.decrementDisabled = true
            }else{
                this.decrementDisabled = false
            }

        },

        validateData: function(){

            this.inputError = null

            let value = this.$refs.stepper.value ? Number(this.$refs.stepper.value) : null

            if(value == null){
                return 
            }

            if(this.$refs.stepper.min && value < Number(this.$refs.stepper.min)){
                this.inputError = 'The input value must greater than or equal to <span class=\'font-bold\'>' + this.$refs.stepper.min + '</span>.'
                return
            }

            if(this.$refs.stepper.max && value > Number(this.$refs.stepper.max)){
                this.inputError = 'The input value must less than or equal to <span class=\'font-bold\'>' + this.$refs.stepper.max + '</span>.'
                return
            }
            
            return true

        },

        blurInput: function(){
            this.state = this.$refs.stepper.value ? Number(this.$refs.stepper.value) : null
            this.validateData()
            this.checkDisabled()
        }

    }">
        <!-- Interact with the `state` property in Alpine.js -->
        <div class="flex items-center">

            <template x-if="decrementDisabled || disabled">
                <button
                    type="button"
                    class="w-10 h-10 rounded-l bg-gray-300 text-white text-lg font-bold"
                > - </button>
            </template>
            <template x-if="!decrementDisabled && !disabled">
                <button
                    type="button"
                    class="w-10 h-10 rounded-l bg-primary-500 text-white text-lg font-bold"
                    x-on:click="decrease()"
                > - </button>
            </template>
            
            <input
                x-ref="stepper"
                type="number"
                id="<?php echo e($getId()); ?>"
                x-model = "state"
                <?php echo ($placeholder = $getPlaceholder()) ? "placeholder=\"{$placeholder}\"" : null; ?>

                <?php echo ($interval = $getStep()) ? "step=\"{$interval}\"" : null; ?>

                <?php echo $isDisabled()||$isManualInputDisabled() ? 'disabled' : null; ?>

                <?php echo e($getExtraInputAttributeBag()->class([
                    'block w-full transition duration-75 shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70 filament-stepper',
                    'dark:bg-gray-700 dark:text-white dark:focus:border-primary-600' => config('forms.dark_mode'),
                    'border-gray-300' => ! $errors->has($getStatePath()),
                    'dark:border-gray-600' => (! $errors->has($getStatePath())) && config('forms.dark_mode'),
                    'border-danger-600 ring-danger-600' => $errors->has($getStatePath()),
                ])); ?>

                <?php if(! $isConcealed()): ?>
                    <?php echo filled($value = $getMaxValue()) ? "max=\"{$value}\"" : null; ?>

                    <?php echo filled($value = $getMinValue()) ? "min=\"{$value}\"" : null; ?>

                    <?php echo $isRequired() ? 'required' : null; ?>

                <?php endif; ?>
                x-on:blur="blurInput()"
            />
            
            <template x-if="incrementDisabled || disabled">
                <button
                    type="button"
                    class="w-10 h-10 rounded-r bg-gray-300 text-white text-lg font-bold"
                    disabled
                > + </button>

            </template>

            <template x-if="!incrementDisabled && !disabled">
                <button
                    type="button"
                    class="w-10 h-10 rounded-r bg-primary-500 text-white text-lg font-bold"
                    x-on:click="increase()"
                > + </button>

            </template>
            
        </div>

        <template x-if="inputError">
            <div class="text-danger-400" x-html="inputError"></div>
        </template>
        
    </div>
    <style>
        .filament-stepper::-webkit-outer-spin-button,
        .filament-stepper::-webkit-inner-spin-button {

            -webkit-appearance: none;

        }
        .filament-stepper {
            -moz-appearance: textfield;
        }
    </style>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\stage\portfolio-app\vendor\icetalker\filament-stepper\src/../resources/views/stepper.blade.php ENDPATH**/ ?>