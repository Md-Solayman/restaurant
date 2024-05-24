<div class="tab-pane fade active show" id="v-pills-home2" role="tabpanel" aria-labelledby="v-pills-home-tab2">

    <form action="{{ route('admin.payment_settings.paypal.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group mb-3">
                    <label>Paypal Status</label>
                    <select name="paypal_status" class="form-control select">
                        <option value="1" @selected(@$paymentSettings['paypal_status'] == 1)>Active
                        </option>
                        <option value="0" @selected(@$paymentSettings['paypal_status'] == 0)>Inactive
                        </option>
                    </select>

                </div>
            </div>


            <div class="col-lg-6">
                <div class="form-group mb-3">
                    <label>Paypal Account Mode</label>
                    <select name="paypal_account_mode" class="form-control select">
                        <option value="sandbox" @selected(@$paymentSettings['paypal_account_mode'] == 'sandbox')>sandbox
                        </option>
                        <option value="live" @selected(@$paymentSettings['paypal_account_mode'] == 'live')>live
                        </option>
                    </select>

                </div>
            </div>


            <div class="col-lg-6">
                <div class="form-group mb-3">
                    <label>Paypal Currency Name</label>
                    <select name="paypal_currency_name" class="form-control select">
                        <option>Paypal Currency Name</option>
                        @foreach (config('currencys.currency_list') as $currency)
                            <option value="{{ $currency }}" @selected(@$paymentSettings['paypal_currency_name'] == $currency)>{{ $currency }}
                            </option>
                        @endforeach
                    </select>

                </div>
            </div>


            <div class="col-lg-6">
                <div class="form-group mb-3">
                    <label>Paypal Country Name</label>
                    <select name="paypal_country_name" class="form-control select">
                        <option>Paypal Country Name</option>
                        @foreach (config('countries') as $key => $country)
                            <option value="{{ $key }}" @selected(@$paymentSettings['paypal_country_name'] == $key)>{{ $country }}
                            </option>
                        @endforeach
                    </select>

                </div>
            </div>


            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Paypal Currency Rate
                        ({{ config('settings.default_currency') }})</label>

                    <input type="text" name="paypal_currency_rate" class="form-control"
                        value="{{ @$paymentSettings['paypal_currency_rate'] }}">

                </div>
            </div>



            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Paypal Client Id</label>

                    <input type="text" name="paypal_api_key" class="form-control"
                        value="{{ @$paymentSettings['paypal_api_key'] }}">

                </div>
            </div>


            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Paypal Secret Key</label>

                    <input type="text" name="paypal_secret_key" class="form-control"
                        value="{{ @$paymentSettings['paypal_secret_key'] }}">

                </div>
            </div>


            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Paypal App Id</label>

                    <input type="text" name="paypal_app_id" class="form-control"
                        value="{{ @$paymentSettings['paypal_app_id'] }}">

                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Paypal Logo</label>
                    <input type="file" name="paypal_logo" class="form-control"
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
