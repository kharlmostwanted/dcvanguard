@section('page-title', 'Edit Client: ' . $client->company_name)
<div class="container">
  <div
    class="bs-stepper"
    id="courseForm"
  >
    <div class="row">
      <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
        <!-- Success Message -->
        @if (session()->has('message'))
          <div class="alert alert-success mb-4">
            {{ session('message') }}
          </div>
        @endif
        <!-- Stepper Button -->
        <div
          class="bs-stepper-header shadow-sm"
          role="tablist"
        >
          <div
            class="step"
            data-target="#basicInfo"
          >
            <button
              aria-controls="basicInfo"
              class="step-trigger"
              id="clientBasicInfoTrigger"
              role="tab"
              type="button"
            >
              <span class="bs-stepper-circle">1</span>
              <span class="bs-stepper-label">Basic Information</span>
            </button>
          </div>
          <div class="bs-stepper-line"></div>
          <div
            class="step"
            data-target="#review"
          >
            <button
              aria-controls="review"
              class="step-trigger"
              id="clientReviewTrigger"
              role="tab"
              type="button"
            >
              <span class="bs-stepper-circle">2</span>
              <span class="bs-stepper-label">Review</span>
            </button>
          </div>
        </div>
        <!-- Stepper content -->
        <div class="bs-stepper-content mt-5">
          <form wire:submit.prevent="save">
            <!-- Content one basic info -->
            <div
              aria-labelledby="clientBasicInfoTrigger"
              class="bs-stepper-pane fade"
              id="basicInfo"
              role="tabpanel"
              wire:ignore.self
            >
              <!-- Card -->

              <div class="card mb-3">
                <div class="card-header border-bottom px-4 py-3">
                  <h4 class="mb-0">Basic Information</h4>
                </div>
                <!-- Card body -->
                <div class="card-body">
                  <div class="row gx-3">
                    <!-- input -->
                    <div class="col-md-12 mb-3">
                      <label
                        class="form-label"
                        for="companyName"
                      >Company Name</label>
                      <x-input
                        id="client.company_name"
                        name="client.company_name"
                        placeholder="Enter company name"
                        required
                        type="text"
                        wire:model.debounce.500ms="client.company_name"
                      />
                    </div>
                    <!-- input -->
                    <div class="col-md-12 mb-3">
                      <label
                        class="form-label"
                        for="since"
                      >Client Since</label>
                      <input
                        class="form-control flatpickr"
                        id="client.since"
                        name="client.since"
                        placeholder="client since"
                        type="text"
                        wire:model="client.since"
                      >
                    </div>
                    <!-- input -->
                    <div class="col-md-12 mb-3">
                      <label
                        class="form-label"
                        for="clientName"
                      >Representative Name</label>
                      <x-input
                        id="user.name"
                        name="user.name"
                        placeholder="Enter representative name"
                        required
                        type="text"
                        wire:model.debounce.500ms="user.name"
                      />
                    </div>
                    <!-- input -->
                    <div class="col-md-12 mb-3">
                      <label
                        class="form-label"
                        for="email"
                      >Email</label>
                      <x-input
                        id="user.email"
                        name="user.email"
                        placeholder="Enter representative email"
                        required
                        type="text"
                        wire:model.debounce.500ms="user.email"
                      />

                    </div>
                    <!-- input -->
                    <div class="col-md-12 mb-3">
                      <label
                        class="form-label"
                        for="phone"
                      >Mobile Number</label>
                      <x-input
                        id="user.mobile_number"
                        name="user.mobile_number"
                        placeholder="Enter representative mobile number"
                        required
                        type="number"
                        wire:model.debounce.500ms="user.mobile_number"
                      />
                    </div>

                  </div>
                  <div class="row gx-3">
                    <!-- input -->
                    <div class="col-md-12 mb-3">
                      <label
                        class="form-label"
                        for="street"
                      >Street</label>
                      <x-input
                        id="client.street"
                        name="client.street"
                        placeholder="Street"
                        required
                        type="text"
                        wire:model.debounce.500ms="client.street"
                      />
                    </div>
                    <!-- input -->
                    <div class="col-md-6 mb-3">
                      <label
                        class="form-label"
                        for="building"
                      >City</label>
                      <x-input
                        id="client.city"
                        name="client.city"
                        placeholder="City"
                        required
                        type="text"
                        wire:model.debounce.500ms="client.city"
                      />
                    </div>
                    <!-- input -->
                    <div class="col-md-6 mb-3">
                      <label
                        class="form-label"
                        for="city"
                      >Province</label>
                      <x-input
                        id="client.province"
                        name="client.province"
                        placeholder="Province"
                        required
                        type="text"
                        wire:model.debounce.500ms="client.province"
                      />
                    </div>
                  </div>
                </div>
              </div>
              <!-- Button -->
              <button
                class="btn btn-primary"
                onclick="courseForm.next()"
                type="button"
              >
                Next
              </button>
            </div>
            <!-- Content two review -->
            <div
              aria-labelledby="clientReviewTrigger"
              class="bs-stepper-pane fade"
              id="review"
              role="tabpanel"
              wire:ignore.self
            >
              <!-- Card -->
              <div class="card mb-3 border-0">
                <div class="card-header border-bottom px-4 py-3">
                  <h4 class="mb-0">Review & Save</h4>
                </div>
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-3">Company Name:</div>
                    <div class="col-9">{{ @$this->client['company_name'] }} </div>
                  </div>
                  <div class="row">
                    <div class="col-3">Client Since:</div>
                    <div class="col-9">{{ Carbon\Carbon::parse(@$this->client['since'])->format('M d, Y') }} </div>
                  </div>
                  <div class="row">
                    <div class="col-3">Representative Name:</div>
                    <div class="col-9">{{ @$this->user['name'] }} </div>
                  </div>
                  <div class="row">
                    <div class="col-3">Representative Email:</div>
                    <div class="col-9">{{ @$this->user['email'] }} </div>
                  </div>
                  <div class="row">
                    <div class="col-3">Representative Mobile Number:</div>
                    <div class="col-9">{{ @$this->user['mobile_number'] }} </div>
                  </div>
                  <div class="row">
                    <div class="col-3">Address:</div>
                    <div class="col-9">{{ @$this->address }} </div>
                  </div>
                </div>
              </div>
              <!-- Button -->
              <div class="d-flex justify-content-between">
                <button
                  class="btn btn-secondary"
                  onclick="courseForm.previous()"
                >
                  Previous
                </button>
                <button
                  class="btn btn-primary"
                  wire:click="save"
                >
                  Save
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@push('scripts')
  <script src="{{ asset('/assets/libs/@yaireo/tagify/dist/tagify.min.js') }}"></script>
  <script src="{{ asset('/assets/libs/quill/dist/quill.min.js') }}"></script>
  <script src="{{ asset('/assets/libs/dragula/dist/dragula.min.js') }}"></script>
  <script src="{{ asset('/assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
  <script src="{{ asset('/assets/libs/bs-stepper/dist/js/bs-stepper.min.js') }}"></script>
  <script src="{{ asset('/assets/js/vendors/beStepper.js') }}"></script>
  <script src="{{ asset('/assets/js/vendors/customDragula.js') }}"></script>
  <script src="{{ asset('/assets/js/vendors/editor.js') }}"></script>
  <script src="{{ asset('/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('/assets/js/vendors/popup.js') }}"></script>
  <script src="{{ asset('/assets/libs/flatpickr/dist/flatpickr.min.js') }}"></script>
  <script src="{{ asset('/assets/js/vendors/flatpickr.js') }}"></script>
@endpush
