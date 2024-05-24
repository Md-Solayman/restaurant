@extends('admin.admin')


@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Payment Settings</h3>
            </div>
            <div class="card-body">

                <div class="tab-content">
                    <div class="tab-pane show active" id="vertical-right-tabs-preview">
                        <div class="row">

                            <div class="col-lg-3 mt-2 mt-sm-0">
                                <div class="nav flex-column nav-pills" id="v-pills-tab2" role="tablist"
                                    aria-orientation="vertical">

                                    <a class="nav-link show active" id="v-pills-home-tab2" data-bs-toggle="pill"
                                        href="#v-pills-home2" role="tab" aria-controls="v-pills-home2"
                                        aria-selected="true">
                                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Paypal</span>
                                    </a>

                                    <a class="nav-link" id="v-pills-profile-tab2" data-bs-toggle="pill"
                                        href="#v-pills-profile2" role="tab" aria-controls="v-pills-profile2"
                                        aria-selected="false">
                                        <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Stripe</span>
                                    </a>

                                    <a class="nav-link" id="v-pills-settings-tab2" data-bs-toggle="pill"
                                        href="#v-pills-settings2" role="tab" aria-controls="v-pills-settings2"
                                        aria-selected="false">
                                        <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Razorpay</span>
                                    </a>
                                </div>
                            </div>



                            <div class="col-lg-9">
                                <div class="tab-content" id="v-pills-tabContent-right">
                                    {{-- paypal --}}
                                    @include('admin.payment_settings.sections.paypal')

                                    {{-- stripe --}}
                                    @include('admin.payment_settings.sections.stripe')



                                    @include('admin.payment_settings.sections.razorpay')
                                </div> <!-- end tabcontent-->
                            </div> <!-- end col-->


                        </div> <!-- end row-->
                    </div> <!-- end preview-->


                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>
@endpush
