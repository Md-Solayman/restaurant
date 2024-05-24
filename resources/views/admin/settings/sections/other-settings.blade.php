<div class="tab-pane fade" id="v-pills-profile5" role="tabpanel" aria-labelledby="v-pills-profile-tab5">

    <form action="{{ route('admin.settings.other.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group  my-2">
                    <label>Site Color</label>
                    <input type="color" name="site_color"
                        class="form-control @error('site_color')
                        is-invalid
                    @enderror"
                        value="{{ config('settings.site_color') }}">
                </div>
            </div>


            <div class="col-lg-12">
                <div class="form-group  my-2">
                    <label>Site Seo Title</label>
                    <input type="text" name="site_seo_title"
                        class="form-control @error('site_seo_title')
                        is-invalid @enderror"
                        value="{{ config('settings.site_seo_title') }}">
                </div>
            </div>


            <div class="col-lg-12">
                <div class="form-group  my-2">
                    <label>Site Seo Description</label>
                    <textarea name="site_seo_description"
                        class="form-control @error('site_seo_description')
                        is-invalid
                    @enderror">{{ config('settings.site_seo_description') }}</textarea>
                </div>
            </div>



            <div class="col-lg-12">
                <div class="form-group  my-2">
                    <label>Site Seo Keywords</label>
                    <input type="text" name="site_seo_keywords"
                        class="form-control @error('site_seo_keywords')
                        is-invalid
                    @enderror"
                        value="{{ config('settings.site_seo_keywords') }}">
                </div>
            </div>



            <div class="mb-2">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>


        </div>

    </form>


</div>
