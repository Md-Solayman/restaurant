@extends('frontend.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
