@extends('layouts.app')


@section('title','Edit Registration')

@section('content')


<!-- editModal.blade.php -->
<div class="container">

    <form method="POST" action="{{ route('updateRegistration', ['id' => $registration->registration_id]) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $registration->attendee->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $registration->attendee->email }}"
                required>
        </div>
        <div class="form-group">
            <label for="event_title">Event Title</label>
            <select class="form-control" name="event_title" id="event_title" required>
                @foreach ($events as $event)
                <option value="{{ $event->title }}">{{ $event->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
<style>
htnl,


.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button[type="submit"] {
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}
</style>

@endsection