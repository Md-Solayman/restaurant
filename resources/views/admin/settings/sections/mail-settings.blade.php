<div class="tab-pane fade" id="v-pills-profile3" role="tabpanel" aria-labelledby="v-pills-profile-tab3">

    <form action="{{ route('admin.settings.mail.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group mb-3">
                    <label>Mail Driver</label>
                    <input type="text" name="mail_driver" class="form-control"
                        value="{{ config('settings.mail_driver') }}" placeholder="Mail Driver">

                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group mb-3">
                    <label>Mail Host</label>
                    <input type="text" name="mail_host" class="form-control"
                        value="{{ config('settings.mail_host') }}" placeholder="Mail Host">

                </div>
            </div>


            <div class="col-lg-4">
                <div class="form-group mb-3">
                    <label>Mail Port</label>
                    <input type="text" name="mail_port" class="form-control"
                        value="{{ config('settings.mail_port') }}" placeholder="Mail Port">

                </div>
            </div>


            <div class="col-lg-6">
                <div class="form-group mb-3">
                    <label>Mail Username</label>
                    <input type="text" name="mail_username" class="form-control"
                        value="{{ config('settings.mail_username') }}" placeholder="Mail Username">

                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-3">
                    <label>Mail Password</label>
                    <input type="text" name="mail_password" class="form-control"
                        value="{{ config('settings.mail_password') }}" placeholder="Mail Password">

                </div>
            </div>


            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Mail Encryption</label>
                    <input type="text" name="mail_encryption" class="form-control"
                        value="{{ config('settings.mail_encryption') }}" placeholder="Mail Encryption">

                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Mail From Address</label>
                    <input type="text" name="mail_from_address" class="form-control"
                        value="{{ config('settings.mail_from_address') }}" placeholder="Mail From Address">

                </div>
            </div>


            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Mail Receive Address</label>
                    <input type="text" name="mail_receive_address" class="form-control"
                        value="{{ config('settings.mail_receive_address') }}" placeholder="Mail Receive Address">

                </div>
            </div>




            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>


        </div>

    </form>


</div>
