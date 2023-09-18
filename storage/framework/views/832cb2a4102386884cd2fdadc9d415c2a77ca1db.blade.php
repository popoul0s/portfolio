<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['darkMode','tag','wire:click','href','target','disabled','color','tooltip','icon','size','dusk','class'])
<x-tables::dropdown.list.item :dark-mode="$darkMode" :tag="$tag" :wire:click="$wireClick" :href="$href" :target="$target" :disabled="$disabled" :color="$color" :tooltip="$tooltip" :icon="$icon" :size="$size" :dusk="$dusk" :class="$class" >

{{ $slot ?? "" }}
</x-tables::dropdown.list.item>