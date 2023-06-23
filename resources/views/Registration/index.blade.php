@extends('layouts.app')


@section('title', 'Attendee')


@section('content')
<!-- start: Model create -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Attendee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('saveRegistration') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group md-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="form-group md-6">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group md-6">
                        <label for="event_title">Event Title</label>
                        <select class="form-control" name="event_title" id="event_title" required>
                            @foreach ($events as $event)
                            <option value="{{ $event->title }}">{{ $event->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end: Model create -->

<div class="container py-3">
    <div class="col-md-12">
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>

        @endif
        <div class="card">
            <div class="card-header">
                <h4>Registrations
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">New Registration</button>
                </h4>

            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope='col'>Registration ID</th>
                            <th scope='col'>Name</th>
                            <th scope='col'>Email</th>
                            <th scope='col'>Event Title</th>
                            <th scope='col'>Event Date</th>
                            <th scope='col'>Event Location</th>
                            <th scope='col'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $registration)
                        <tr>
                            <td scope='row'>{{ $registration ->registration_id }}</td>
                            <td>{{ $registration->attendee->name }}</td>
                            <td>{{ $registration->attendee->email }}</td>
                            <td>{{ $registration->event->title }}</td>
                            <td>{{ $registration->event->date }}</td>
                            <td>{{ $registration->event->location }}</td>
                            <td>
                                <!-- delete -->
                                <form action="{{ route('deleteRegistration', $registration->registration_id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này?')">Delete</button>
                                </form>
                                <!-- delete -->

                            </td>
                            <td>
                                <a href=" {{ route('editRegistration',$registration->registration_id) }} "
                                    class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection