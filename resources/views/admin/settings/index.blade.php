@extends('admin.admin')


@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Settings</h3>
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
                                        <span class="d-none d-md-block">Site Settings</span>
                                    </a>


                                    <a class="nav-link" id="v-pills-profile-tab4" data-bs-toggle="pill"
                                        href="#v-pills-profile4" role="tab" aria-controls="v-pills-profile4"
                                        aria-selected="false">
                                        <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Logo Settings</span>
                                    </a>


                                    <a class="nav-link" id="v-pills-profile-tab5" data-bs-toggle="pill"
                                        href="#v-pills-profile5" role="tab" aria-controls="v-pills-profile5"
                                        aria-selected="false">
                                        <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Other Settings</span>
                                    </a>


                                    <a class="nav-link" id="v-pills-profile-tab2" data-bs-toggle="pill"
                                        href="#v-pills-profile2" role="tab" aria-controls="v-pills-profile2"
                                        aria-selected="false">
                                        <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Pusher Settings</span>
                                    </a>


                                    <a class="nav-link" id="v-pills-profile-tab3" data-bs-toggle="pill"
                                        href="#v-pills-profile3" role="tab" aria-controls="v-pills-profile3"
                                        aria-selected="false">
                                        <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Mail Settings</span>
                                    </a>


                                </div>
                            </div>



                            <div class="col-lg-9">
                                <div class="tab-content" id="v-pills-tabContent-right">

                                    @include('admin.settings.sections.general-settings')


                                    @include('admin.settings.sections.logo-settings')


                                    @include('admin.settings.sections.other-settings')


                                    @include('admin.settings.sections.pusher-settings')


                                    @include('admin.settings.sections.mail-settings')

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
