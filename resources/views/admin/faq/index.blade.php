@extends('admin.master')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>FAQ</h1>
            <div class="ml-auto">
                <a href="{{ route('dashboard.faqs.create') }}" class="btn btn-primary"> Create</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if ($faqs->count())
                                        @foreach ($faqs as $faq)
                                        <tr>
                                            <td><?= $faq['id'] ?></td>
                                            <td><?= $faq['question'] ?></td>
                                            <td><?= substr($faq['answer'],0,50) ?></td>
                                            <td class="pt_10 pb_10">
                                                <a href="{{ route('dashboard.faqs.edit',$faq) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('dashboard.faqs.destroy', $faq) }}" class="d-inline" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger rounded font-sm">Delete</button>
                                                </form>
                                            </td>
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
