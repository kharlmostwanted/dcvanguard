<div class="main">
  <div class="container-fluid">
    <table class="table-centered table-bordered table-sm mb-0 table">
      <thead>
        <tr>
          <th class="bg-white">ID</th>
          <th class="bg-white">STATUS</th>
          <th class="bg-white">NAME</th>
          <th class="bg-white">BIRTHDAY</th>
          <th class="bg-white">SSS NO.</th>
          <th class="bg-white">PHILHEALTH</th>
          <th class="bg-white">PAG-IBIG NO.</th>
          <th class="bg-white">TIN NUMBER</th>
          <th class="bg-white">LICENSE</th>
          <th class="bg-white">EXPIRY DATE</th>
          <th class="bg-white">EMPLOYED</th>
          <th class="bg-white">RESIGNED</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($this->employees as $employee)
          <tr>
            <td class="text-dark bg-white">{{ $employee->id_number }}</td>
            <td class="text-dark bg-white">{{ $employee->status }}</td>
            <td class="text-dark text-nowrap bg-white">
              <div class="d-flex justify-content-start align-items-center">
                <span class="avatar avatar-sm me-2">
                  <img
                    @if (!empty($employee->profile_img_id)) src="{{ route('images.show', $employee->profile_img_id) }}"
                @else
                  src="{{ Avatar::create($employee->name)->toBase64() }}" @endif
                    alt="avatar"
                    class="avatar-xl rounded-circle"
                  />
                </span>
                <div class="d-flex flex-column">
                  <span>{{ $employee->name }}</span>
                  <span>
                    @if ($employee->violations_count > 0)
                      <span class="badge bg-danger text-white">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        {{ $employee->violations_count }} {{ str('violation')->plural($employee->violations_count) }}
                      </span>
                    @endif
                  </span>
                </div>
              </div>
            </td>
            <td class="text-dark bg-white">{{ $employee->birth_date?->format('m/d/Y') }}</td>
            {{-- <td class="text-dark">{{ $employee->address }}</td>
          <td class="text-dark">{{ $employee->contact_number }}</td> --}}
            <td class="text-dark bg-white">{{ $employee->sss_number }}</td>
            <td class="text-dark bg-white">{{ $employee->philhealth_number }}</td>
            <td class="text-dark bg-white">{{ $employee->pagibig_number }}</td>
            <td class="text-dark bg-white">{{ $employee->tin_number }}</td>
            <td class="text-dark bg-white">
              {{ $employee->license_number }}
            </td>
            <td class="text-dark bg-white text-center">
              {{ $employee->expired_at?->format('m/d/Y') }}
            </td>
            <td class="text-dark bg-white text-center">
              {{ $employee->employed_at?->format('m/d/Y') }}
              @if (str($employee->status)->contains('resigned'))
                <span class="badge bg-warning">Resigned</span>
              @else
                {{ $employee->employed_at?->diffForHumans(now(), true, true) }}
              @endif
            </td>
            <td class="text-dark bg-white">
              {{ $employee->resigned_at?->format('m/d/Y') }}
            </td>
          </tr>
        @empty
          <tr>
            <td
              class="text-dark text-center bg-white"
              colspan="7"
            >No Employees Found</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
