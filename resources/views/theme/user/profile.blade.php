@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            @include('theme.partials.user-dashboard-sidebar')
            <div class="col-lg-9 col-md-12">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="">Name *</label>
                            <div class="form-group">
                                <input type="text" name="" class="form-control" value="Robert Johnson">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email *</label>
                            <div class="form-group">
                                <input type="text" name="" class="form-control" value="peter@gmail.com">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
