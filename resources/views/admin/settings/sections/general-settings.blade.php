<div class="tab-pane fade active show" id="v-pills-home2" role="tabpanel" aria-labelledby="v-pills-home-tab2">

    <form action="{{ route('admin.settings.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Site Name</label>
                    <input type="text" name="site_name" class="form-control"
                        value="{{ config('settings.site_name') }}" placeholder="Site Name">

                </div>
            </div>


            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label>Default Currency</label>
                    <select name="default_currency" class="form-control select">
                        <option>Default Currency</option>
                        @foreach (config('currencys.currency_list') as $currency)
                            <option value="{{ $currency }}" @selected(config('settings.default_currency') == $currency)>{{ $currency }}
                            </option>
                        @endforeach
                    </select>

                </div>
            </div>


            <div class="col-lg-6">
                <div class="form-group mb-3">
                    <label>Currency Icons</label>
                    <input type="text" name="currency_icons" class="form-control"
                        value="{{ config('settings.currency_icons') }}" placeholder="Currency Icons">

                </div>
            </div>


            <div class="col-lg-6">
                <div class="form-group mb-3">
                    <label>Currency Position</label>
                    <select name="currency_position" class="form-control">
                        <option value="Left" @selected(config('settings.currency_position') == 'Left')>
                            Left</option>
                        <option value="Right" @selected(config('settings.currency_position') == 'Right')>
                            Right</option>
                    </select>

                </div>
            </div>


            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>


        </div>

    </form>


</div>
