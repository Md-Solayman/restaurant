@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">Menu Builder</h3>
                    </div>
                    <div class="card-body">
                        {!! Menu::render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {!! Menu::scripts() !!}
@endpush
