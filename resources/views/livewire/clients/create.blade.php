@section('page-title', 'Create Client')
<div
  class="bs-stepper"
  id="courseForm"
>
  <div class="row">
    <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
      <!-- Stepper Button -->
      <div
        class="bs-stepper-header shadow-sm"
        role="tablist"
      >
        <div
          class="step"
          data-target="#test-l-1"
        >
          <button
            aria-controls="test-l-1"
            class="step-trigger"
            id="courseFormtrigger1"
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
          data-target="#test-l-3"
        >
          <button
            aria-controls="test-l-3"
            class="step-trigger"
            id="courseFormtrigger3"
            role="tab"
            type="button"
          >
            <span class="bs-stepper-circle">2</span>
            <span class="bs-stepper-label">Address</span>
          </button>
        </div>
        <div class="bs-stepper-line"></div>
        <div
          class="step"
          data-target="#test-l-4"
        >
          <button
            aria-controls="test-l-4"
            class="step-trigger"
            id="courseFormtrigger4"
            role="tab"
            type="button"
          >
            <span class="bs-stepper-circle">3</span>
            <span class="bs-stepper-label">Review & Save</span>
          </button>
        </div>
      </div>

      <!-- Stepper content -->
      <div class="bs-stepper-content mt-5">
        <!-- Content one -->
        <div
          aria-labelledby="courseFormtrigger1"
          class="bs-stepper-pane fade"
          id="test-l-1"
          role="tabpanel"
          wire:ignore.self
        >
          <!-- Card -->
          <div class="card mb-3">
            <div class="card-header border-bottom px-4 py-3">
              <h4 class="mb-0">BASIC INFORMATION</h4>
            </div>
            <!-- Card body -->
            <div class="card-header border-bottom px-4 py-3">
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
                  for="clientName"
                >Representative Name</label>
                <x-input
                  id="client.representative.name"
                  name="client.representative.name"
                  placeholder="Enter representative name"
                  required
                  type="text"
                  wire:model.debounce.500ms="client.representative.name"
                />
              </div>
              <!-- input -->
              <div class="col-md-12 mb-3">
                <label
                  class="form-label"
                  for="email"
                >Email</label>
                <x-input
                  id="client.representative.email"
                  name="client.representative.email"
                  placeholder="Enter representative email"
                  required
                  type="text"
                  wire:model.debounce.500ms="client.representative.email"
                />

              </div>
              <!-- input -->
              <div class="col-md-12 mb-3">
                <label
                  class="form-label"
                  for="phone"
                >Mobile Number</label>
                <x-input
                  id="client.representative.mobile_number"
                  name="client.representative.mobile_number"
                  placeholder="Enter representative mobile number"
                  required
                  type="number"
                  wire:model.debounce.500ms="client.representative.mobile_number"
                />
              </div>

            </div>
          </div>

          <!-- Button -->
          <button
            class="btn btn-primary"
            onclick="courseForm.next()"
          >
            Next
          </button>

        </div>

        <!-- Content two -->
        <div
          aria-labelledby="courseFormtrigger3"
          class="bs-stepper-pane fade"
          id="test-l-3"
          role="tabpanel"
          wire:ignore.self
        >
          <!-- Card -->
          <div class="card mb-3 border-0">
            <!-- Card body -->
            <div class="card-body">
              <!-- row -->
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
          <div class="d-flex justify-content-between">
            <button
              class="btn btn-secondary"
              onclick="courseForm.previous()"
            >
              Previous
            </button>
            <button
              class="btn btn-primary"
              onclick="courseForm.next()"
            >
              Next
            </button>
          </div>

        </div>
      </div>
      <!-- Content Three -->
      <div
        aria-labelledby="courseFormtrigger4"
        class="bs-stepper-pane fade"
        id="test-l-4"
        role="tabpanel"
        wire:ignore.self
      >
        <!-- Card -->
        <div class="card mb-3 border-0">
          <div class="card-body">
            <h4 class="card-title">Basic Information</h4>
            @dump($this->client)
            <p></p>
          </div>
          <div class="card-body">
            <h4 class="card-title">Address</h4>
            <p></p>
          </div>
        </div>
        <!-- Button -->
        <button
          class="btn btn-secondary mt-3"
          onclick="courseForm.previous()"
        >
          Previous
        </button>
        <button
          class="btn btn-info mt-3"
          type="submit"
        >
          Save
        </button>
      </div>
      </form>
    </div>

  </div>
</div>
