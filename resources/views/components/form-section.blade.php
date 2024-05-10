@props(['submit'])

<div {{ $attributes->merge(['class' => 'row']) }}>
    <div class="col-md-4 ">
        <x-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">
                <span class="small">
                    {{ $description }}
                </span>
            </x-slot>
        </x-section-title>
    </div>
    <div class="col-md-8">
        <div class="card shadow-sm" style="background: linear-gradient(1turn, #f1f6fd 30%, #edf1f7);">
            <form wire:submit.prevent="{{ $submit }}">
                <div class="card-body">
                    {{ $form }}
                </div>

                @if (isset($actions))
                    <div class="card-footer d-flex justify-content-end" style="background: transparent;">
                        {{ $actions }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>

