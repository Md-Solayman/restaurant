<div class="tab-pane fade" id="v-pills-profile2" role="tabpanel" aria-labelledby="v-pills-profile-tab2">

    <form action="{{ route('admin.payment_settings.stripe.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Stripe Status</label>
                    <select name="stripe_status" class="form-control select">
                        <option value="1" @selected(@$paymentSettings['stripe_status'] == 1)>Active
                        </option>
                        <option value="0" @selected(@$paymentSettings['stripe_status'] == 0)>Inactive
                        </option>
                    </select>

                </div>
            </div>

            {{--
            <div class="col-lg-6">
                <div class="form-group mb-3">
                    <label>Stripe Account Mode</label>
                    <select name="stripe_account_mode" class="form-control select">
                        <option value="sandbox" @selected(@$paymentSettings['stripe_account_mode'] === 'sandbox')>sandbox
                        </option>
                        <option value="live" @selected(@$paymentSettings['stripe_account_mode'] === 'live')>live
                        </option>
                    </select>

                </div>
            </div> --}}


            <div class="col-lg-6">
                <div class="form-group mb-3">
                    <label>Stripe Currency Name</label>
                    <select name="stripe_currency_name" class="form-control select">
                        <option>Stripe Currency Name</option>
                        @foreach (config('currencys.currency_list') as $currency)
                            <option value="{{ $currency }}" @selected(@$paymentSettings['stripe_currency_name'] == $currency)>{{ $currency }}
                            </option>
                        @endforeach
                    </select>

                </div>
            </div>


            <div class="col-lg-6">
                <div class="form-group mb-3">
                    <label>Stripe Country Name</label>
                    <select name="stripe_country_name" class="form-control select">
                        <option>Stripe Country Name</option>
                        @foreach (config('countries') as $key => $country)
                            <option value="{{ $key }}" @selected(@$paymentSettings['stripe_country_name'] == $key)>{{ $country }}
                            </option>
                        @endforeach
                    </select>

                </div>
            </div>


            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Stripe Currency Rate
                        ({{ config('settings.default_currency') }})</label>

                    <input type="text" name="stripe_currency_rate" class="form-control"
                        value="{{ @$paymentSettings['stripe_currency_rate'] }}">

                </div>
            </div>



            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Stripe Api Key</label>

                    <input type="text" name="stripe_api_key" class="form-control"
                        value="{{ @$paymentSettings['stripe_api_key'] }}">

                </div>
            </div>


            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Stripe Secret Key</label>

                    <input type="text" name="stripe_secret_key" class="form-control"
                        value="{{ @$paymentSettings['stripe_secret_key'] }}">

                </div>
            </div>


            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Stripe Logo</label>
                    <input type="file" name="stripe_logo" class="form-control"
                        onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    <div class="my-2">
                        <img id="blah" width="100" />

                    </div>
                </div>
            </div>




            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>


        </div>

    </form>


</div>
