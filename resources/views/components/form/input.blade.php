@props([
    'errors' => [],
])

<input {{ $attributes->class(['form-control', 'is-invalid' => count($errors)])->merge(['type' => 'text']) }} />

@if ($errors)
    <div class="invalid-feedback">
        {{ $errors[0] }}
    </div>
@endif
