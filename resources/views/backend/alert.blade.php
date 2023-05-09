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


@if (session('status'))
<div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
<div class="d-flex align-items-center">
    <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
    </div>
    <div class="ms-3">
        <h6 class="mb-0 text-white">Success Alert</h6>
        <div class="text-white">{{ session('status') }}</div>
    </div>
</div>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif