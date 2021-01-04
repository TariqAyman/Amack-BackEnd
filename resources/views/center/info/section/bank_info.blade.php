<div id="bank_info" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bank Info</h5>
        <small>Enter Your Bank info.</small>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label class="form-label" for="modern-twitter">Account Name</label>
            <input type="text" id="modern-twitter" class="form-control" name="account_name" placeholder="Account Name" value="{{ $info->account_name ?: old('account_name') }}"/>
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="modern-facebook">Account Number</label>
            <input type="text" id="modern-facebook" class="form-control" name="account_number" placeholder="Account Number" value="{{ $info->account_number ?: old('account_number') }}"/>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label class="form-label" for="modern-google">Bank Name</label>
            <input type="text" id="modern-google" class="form-control" name="bank_name" placeholder="Bank Name" value="{{ $info->bank_name ?: old('bank_name') }}"/>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <a class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
        </a>
        <button class="btn btn-success" type="submit" value="Submit">Save</button>
    </div>
</div>
