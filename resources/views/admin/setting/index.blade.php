@extends('admin.master')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Settings</h1>
            <div class="ml-auto">
                <a href="{{ route('dashboard.settings.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if (@session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                    <tr>
                                        <th>Key</th>
                                        <th>Value</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($settings as $setting)
                                        <tr>
                                            <td>{{ $setting->key}}</td>
                                            <td>{!! $setting->value !!}</td>
                                            <td>
                                                @if($setting->image)
                                                <img src="/storage/settings/{{ $setting->image}}" style="height: 150px; width:150px;">
                                                @endif
                                            </td>
                                            <td class="pt_10 pb_10">
                                                <a href="{{ route('dashboard.settings.edit',$setting) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('dashboard.settings.destroy',$setting) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="alert text-center" colspan="5">There is nothing to view</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
