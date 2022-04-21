@extends('admin.master.master')
@section('title', 'Edit Product')
@section('content')
<!--main-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <!--/.row-->
    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ __('Edit Product') }}</div>
                <div class="panel-body">
                    <div class="row" style="margin-bottom:40px">

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>{{ __('Category') }}</label>
                                <select name="category" class="form-control">
                                    <option value='1' selected>{{ __('Man') }}</option>
                                    <option value='3'>---| Man Jacket</option>
                                    <option value='2'>Women</option>
                                    <option value='4'>---| Women Jacket</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Code') }}</label>
                                <input type="text" name="code" class="form-control" value="SP01">
                            </div>
                            <div class="form-group">
                                <label>{{ __('Name') }}</label>
                                <input type="text" name="name" class="form-control" value="Sản phẩm 1">
                            </div>
                            <div class="form-group">
                                <label>{{ __('Price') }}</label>
                                <input type="number" name="price" class="form-control" value="150000">
                            </div>
                            <div class="form-group">
                                <label>{{ __('Is Featured ?') }}</label>
                                <select name="featured" class="form-control">
                                    <option value="0">{{ __('Yes') }}</option>
                                    <option selected value="1">{{ __('No') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Status') }}</label>
                                <select name="state" class="form-control">
                                    <option value="1">{{ __('Stocking') }}</option>
                                    <option selected value="0">{{ __('Out of stock') }}</option>
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
                            <button class="btn btn-success" name="add-product" type="submit">{{ __('Edit Product') }}</button>
                            <button class="btn btn-danger" type="reset">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
@endsection
