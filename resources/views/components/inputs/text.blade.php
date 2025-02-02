<div>
  <input
    {{ $attributes->merge([
            'aria-describedby' => $attributes->get('id') . 'Feedback',
        ])->class(['form-control', 'is-invalid' => $errors->has($attributes->get('id'))]) }}
  />
  @error($attributes->get('id'))
    <div
      class="invalid-feedback"
      id="{{ $attributes->get('id') }}Feedback"
    >
      {{ $message }}
    </div>
  @enderror
</div>
