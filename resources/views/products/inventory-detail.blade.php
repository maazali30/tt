@extends('layouts.app')

@section('content')
<div class="container inventory-detail-page" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header"><h4>Inventory Detail</h4></div>
            <div class="card-body">
                <div class="section">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Product Name:</label>
                        <div class="col-sm-9">
                            <div class="detail"><label class="col-form-label">AC Repair</label></div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Product Description:</label>
                        <div class="col-sm-9">
                            <div class="detail"><label class="col-form-label">Lorem Ipsum is simply dummy text of the printing and type setting industry.</label></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Product Domain:</label>
                        <div class="col-sm-9">
                            <div class="detail"><label class="col-form-label">testing</label></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Product Location:</label>
                        <div class="col-sm-9">
                            <div class="detail"><label class="col-form-label">Lorem Ipsum is simply dummy text </label></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Product Image:</label>
                        <div class="col-sm-9">
                            <div class="detail"><label class="col-form-label"><img src="images/product/ipad.png"></label></div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="section">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Repair Date:</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label col-form-label text-bold">Start Date</label>
                                    <div>2020-08-30 11:42:21</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-form-label text-bold">End Date</label>
                                    <div>2020-08-30 12:15:10</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Employee Name:</label>
                        <div class="col-sm-9">
                            <div class="detail"><label class="col-form-label">Kashif</label></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Repair Details:</label>
                        <div class="col-sm-9">
                            <div class="detail"><label class="col-form-label">Lorem Ipsum is simply dummy text of the printing and type setting industry.</label></div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
