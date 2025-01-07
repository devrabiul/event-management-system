@extends('frontend.layouts.master')

@section('content')
<div class="container">

    <div class="d-flex justify-content-center">
        <img src="{{ getDynamicAsset('assets/img/business-people-discuss.jpg') }}" alt="boy-reading" class="w-100" />
    </div>

    <div class="row">
        <div class="col-md-6">
            <h3 class="mb-4">Event: {{ $event->name }}</h3>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('frontend.events.index') }}" class="btn btn-sm btn-secondary">
                    <span class="pe-1"><i class="fa-solid fa-caret-left"></i></span>
                    Back to Events
                </a>
                <a href="{{ route('frontend.events.edit', ['id' => $event->id]) }}" class="btn btn-sm btn-warning">
                    <span class="pe-1"><i class="fa-regular fa-pen-to-square"></i></span>
                    Edit Event
                </a>
                <a href="{{ route('frontend.events.delete', ['id' => $event->id]) }}" class="btn btn-sm btn-danger">
                    <span class="pe-1"><i class="fa-regular fa-trash-can"></i></span>
                    Delete Event
                </a>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <h5>Date:</h5>
        <p>{{ $event->date }}</p>
    </div>

    <div class="mb-3">
        <h5>Description:</h5>
        <p>{{ $event->description ?: 'No description provided.' }}</p>
    </div>


</div>
@endsection
