@extends('admin.master')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Update Privacy</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('dashboard.privacies.update',$privacy)}}" method="POST">
                                @csrf
                                @method("PUT")
                                <div class="form-group mb-1">
                                    <label>Textarea</label>
                                    <textarea name="content" class="form-control editor" cols="30" rows="10">{{ $privacy->content }}</textarea>
                                    @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
