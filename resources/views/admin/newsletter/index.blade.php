@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <div class="row">

            <div class="col-lg-12 my-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Notify Subscribers</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.newsletter.store') }}" method="POST">
                            @csrf

                            <div class="form-group my-3">
                                <label class="my-1">Subject</label>
                                <input type="text" name="subject"
                                    class="form-control @error('subject')
                                is-invalid
                            @enderror"
                                    placeholder="Subject">
                                @error('subject')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>

                            <div class="form-group my-3">
                                <label class="my-1">Message</label>
                                <textarea name="message"
                                    class="form-control @error('message')
                                is-invalid
                            @enderror"></textarea>
                                @error('message')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>

                            <div class="my-3">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">Subscriber List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscribes as $sl => $subscribe)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $subscribe->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
