@props(['value', 'danger' => false, 'success' => false])

@if (!$danger && !$success)
    <span @class([
        'fw-bold',
        'text-danger' => $value < 1,
        'text-success' => $value > 1,
    ])>@money($value)</span>
@else
    <span @class([
        'fw-bold',
        'text-danger' => $danger,
        'text-success' => $success,
    ])>@money($value)</span>
@endif
