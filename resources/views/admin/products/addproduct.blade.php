@extends('admin.master.master')
@section('title', 'Add Product')
@section('content')
<!--main-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ __('Add Product')}}</div>
                <div class="panel-body">
                    <div class="row" style="margin-bottom:40px">

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>{{ __('Category') }}</label>
                                <select name="category" class="form-control">
                                    <option value='1' selected>{{ __('Man') }}</option>
                                    <option value='3'>---| {{ __('Man Jacket') }}</option>
                                    <option value='2'> {{ __('Women') }}</option>
                                    <option value='4'>---| {{ __('Women Jacket') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Code') }}</label>
                            <input type="text" name="code" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{{ __('Price') }}</label>
                            <input type="number" name="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{{ __('Is Featured ?') }}</label>
                            <select name="featured" class="form-control">
                                <option value="0">{{ __('No') }}</option>
                                <option value="1">{{ __('Yes') }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Status') }}</label>
                            <select name="state" class="form-control">
                                <option value="1">{{ __('Stocking') }}</option>
                                <option value="0">{{ __('Out of stock') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('Image') }}</label>
                            <input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
                            <img id="avatar" class="thumbnail" width="100%" height="350px" src="img/import-img.png">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{ __('Description') }}</label>
                            <textarea id="editor" name="description"></textarea>
                        </div>
                        <button class="btn btn-success" name="add-product" type="submit">{{ __('Add Product') }}</button>
                        <button class="btn btn-danger" type="reset">{{ __('Cancel') }}</button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@endsection
