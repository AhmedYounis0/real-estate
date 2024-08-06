@extends('admin.master')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Subscribers</h1>
            <div class="ml-auto">
                <a href="{{ route('dashboard.subscribers.create') }}" class="btn btn-primary"> Send E-mail to all subscribers</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Emails</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if ($subscribers->count())
                                        @foreach ($subscribers as $subscribe)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $subscribe->email }}</td>
                                        </tr>
                                        @endforeach
                                    @endif
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
