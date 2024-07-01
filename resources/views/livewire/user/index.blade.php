<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="card">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-auto ms-auto">
                    @isset($addRoute['link'])
                        {{-- @dd($addRoute['link']) --}}
                        <div class="list-grid-nav hstack gap-1">
                            <a href="{{ route($addRoute['link']) }}" title="Ajouter un nouveau compte d'accès"
                                class="btn btn-success addMembers-modal">
                                <i class="ri-add-box-line me-1 align-bottom"></i> {{ $addRoute['name'] }}
                            </a>
                        </div>
                    @endisset
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @livewire('user.user-table', ['viewRoute' => $viewRoute])
                </div>
            </div>
        </div>
    </div>
</div>
