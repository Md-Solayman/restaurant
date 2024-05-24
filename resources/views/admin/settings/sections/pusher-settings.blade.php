<div class="tab-pane fade" id="v-pills-profile2" role="tabpanel" aria-labelledby="v-pills-profile-tab2">

    <form action="{{ route('admin.settings.pusher.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Pusher App Id</label>
                    <input type="text" name="pusher_app_id" class="form-control"
                        value="{{ config('settings.pusher_app_id') }}" placeholder="Pusher App Id">

                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Pusher Key</label>
                    <input type="text" name="pusher_key" class="form-control"
                        value="{{ config('settings.pusher_key') }}" placeholder="Pusher Key">

                </div>
            </div>


            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Pusher Secret</label>
                    <input type="text" name="pusher_secret" class="form-control"
                        value="{{ config('settings.pusher_secret') }}" placeholder="Pusher Secret">

                </div>
            </div>


            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Pusher cluster</label>
                    <input type="text" name="pusher_cluster" class="form-control"
                        value="{{ config('settings.pusher_cluster') }}" placeholder="Pusher Cluster">

                </div>
            </div>




            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>


        </div>

    </form>


</div>
