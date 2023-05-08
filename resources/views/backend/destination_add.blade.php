@extends('layouts.backend')

@section('content')
    <!--wrapper-->
    <div class="wrapper">

        @include('backend.sidemenu')
        @include('backend.header')

        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                @section('page_group', 'Destinations')
                @section('page_name', 'Add Destinations')
                @include('backend.breadcrumb')


                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="destinations-list" type="button" class="btn btn-warning"><i
                                class='bx bx-list-check'></i>Destinations List</a>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h6 class="mb-0 text-uppercase">Add a New Destination to your list</h6>
                    <hr />

                    @if (count($errors) > 0)
                        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-white"><strong>Whoops!</strong> There were some problems with
                                        your input.</h6>
                                    <div class="text-white">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif


                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" method="POST" action="save-destinations"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <label for="input1" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="myTextbox" name="title"
                                            placeholder="Destination Title">
                                    </div>

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Slag</label>
                                        <input type="text" class="form-control" id="mySlugbox" name="slug"
                                            placeholder="Destination Title Slag" readonly>
                                    </div>

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Location</label>
                                        <input type="text" class="form-control" name="location"
                                            placeholder="Location">
                                    </div>

                                    <div class="form-row">
                                        <label for="input7" class="form-label">Category</label>
                                        <select id="input7" class="form-select" name="category">
                                            <option selected>Choose...</option>
                                            <option value="Adventure">Adventure</option>
                                            <option value="Beach and Coastal">Beach and Coastal</option>
                                            <option value="City Breaks">City Breaks</option>
                                            <option value="Cultural and Heritage">Cultural and Heritage</option>
                                            <option value="Educational">Educational</option>
                                            <option value="Food and Wine">Food and Wine</option>
                                            <option value="Luxury">Luxury</option>
                                            <option value="Nature and Wildlife">Nature and Wildlife</option>
                                            <option value="Road Trips">Road Trips</option>
                                            <option value="Solo Travel">Solo Travel</option>
                                            <option value="Wellness and Spa">Wellness and Spa</option>
                                        </select>
                                    </div>

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Cover Image</label>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                            <input type="file" class="form-control" name="image"
                                                id="inputGroupFile01" onchange="readURL(this);">
                                        </div>

                                        <img id="blah"
                                            src="{{ asset('backend/assets/images/btx-placeholder-04-2.jpg') }}"
                                            class="placeholder-image" alt="your image" />
                                    </div>

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Description</label>

                                        <textarea id="myeditorinstance" name="description">Hello, World!</textarea>


                                        {{-- <div class="mt-0 pt-5 pb-5" id="editor">
                                            <input type="hidden" name="description" />
                                        </div> --}}
                                    </div>

                                    <div class="form-row">
                                        <div class="d-grid d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary px-4">Submit</button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>





                </div>
            </div>

        </div>
    </div>
    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    <footer class="page-footer">
        <p class="mb-0">Copyright © 2021. All right reserved.</p>
    </footer>
</div>
<!--end wrapper-->

@include('backend.footer')
@endsection

@push('scripts')
<script>
    // editer 
    tinymce.init({
    selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | table'
  });

    // image display
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    // slug editer 
    $(document).ready(function() {
        $('#myTextbox').on('input', function() {
            var value = $(this).val();
            var slug = value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
            $('#mySlugbox').val(slug);
        });
    });



</script>


@endpush
