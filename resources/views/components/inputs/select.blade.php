@props(['options', 'nullable' => false])
<div>
  <select
    {{ $attributes->merge([
            'aria-describedby' => $attributes->get('id') . 'Feedback',
        ])->class(['form-control', 'is-invalid' => $errors->has($attributes->get('id'))]) }}
  >
    <option hidden>{{ $attributes->get('placeholder') }}</option>
    @if ($nullable)
      <option>All</option>
    @endif
    @foreach ($options as $option)
      <option value="{{ $option->id }}">{{ $option->title }}</option>
    @endforeach
  </select>
  @error($attributes->get('id'))
    <div
      class="invalid-feedback"
      id="{{ $attributes->get('id') }}Feedback"
    >
      {{ $message }}
    </div>
  @enderror
</div>
