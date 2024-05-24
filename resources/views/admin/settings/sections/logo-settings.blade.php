<div class="tab-pane fade" id="v-pills-profile4" role="tabpanel" aria-labelledby="v-pills-profile-tab4">

    <form action="{{ route('admin.settings.logo.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group  my-3">
                    <label>Header Logo</label>
                    <input type="file" name="header_logo"
                        class="form-control @error('header_logo')
                        is-invalid
                    @enderror"
                        onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    <div class="my-2">
                        <img src="{{ asset('/uploads/settings') }}/{{ config('settings.header_logo') }}" id="blah"
                            src="" width="50">
                    </div>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="form-group  my-3">
                    <label>Footer Logo</label>
                    <input type="file" name="footer_logo"
                        class="form-control @error('footer_logo')
                        is-invalid
                    @enderror"
                        onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">

                    <div class="my-2">
                        <img src="{{ asset('/uploads/settings') }}/{{ config('settings.footer_logo') }}" id="blah2"
                            src="" width="50">
                    </div>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="form-group  my-3">
                    <label>Favicon Logo</label>
                    <input type="file" name="favicon_logo"
                        class="form-control @error('favicon_logo')
                        is-invalid
                    @enderror"
                        onchange="document.getElementById('blah3').src = window.URL.createObjectURL(this.files[0])">

                    <div class="my-2">
                        <img src="{{ asset('/uploads/settings') }}/{{ config('settings.favicon_logo') }}" id="blah3"
                            src="" width="50">
                    </div>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="form-group  my-3">
                    <label>Breadcumb Logo</label>
                    <input type="file" name="breadcumb_logo"
                        class="form-control @error('breadcumb_logo')
                        is-invalid
                    @enderror"
                        onchange="document.getElementById('blah4').src = window.URL.createObjectURL(this.files[0])">
                    <div class="my-2">
                        <img src="{{ asset('/uploads/settings') }}/{{ config('settings.breadcumb_logo') }}"
                            id="blah4" src="" width="50">
                    </div>
                </div>
            </div>



            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>


        </div>

    </form>


</div>
