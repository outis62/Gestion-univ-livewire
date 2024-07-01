@if ($message = Session::get('success'))
<div class="alert alert-success mb-2 alert-dismissible fade show d-flex align-items-center py-1 px-2" role="alert">
    <i class="ri-checkbox-circle-fill mr-2 fs-3"></i>
    <p class="mb-0"><strong><span>{!! $message !!}</span></strong></p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mb-2 py-1 px-2" role="alert">
    <i class="ri-alarm-warning-fill mr-2 fs-3"></i>
    <p class="mb-0"><strong><span>{!! $message !!}</span></strong></p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissible fade show d-flex align-items-center mb-2 py-1 px-2" role="alert">
    <i class="ri-spam-2-fill mr-2 fs-3"></i>
    <p class="mb-0"><strong><span>{!! $message !!}</span></strong></p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-dismissible fade show d-flex align-items-center mb-2 py-1 px-2" role="alert">
    <i class="ri-information-fill mr-2 fs-3"></i>
    <p class="mb-0"><strong><span>{!! $message !!}</span></strong></p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show mb-2 py-1 px-2" role="alert">
    <div class="d-flex align-items-center">
        <i class="ri-spam-3-fill mr-2 fs-3"></i>
        <strong><span>Vérifiez les erreurs suivantes:</span></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @isset($errors)
    <p>
        <ul>
            @foreach ($errors->all() as $error)
                <li><strong><span>{!! $error !!}</span></strong></li>
            @endforeach
        </ul>
    </p>
    @endisset
</div>
@endif
