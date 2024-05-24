<div class="tab-pane fade" id="v-pills-settings2" role="tabpanel" aria-labelledby="v-pills-settings-tab2">

    <form action="{{ route('admin.payment_settings.razorpay.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Razorpay Status</label>
                    <select name="razorpay_status" class="form-control select">
                        <option value="1" @selected(@$paymentSettings['razorpay_status'] == 1)>Active
                        </option>
                        <option value="0" @selected(@$paymentSettings['razorpay_status'] == 0)>Inactive
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
                    <label>Razorpay Currency Name</label>
                    <select name="razorpay_currency_name" class="form-control select">
                        <option>Razorpay Currency Name</option>
                        @foreach (config('currencys.currency_list') as $currency)
                            <option value="{{ $currency }}" @selected(@$paymentSettings['razorpay_currency_name'] == $currency)>{{ $currency }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>



            <div class="col-lg-6">
                <div class="form-group mb-3">
                    <label>Razorpay Country Name</label>
                    <select name="razorpay_country_name" class="form-control select">
                        <option>Razorpay Country Name</option>
                        @foreach (config('countries') as $key => $country)
                            <option value="{{ $key }}" @selected(@$paymentSettings['razorpay_country_name'] == $key)>{{ $country }}
                            </option>
                        @endforeach
                    </select>

                </div>
            </div>


            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Razorpay Currency Rate
                        ({{ config('settings.default_currency') }})</label>

                    <input type="text" name="razorpay_currency_rate" class="form-control"
                        value="{{ @$paymentSettings['razorpay_currency_rate'] }}">

                </div>
            </div>



            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Razorpay Api Key</label>

                    <input type="text" name="razorpay_api_key" class="form-control"
                        value="{{ @$paymentSettings['razorpay_api_key'] }}">

                </div>
            </div>



            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Razorpay Secret Key</label>
                    <input type="text" name="razorpay_secret_key" class="form-control"
                        value="{{ @$paymentSettings['razorpay_secret_key'] }}">

                </div>
            </div>


            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Razorpay Logo</label>
                    <input type="file" name="razorpay_logo" class="form-control"
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
