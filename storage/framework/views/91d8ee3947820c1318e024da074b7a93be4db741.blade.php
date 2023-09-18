<svg x-show="getStepIndex(step) <= 0" x-cloak="1" x-bind:class="{
                                            'text-gray-500 @if (config('forms.dark_mode')) dark:text-gray-400 @endif': getStepIndex(step) !== 0,
                                            'text-primary-500': getStepIndex(step) === 0,
                                        }" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
</svg>