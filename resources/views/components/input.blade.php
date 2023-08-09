@props([
    'type' => 'text',
    'label' => null,
    'text' => null,
    'required' => false,
    'class' => '',
    'value' => '',
])
@if (!empty($label))
  <label
    class="form-label"
    for="{{ $attributes->get('name') }}"
  >{{ $label }}</label>
@endif
<input
  {{ $attributes->merge([
          'aria-describedby' => $attributes->get('name') . 'Feedback',
          'value' => old($attributes->get('name'), $text),
          'required' => $required,
      ])->class(['form-control', 'is-invalid' => $errors->has($attributes->get('name')), 'text-end' => $type == 'decimal']) }}
  type="{{ $type }}"
  value="{{ old($attributes->get('name'), $value) }}"
>
@if ($type == 'search')
  <div class="input-group-append">
    <button
      class="btn btn-outline-secondary"
      type="button"
    >
      <i class="fas fa-search"></i>
    </button>
  </div>
@endif
@error($attributes->get('name'))
  <div
    class="invalid-feedback"
    id="{{ $attributes->get('name') }}Feedback"
  >
    {{ $message }}
  </div>
@enderror
