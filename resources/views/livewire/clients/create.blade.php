@section('page-title', 'Create Client')
<div class="container">
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
            data-target="#test-l-2"
          >
            <button
              aria-controls="test-l-2"
              class="step-trigger"
              id="courseFormtrigger2"
              role="tab"
              type="button"
            >
              <span class="bs-stepper-circle">2</span>
              <span class="bs-stepper-label">Courses Media</span>
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
              <span class="bs-stepper-circle">3</span>
              <span class="bs-stepper-label">Curriculum</span>
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
              <span class="bs-stepper-circle">4</span>
              <span class="bs-stepper-label">Settings</span>
            </button>
          </div>
        </div>
        <!-- Stepper content -->
        <div class="bs-stepper-content mt-5">
          <form onSubmit="return false">
            <!-- Content one -->
            <div
              aria-labelledby="courseFormtrigger1"
              class="bs-stepper-pane fade"
              id="test-l-1"
              role="tabpanel"
            >
              <!-- Card -->
              <div class="card mb-3">
                <div class="card-header border-bottom px-4 py-3">
                  <h4 class="mb-0">Basic Information</h4>
                </div>
                <!-- Card body -->
                <div class="card-body">
                  <div class="mb-3">
                    <label
                      class="form-label"
                      for="courseTitle"
                    >Course Title</label>
                    <input
                      class="form-control"
                      id="courseTitle"
                      placeholder="Course Title"
                      type="text"
                    >
                    <small>Write a 60 character course title.</small>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Courses category</label>
                    <select
                      class="selectpicker"
                      data-width="100%"
                    >
                      <option value="">Select category</option>
                      <option value="React">React</option>
                      <option value="Javascript">Javascript</option>
                      <option value="HTML">HTML</option>
                      <option value="Vue">Vue js</option>
                      <option value="Gulp">Gulp js</option>
                    </select>
                    <small>Help people find your courses by choosing
                      categories that represent your course.</small>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Courses level</label>
                    <select
                      class="selectpicker"
                      data-width="100%"
                    >
                      <option value="">Select level</option>
                      <option value="intermediate">Intermediate</option>
                      <option value="Beignners">Beignners</option>
                      <option value="Advance">Advance</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Course Description</label>
                    <div id="editor">
                      <p>Insert course description</p>
                      <p>Some initial <strong>bold</strong> text</p>
                      <p><br></p>
                    </div>
                    <small>A brief summary of your courses.</small>
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
              aria-labelledby="courseFormtrigger2"
              class="bs-stepper-pane fade"
              id="test-l-2"
              role="tabpanel"
            >
              <!-- Card -->
              <div class="card mb-3 border-0">
                <div class="card-header border-bottom px-4 py-3">
                  <h4 class="mb-0">Courses Media</h4>
                </div>
                <!-- Card body -->
                <div class="card-body">
                  <div
                    class="custom-file-container mb-4"
                    data-upload-id="courseImage"
                  ></div>
                  <div>
                    <input
                      class="form-control"
                      placeholder="Video URL"
                      type="url"
                    >
                  </div>
                  <small class="d-block mt-3">Enter a valid video URL. Students who watch a
                    well-made promo video are 5X more likely to enroll in
                    your course.
                  </small>
                  <div
                    class="d-flex justify-content-center position-relative mt-3 rounded rounded border border-white bg-cover py-14"
                    style="background-image: url(../assets/images/course/course-javascript.jpg);
                                 "
                  >
                    <a
                      class="popup-youtube icon-shape rounded-circle btn-play icon-xl text-decoration-none"
                      href="https://www.youtube.com/watch?v=JRzWRZahOVU"
                    >
                      <i class="fe fe-play fs-3"></i>
                    </a>
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
            <!-- Content three -->
            <div
              aria-labelledby="courseFormtrigger3"
              class="bs-stepper-pane fade"
              id="test-l-3"
              role="tabpanel"
            >
              <!-- Card -->
              <div class="card mb-3 border-0">
                <div class="card-header border-bottom px-4 py-3">
                  <h4 class="mb-0">Curriculum</h4>
                </div>
                <!-- Card body -->
                <div class="card-body">
                  <div class="bg-light mb-4 rounded p-2">
                    <h4>Introduction to JavaScript</h4>
                    <!-- List group -->
                    <div
                      class="list-group list-group-flush border-top-0"
                      id="courseList"
                    >
                      <div id="courseOne">
                        <div
                          class="list-group-item text-nowrap mb-1 rounded px-3"
                          id="introduction"
                        >
                          <div class="d-flex align-items-center justify-content-between">
                            <h5 class="text-truncate mb-0">
                              <a
                                class="text-inherit"
                                href="#"
                              >
                                <i class="fe fe-menu text-muted me-1 align-middle"></i>
                                <span class="align-middle">Introduction</span>
                              </a>
                            </h5>
                            <div><a
                                class="me-1 text-inherit"
                                data-bs-toggle="tooltip"
                                data-placement="top"
                                href="#"
                                title="Edit"
                              ><i class="fe fe-edit fs-6"></i></a>
                              <a
                                class="me-1 text-inherit"
                                data-bs-toggle="tooltip"
                                data-placement="top"
                                href="#"
                                title="Delete"
                              ><i class="fe fe-trash-2 fs-6"></i></a>
                              <a
                                aria-controls="collapselistOne"
                                aria-expanded="true"
                                class="text-inherit"
                                data-bs-target="#collapselistOne"
                                data-bs-toggle="collapse"
                                href="#"
                              >
                                <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span>
                              </a>
                            </div>
                          </div>
                          <div
                            aria-labelledby="introduction"
                            class="show collapse"
                            data-bs-parent="#courseList"
                            id="collapselistOne"
                          >
                            <div class="p-md-4 p-2">
                              <a
                                class="btn btn-secondary btn-sm"
                                href="#"
                              >Add
                                Article +</a>
                              <a
                                class="btn btn-secondary btn-sm"
                                href="#"
                              >Add
                                Description +</a>
                            </div>
                          </div>
                        </div>
                        <div
                          class="list-group-item text-nowrap mb-1 rounded px-3"
                          id="development"
                        >
                          <div class="d-flex align-items-center justify-content-between">
                            <h5 class="text-truncate mb-0">
                              <a
                                class="text-inherit"
                                href="#"
                              >
                                <i class="fe fe-menu text-muted me-1 align-middle"></i>
                                <span class="align-middle">Installing
                                  Development Software</span>
                              </a>
                            </h5>
                            <div><a
                                class="me-1 text-inherit"
                                data-bs-toggle="tooltip"
                                data-placement="top"
                                href="#"
                                title="Edit"
                              ><i class="fe fe-edit fs-6"></i></a>
                              <a
                                class="me-1 text-inherit"
                                data-bs-toggle="tooltip"
                                data-placement="top"
                                href="#"
                                title="Delete"
                              ><i class="fe fe-trash-2 fs-6"></i></a>
                              <a
                                aria-controls="collapselistTwo"
                                aria-expanded="false"
                                class="text-inherit"
                                data-bs-target="#collapselistTwo"
                                data-bs-toggle="collapse"
                                href="#"
                              >
                                <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span>
                              </a>
                            </div>
                          </div>
                          <div
                            aria-labelledby="development"
                            class="collapse"
                            data-bs-parent="#courseList"
                            id="collapselistTwo"
                          >
                            <div class="p-md-4 p-2">
                              <a
                                class="btn btn-secondary btn-sm"
                                href="#"
                              >Add
                                Article +</a>
                              <a
                                class="btn btn-secondary btn-sm"
                                href="#"
                              >Add
                                Description +</a>
                            </div>
                          </div>
                        </div>
                        <div
                          class="list-group-item text-nowrap mb-1 rounded px-3"
                          id="project"
                        >
                          <div class="d-flex align-items-center justify-content-between">
                            <h5 class="text-truncate mb-0">
                              <a
                                class="text-inherit"
                                href="#"
                              >
                                <i class="fe fe-menu text-muted me-1 align-middle"></i>
                                <span class="align-middle">Hello World Project
                                  from GitHub</span>
                              </a>
                            </h5>
                            <div><a
                                class="me-1 text-inherit"
                                data-bs-toggle="tooltip"
                                data-placement="top"
                                href="#"
                                title="Edit"
                              ><i class="fe fe-edit fs-6"></i></a>
                              <a
                                class="me-1 text-inherit"
                                data-bs-toggle="tooltip"
                                data-placement="top"
                                href="#"
                                title="Delete"
                              ><i class="fe fe-trash-2 fs-6"></i></a>
                              <a
                                aria-controls="collapselistThree"
                                aria-expanded="false"
                                class="text-inherit"
                                data-bs-target="#collapselistThree"
                                data-bs-toggle="collapse"
                                href="#"
                              >
                                <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span></a>
                            </div>
                          </div>
                          <div
                            aria-labelledby="project"
                            class="collapse"
                            data-bs-parent="#courseList"
                            id="collapselistThree"
                          >
                            <div class="p-md-4 p-2">
                              <a
                                class="btn btn-secondary btn-sm"
                                href="#"
                              >Add
                                Article +</a>
                              <a
                                class="btn btn-secondary btn-sm"
                                href="#"
                              >Add
                                Description +</a>
                            </div>
                          </div>
                        </div>
                        <div
                          class="list-group-item text-nowrap mb-1 rounded px-3"
                          id="sample"
                        >
                          <div class="d-flex align-items-center justify-content-between">
                            <h5 class="text-truncate mb-0">
                              <a
                                class="text-inherit"
                                href="#"
                              >
                                <i class="fe fe-menu text-muted me-1 align-middle"></i>
                                <span class="align-middle">Our Sample
                                  Website</span>
                              </a>
                            </h5>
                            <div><a
                                class="me-1 text-inherit"
                                data-bs-toggle="tooltip"
                                data-placement="top"
                                href="#"
                                title="Edit"
                              ><i class="fe fe-edit fs-6"></i></a>
                              <a
                                class="me-1 text-inherit"
                                data-bs-toggle="tooltip"
                                data-placement="top"
                                href="#"
                                title="Delete"
                              ><i class="fe fe-trash-2 fs-6"></i></a>
                              <a
                                aria-controls="collapselistFour"
                                aria-expanded="false"
                                class="text-inherit"
                                data-bs-target="#collapselistFour"
                                data-bs-toggle="collapse"
                                href="#"
                              >
                                <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span></a>
                            </div>
                          </div>
                          <div
                            aria-labelledby="sample"
                            class="collapse"
                            data-bs-parent="#courseList"
                            id="collapselistFour"
                          >
                            <div class="p-md-4 p-2">
                              <a
                                class="btn btn-secondary btn-sm"
                                href="#"
                              >Add
                                Article +</a>
                              <a
                                class="btn btn-secondary btn-sm"
                                href="#"
                              >Add
                                Description +</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <a
                      class="btn btn-outline-primary btn-sm mt-3"
                      data-bs-target="#addLectureModal"
                      data-bs-toggle="modal"
                      href="#"
                    >Add Lecture +</a>
                  </div>
                  <div class="bg-light mb-4 rounded p-2">
                    <h4>JavaScript Beginnings</h4>

                    <!-- List group -->
                    <div
                      class="list-group list-group-flush border-top-0"
                      id="courseListSecond"
                    >
                      <div id="courseTwo">
                        <div
                          class="list-group-item text-nowrap mb-1 rounded px-3"
                          id="introductionSecond"
                        >
                          <div class="d-flex align-items-center justify-content-between">
                            <h5 class="text-truncate mb-0">
                              <a
                                class="text-inherit"
                                href="#"
                              >
                                <i class="fe fe-menu text-muted me-1 align-middle"></i>
                                <span class="align-middle">Introduction</span>
                              </a>
                            </h5>
                            <div><a
                                class="me-1 text-inherit"
                                data-bs-toggle="tooltip"
                                data-placement="top"
                                href="#"
                                title="Edit"
                              ><i class="fe fe-edit fs-6"></i></a>
                              <a
                                class="me-1 text-inherit"
                                data-bs-toggle="tooltip"
                                data-placement="top"
                                href="#"
                                title="Delete"
                              ><i class="fe fe-trash-2 fs-6"></i></a>
                              <a
                                aria-controls="collapselistFive"
                                aria-expanded="false"
                                class="text-inherit"
                                data-bs-target="#collapselistFive"
                                data-bs-toggle="collapse"
                                href="#"
                              >
                                <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span></a>
                            </div>
                          </div>
                          <div
                            aria-labelledby="introductionSecond"
                            class="collapse"
                            data-bs-parent="#courseListSecond"
                            id="collapselistFive"
                          >
                            <div class="p-md-4 p-2">
                              <a
                                class="btn btn-secondary btn-sm"
                                href="#"
                              >Add
                                Article +</a>
                              <a
                                class="btn btn-secondary btn-sm"
                                href="#"
                              >Add
                                Description +</a>
                            </div>
                          </div>
                        </div>
                        <div
                          class="list-group-item text-nowrap mb-1 rounded px-3"
                          id="developmentSecond"
                        >
                          <div class="d-flex align-items-center justify-content-between">
                            <h5 class="text-truncate mb-0">
                              <a
                                class="text-inherit"
                                href="#"
                              >
                                <i class="fe fe-menu text-muted me-1 align-middle"></i>
                                <span class="align-middle">Installing
                                  Development Software</span>
                              </a>
                            </h5>
                            <div><a
                                class="me-1 text-inherit"
                                data-bs-toggle="tooltip"
                                data-placement="top"
                                href="#"
                                title="Edit"
                              ><i class="fe fe-edit fs-6"></i></a>
                              <a
                                class="me-1 text-inherit"
                                data-bs-toggle="tooltip"
                                data-placement="top"
                                href="#"
                                title="Delete"
                              ><i class="fe fe-trash-2 fs-6"></i></a>
                              <a
                                aria-controls="collapselistSix"
                                aria-expanded="false"
                                class="text-inherit"
                                data-bs-target="#collapselistSix"
                                data-bs-toggle="collapse"
                                href="#"
                              >
                                <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span></a>
                            </div>
                          </div>
                          <div
                            aria-labelledby="developmentSecond"
                            class="collapse"
                            data-bs-parent="#courseListSecond"
                            id="collapselistSix"
                          >
                            <div class="p-md-4 p-2">
                              <a
                                class="btn btn-secondary btn-sm"
                                href="#"
                              >Add
                                Article +</a>
                              <a
                                class="btn btn-secondary btn-sm"
                                href="#"
                              >Add
                                Description +</a>
                            </div>
                          </div>
                        </div>
                        <div
                          class="list-group-item text-nowrap mb-1 rounded px-3"
                          id="projectSecond"
                        >
                          <div class="d-flex align-items-center justify-content-between">
                            <h5 class="text-truncate mb-0">
                              <a
                                class="text-inherit"
                                href="#"
                              >
                                <i class="fe fe-menu text-muted me-1 align-middle"></i>
                                <span class="align-middle">Hello World Project
                                  from GitHub</span>
                              </a>
                            </h5>
                            <div><a
                                class="me-1 text-inherit"
                                data-bs-toggle="tooltip"
                                data-placement="top"
                                href="#"
                                title="Edit"
                              ><i class="fe fe-edit fs-6"></i></a>
                              <a
                                class="me-1 text-inherit"
                                data-bs-toggle="tooltip"
                                data-placement="top"
                                href="#"
                                title="Delete"
                              ><i class="fe fe-trash-2 fs-6"></i></a>
                              <a
                                aria-controls="collapselistSeven"
                                aria-expanded="false"
                                class="text-inherit"
                                data-bs-target="#collapselistSeven"
                                data-bs-toggle="collapse"
                                href="#"
                              >
                                <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span></a>
                            </div>
                          </div>
                          <div
                            aria-labelledby="projectSecond"
                            class="collapse"
                            data-bs-parent="#courseListSecond"
                            id="collapselistSeven"
                          >
                            <div class="p-md-4 p-2">
                              <a
                                class="btn btn-secondary btn-sm"
                                href="#"
                              >Add
                                Article +</a>
                              <a
                                class="btn btn-secondary btn-sm"
                                href="#"
                              >Add
                                Description +</a>
                            </div>
                          </div>
                        </div>
                        <div
                          class="list-group-item text-nowrap mb-1 rounded px-3"
                          id="sampleSecond"
                        >
                          <div class="d-flex align-items-center justify-content-between">
                            <h5 class="text-truncate mb-0">
                              <a
                                class="text-inherit"
                                href="#"
                              >
                                <i class="fe fe-menu text-muted me-1 align-middle"></i>
                                <span class="align-middle">Our Sample
                                  Website</span>
                              </a>
                            </h5>
                            <div><a
                                class="me-1 text-inherit"
                                data-bs-toggle="tooltip"
                                data-placement="top"
                                href="#"
                                title="Edit"
                              ><i class="fe fe-edit fs-6"></i></a>
                              <a
                                class="me-1 text-inherit"
                                data-bs-toggle="tooltip"
                                data-placement="top"
                                href="#"
                                title="Delete"
                              ><i class="fe fe-trash-2 fs-6"></i></a>
                              <a
                                aria-controls="collapselistEight"
                                aria-expanded="false"
                                class="text-inherit"
                                data-bs-target="#collapselistEight"
                                data-bs-toggle="collapse"
                                href="#"
                              >
                                <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span></a>
                            </div>
                          </div>
                          <div
                            aria-labelledby="sampleSecond"
                            class="collapse"
                            data-bs-parent="#courseListSecond"
                            id="collapselistEight"
                          >
                            <div class="p-md-4 p-2">
                              <a
                                class="btn btn-secondary btn-sm"
                                href="#"
                              >Add
                                Article +</a>
                              <a
                                class="btn btn-secondary btn-sm"
                                href="#"
                              >Add
                                Description +</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <a
                      class="btn btn-outline-primary btn-sm mt-3"
                      data-bs-target="#addLectureModal"
                      data-bs-toggle="modal"
                      href="#"
                    >Add Lecture +</a>
                  </div>
                  <a
                    class="btn btn-outline-primary btn-sm"
                    data-bs-target="#addSectionModal"
                    data-bs-toggle="modal"
                    href="#"
                  >Add Section</a>
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
            <!-- Content four -->
            <div
              aria-labelledby="courseFormtrigger4"
              class="bs-stepper-pane fade"
              id="test-l-4"
              role="tabpanel"
            >
              <!-- Card -->
              <div class="card mb-3 border-0">
                <div class="card-header border-bottom px-4 py-3">
                  <h4 class="mb-0">Requirements</h4>
                </div>
                <!-- Card body -->
                <div class="card-body">
                  <input
                    autofocus
                    class="w-100"
                    name='tags'
                    value='jquery, bootstrap'
                  >
                </div>
              </div>
              <div class="d-flex justify-content-between mb-22">
                <!-- Button -->
                <button
                  class="btn btn-secondary mt-5"
                  onclick="courseForm.previous()"
                >
                  Previous
                </button>
                <button
                  class="btn btn-danger mt-5"
                  type="submit"
                >
                  Submit For Review
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
  <script src="../assets/libs/file-upload-with-preview/dist/file-upload-with-preview.iife.js"></script>
  <script src="../assets/libs/@yaireo/tagify/dist/tagify.min.js"></script>
  <script src="../assets/libs/quill/dist/quill.min.js"></script>
  <script src="../assets/libs/dragula/dist/dragula.min.js"></script>
  <script src="../assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  <script src="../assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
  <script src="../assets/js/vendors/beStepper.js"></script>
  <script src="../assets/js/vendors/customDragula.js"></script>
  <script src="../assets/js/vendors/editor.js"></script>
  <script src="../assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
  <script src="../assets/js/vendors/popup.js"></script>
@endpush
