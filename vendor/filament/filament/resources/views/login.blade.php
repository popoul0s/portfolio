<form wire:submit.prevent="authenticate" class="space-y-8">
    {{ $this->form }}
    <x-filament::button type="submit" form="authenticate" class="w-full">
        {{ __('filament::login.buttons.submit.label') }}
        
    </x-filament::button>
</form>
<div class="mt-4">

    <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        href="{{ url('/') }}">
        <x-filament::button type="submit" class="w-full">
            {{ __('Retour au Portfolio') }}

        </x-filament::button>
    </a>
</div>
