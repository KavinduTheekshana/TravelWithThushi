@extends('layouts.backend')

@section('content')
    <!--wrapper-->
    <div class="wrapper">

        @include('backend.components.sidemenu')
        @include('backend.components.header')

        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                @section('page_group', 'Testimonials')
                @section('page_name', 'Testimonials List')
                @include('backend.components.breadcrumb')


                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('testimonial.add') }}" type="button" class="btn btn-primary"><i
                                class='bx bx-message-square-add'></i> Add Testimonials</a>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Your all added Testimonials</h6>
            <hr />
            @include('backend.components.alert')
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stars</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $testimonial)
                                    <tr>
                                        <td><img src="{{ asset($testimonial->image) }}" class="table-image-holder-round"
                                                alt="image" /> </td>
                                        <td>{{ $testimonial->name }}</td>
                                        <td>{{ $testimonial->star }} Stars</td>
                                        <td>{{ Str::limit(strip_tags($testimonial->comment), 40, '...') }}</td>
                                        <td>
                                            @if ($testimonial->status)
                                                <span class="badge bg-success">Active</span></a>
                                            @else
                                                <span class="badge bg-danger">Deactive</span></a>
                                            @endif

                                          
                                        </td>
                                   
                                        <td>
                                            <div class=" table-icon-group">
                                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#exampleLargeModal"
                                                    data-title="{{ $testimonial->name }}"
                                                    data-location="{{ $testimonial->star }}"
                                                    data-category="{{ $testimonial->comment }}"
                                            
                                                    data-image="{{ $testimonial->image }}"><i
                                                        class="bx bxs-show me-0"></i></button>

                                                @if ($testimonial->status)
                                                    <a href="{{ route('testimonial.diactive', ['id' => $testimonial->id]) }}"
                                                        type="button" class="btn btn-danger"><i
                                                            class="bx bxs-lock me-0"></i></a>
                                                @else
                                                    <a href="{{ route('testimonial.active', ['id' => $testimonial->id]) }}"
                                                        type="button" class="btn btn-success"><i
                                                            class="bx bxs-lock-open me-0"></i></a>
                                                @endif


                             
                                                <a href="{{ route('testimonial.delete', ['id' => $testimonial->id]) }}" type="button"
                                                    class="btn btn-warning"><i class='bx bxs-trash-alt me-0'></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>


                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end page wrapper -->

</div>
<!--end wrapper-->

@include('backend.components.footer')
@endsection

@push('scripts')
@include('backend.components.model')
<script>
    // data table 
    $(document).ready(function() {
        $('#example').DataTable();
    });

    // model content 
    $(document).ready(function() {
        $('#exampleLargeModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var title = button.data('title');
            var location = button.data('location');
            var status = button.data('status');
            var description = button.data('description');
            var popular = button.data('popular');
            var category = button.data('category');
            var image = button.data('image');

            if (status == 1) {
                $('#active-badge').html("Active");
                $('#active-badge').addClass('badge bg-success');
            } else {
                $('#active-badge').html("Deactive");
                $('#active-badge').addClass('badge bg-danger');
            }

            if (popular == 1) {
                $('#popular-badge').html("Popular");
                $('#popular-badge').addClass('badge bg-purple');
            } else {
                $('#popular-badge').html("Not Popular");
                $('#popular-badge').addClass('badge bg-secondary');
            }
            $('#category-badge').html(category);
            $('#modal-title').html(title);
            $('#modal-location').html(location);
            $('#modalBody').html(description);
            $('.model-image').attr('src', image);
        });
    });
</script>
@endpush
