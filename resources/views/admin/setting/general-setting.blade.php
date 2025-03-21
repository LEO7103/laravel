<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('admin.general-setting-upadte') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Site Name</label>
                    <input type="text" class="form-control" name="site_name" value="{{@$generalSetting->site_name}}">
                </div>

                <div class="form-group">
                    <label>Layout</label>
                    <select name="layout" id="" class="form-control">
                        <option {{@$generalSetting->layout == 'LTR' ? 'selected':'' }} value="LTR">LTR</option>
                        <option {{@$generalSetting->layout == 'RTL' ? 'selected':'' }}value="RTL">RTL</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Contact Email</label>
                    <input type="text" class="form-control" name="contact_email" value="{{@$generalSetting->contact_email}}">
                </div>

                <div class="form-group">
                    <label> Default Current Name</label>
                    <select name="currency_name" id="" class="form-control select2">
                        <option value="">Select</option>
                        @foreach (config('setting.currency_list') as $currency)
                            <option  {{@$generalSetting->currency_name == $currency ? 'selected':'' }} value="{{ $currency }}">{{ $currency }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label>Current Icon</label>
                    <input type="text" class="form-control" name="currency_icon" value="{{@$generalSetting->currency_icon}}">
                </div>


                <div class="form-group">
                    <label>Time Zone</label>
                    <select name="time_zone" id="" class="form-control select2">
                        <option value="">Select</option>
                        @foreach (config('setting.time_zone') as $key => $timezone)
                            <option  {{@$generalSetting->time_zone ==  $key ? 'selected':'' }} value="{{ $key }}">{{ $key }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
