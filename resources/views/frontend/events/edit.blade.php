@extends('frontend.layouts.master')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0">Edit Event</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('frontend.events.update') }}" method="POST">
                    @csrf
                    <div class="row g-2">
                        <div class="col-md-6">
                            <label for="name" class="form-label">
                                Name
                                <span class="required-icon">*</span>
                            </label>
                            <input type="hidden" name="id" value="{{ $event->id }}" required>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $event->name) }}"
                                placeholder="Enter event's name" required>
                        </div>

                        <div class="col-md-6">
                            <label for="date" class="form-label">
                                Date
                                <span class="required-icon">*</span>
                            </label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $event->date) }}"
                                placeholder="Enter event's date" required>
                        </div>

                        <div class="col-md-12">
                            <label for="type" class="form-label">
                                Type
                                <span class="required-icon">*</span>
                            </label>
                            <select class="form-select form-control-sm" name="type" id="type">
                                <option value="">Select Type</option>
                                <option value="conference" {{ $event->type == 'conference' ? 'selected' : '' }}>Conference</option>
                                <option value="workshop" {{ $event->type == 'workshop' ? 'selected' : '' }}>Workshop</option>
                                <option value="seminar" {{ $event->type == 'seminar' ? 'selected' : '' }}>Seminar</option>
                                <option value="wedding" {{ $event->type == 'wedding' ? 'selected' : '' }}>Wedding</option>
                                <option value="birthday" {{ $event->type == 'birthday' ? 'selected' : '' }}>Birthday</option>
                                <option value="concert" {{ $event->type == 'concert' ? 'selected' : '' }}>Concert</option>
                                <option value="festival" {{ $event->type == 'festival' ? 'selected' : '' }}>Festival</option>
                                <option value="meeting" {{ $event->type == 'meeting' ? 'selected' : '' }}>Meeting</option>
                                <option value="party" {{ $event->type == 'party' ? 'selected' : '' }}>Party</option>
                                <option value="webinar" {{ $event->type == 'webinar' ? 'selected' : '' }}>Webinar</option>
                                <option value="exhibition" {{ $event->type == 'exhibition' ? 'selected' : '' }}>Exhibition</option>
                                <option value="fundraiser" {{ $event->type == 'fundraiser' ? 'selected' : '' }}>Fundraiser</option>
                                <option value="sports_event" {{ $event->type == 'sports_event' ? 'selected' : '' }}>Sports Event</option>
                                <option value="training" {{ $event->type == 'training' ? 'selected' : '' }}>Training</option>
                                <option value="networking" {{ $event->type == 'networking' ? 'selected' : '' }}>Networking</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label">
                                Description
                                <span class="required-icon">*</span>
                            </label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter event's description">{{ old('description', $event->description) }}</textarea>
                        </div>


                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                <span class="pe-1"><i class="fa-regular fa-floppy-disk"></i></span>
                                Update
                            </button>
                            <button type="reset" class="btn btn-sm btn-outline-danger">
                                <span class="pe-1"><i class="fa-solid fa-rotate-left"></i></span>
                                Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
