<div>
  <div class="container-fluid">
    <!--row-->
    <div class="row gy-2">
      <div class="col-12">
        <div class="d-flex flex-column gap-4">
          <!--card-->
          <div class="card d-print-none">
            <!--img-->
            <div
              class="rounded-top-3"
              style="background-image: url({{ asset('/assets/images/mentor/mentor-single.png') }}); background-position: center; background-size: cover; background-repeat: no-repeat; height: 228px"
            ></div>
            <div class="card-body p-md-5">
              <div class="d-flex flex-column gap-5">
                <!--img-->
                <div class="mt-n8">
                  <img
                    alt="mentor 1"
                    class="img-fluid rounded-4 mt-n8"
                    height="172px"
                    src="{{ asset('/assets/images/mentor/mentor-img-single.jpg') }}"
                    width="172px"
                  />
                </div>
                <div class="d-flex flex-column gap-5">
                  <div class="d-flex flex-column gap-3">
                    <div class="d-flex flex-md-row flex-column justify-content-between gap-2">
                      <!--heading-->
                      <div>
                        <h1 class="mb-0">{{ $employee->name }}</h1>
                        <!--content-->
                        <div class="d-flex flex-lg-row flex-column gap-2">
                          <small class="fw-medium text-gray-800">{{ $employee->id_number }}</small>
                          <small class="fw-medium text-gray-800">{{ $employee->status }}</small>
                        </div>
                      </div>
                      <!--button-->
                      <div class="button-group gap-2">
                        <button
                          class="btn btn-primary"
                          onclick="window.print()"
                        >Print</button>
                        <a
                          class="btn btn-outline-primary"
                          href="{{ route('employees.index') }}"
                        >Back</a>
                      </div>
                    </div>
                    <div class="d-flex flex-md-row flex-column gap-md-4 gap-2">
                      <div class="d-flex align-items-center lh-1 flex-row gap-2">
                        <!--icon-->
                        <span>
                          <svg
                            class="bi bi-geo-alt-fill text-danger"
                            fill="currentColor"
                            height="12"
                            viewBox="0 0 16 16"
                            width="12"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                          </svg>
                        </span>
                        <!--text-->
                        <span>{{ $employee->address }}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--card-->
          <div class="card">
            <!--card body-->
            <div class="card-body p-md-5 d-flex flex-column gap-3">
              <!--heading-->
              <h3 class="mb-0">About</h3>
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>ID NUMBER</td>
                      <td>{{ $employee->id_number }}</td>
                    </tr>
                    <tr>
                      <td>NAME:</td>
                      <td>{{ $employee->name }}</td>
                    </tr>
                    <tr>
                      <td class="text-gray">DATE OF BIRTH</td>
                      <td>{{ $employee->birth_date->format('M d, Y') }}</td>
                    </tr>
                    <tr>
                      <td class="text-gray">ADDRESS</td>
                      <td>{{ $employee->address }}</td>
                    </tr>
                    <tr>
                      <td class="text-gray">CONTACT NO.</td>
                      <td>{{ $employee->contact_number }}</td>
                    </tr>
                    <tr>
                      <td class="text-gray">SSS NO.</td>
                      <td>{{ $employee->sss_number }}</td>
                    </tr>
                    <tr>
                      <td class="text-gray">PHILHEALTH</td>
                      <td>{{ $employee->philhealth_number }}</td>
                    </tr>
                    <tr>
                      <td class="text-gray">PAGIBIG NO.</td>
                      <td>{{ $employee->pagibig_number }}</td>
                    </tr>
                    <tr>
                      <td class="text-gray">TIN NUMBER</td>
                      <td>{{ $employee->tin_number }}</td>
                    </tr>
                    <tr>
                      <td class="text-gray">LICENSE</td>
                      <td>{{ $employee->license_number }}</td>
                    </tr>
                    <tr>
                      <td class="text-gray">EXPIRY DATE</td>
                      <td>{{ $employee->expired_at?->format('M d, Y') }}</td>
                    </tr>
                    <tr>
                      <td class="text-gray">EMPLOYMENT DATE</td>
                      <td>{{ $employee->employed_at?->format('M d, Y') }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
