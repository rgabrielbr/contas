@props([
    'errors' => [],
    'options' => [],
    'value' => null,
])

<select {{ $attributes->class(['form-select', 'is-invalid' => count($errors)])->merge() }}>
    @foreach ($options as $val => $name)
        <option value="{{ $val }}" @selected($val === $value)>{{ $name }}</option>
    @endforeach
</select>

@if ($errors)
    <div class="invalid-feedback">
        {{ $errors[0] }}
    </div>
@endif
