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
                @section('page_name', 'Destinations List')
                @include('backend.breadcrumb')


                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="add-destinations" type="button" class="btn btn-primary"><i
                                class='bx bx-message-square-add'></i> Add Destinations</a>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Your all added Destinations</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Popular</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($destinations as $destination)
                                    <tr>
                                        <td><img src="{{ asset($destination->image) }}" class="table-image-holder"
                                                alt="image" /> </td>
                                        <td>{{ $destination->title }}</td>
                                        <td>{{ $destination->location }}</td>
                                        <td>{{ $destination->category }}</td>
                                        <td>
                                            @if ($destination->status)
                                                <span class="badge bg-success">Active</span></a>
                                            @else
                                                <span class="badge bg-danger">Deactivate</span></a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($destination->popular_status)
                                            <a href="#" type="button" class="btn btn-purple px-2 py-1">Popular</a>
                                            @else
                                            <a href="#" type="button" class="btn btn-purple"> Make Popular</a>
                                            @endif
                                           
                                        </td>
                                        <td>
                                            <div class=" table-icon-group">
                                                <button type="button" class="btn btn-dark"><i class="bx bxs-show me-0"></i></button>
                                                <button type="button" class="btn btn-danger"><i class="bx bxs-lock me-0"></i></button>
                                                <button type="button" class="btn btn-success"><i class="bx bxs-lock-open me-0"></i></button>
                                                <button type="button" class="btn btn-warning"><i class='bx bxs-trash-alt me-0'></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Popular</th>
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
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endpush
