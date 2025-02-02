<div>
  <input
    {{ $attributes->merge([
            'aria-describedby' => $attributes->get('id') . 'Feedback',
        ])->class(['form-control', 'flatpickr', 'is-invalid' => $errors->has($attributes->get('id'))]) }}
  />
  @error($attributes->get('id'))
    <div class="invalid-feedback d-block">
      {{ $message }}
    </div>
  @enderror
</div>
@pushOnce('scripts')
  <script src="{{ asset('/assets/libs/flatpickr/dist/flatpickr.min.js') }}"></script>
  <script src="{{ asset('/assets/js/vendors/flatpickr.js') }}"></script>
@endPushOnce
