@extends('frontend.layouts.master')

@section('title', 'Event List')

@section('content')
<div class="container">

    <div class="row g-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0">Add Event</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('frontend.events.store') }}" method="POST">
                        @csrf
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="name" class="form-label">
                                    Name
                                    <span class="required-icon">*</span>
                                </label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter event's name" required>
                            </div>

                            <div class="col-md-6">
                                <label for="date" class="form-label">
                                    Date
                                    <span class="required-icon">*</span>
                                </label>
                                <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}"
                                    placeholder="Enter event's date" required>
                            </div>

                            <div class="col-md-12">
                                <label for="type" class="form-label">
                                    Type
                                    <span class="required-icon">*</span>
                                </label>
                                <select class="form-select form-control-sm" name="type" id="type">
                                    <option value="">Select Type</option>
                                    <option value="conference">Conference</option>
                                    <option value="workshop">Workshop</option>
                                    <option value="seminar">Seminar</option>
                                    <option value="wedding">Wedding</option>
                                    <option value="birthday">Birthday</option>
                                    <option value="concert">Concert</option>
                                    <option value="festival">Festival</option>
                                    <option value="meeting">Meeting</option>
                                    <option value="party">Party</option>
                                    <option value="webinar">Webinar</option>
                                    <option value="exhibition">Exhibition</option>
                                    <option value="fundraiser">Fundraiser</option>
                                    <option value="sports_event">Sports Event</option>
                                    <option value="training">Training</option>
                                    <option value="networking">Networking</option>
                                </select>
                            </div>


                            <div class="col-md-12">
                                <label for="description" class="form-label">
                                    Description
                                    <span class="required-icon">*</span>
                                </label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter event's description">{{ old('description') }}</textarea>
                            </div>


                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                    <span class="pe-1"><i class="fa-regular fa-floppy-disk"></i></span>
                                    Save
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

        <div class="col-md-12">
            <h5 class="mb-3">
                @if(request('type'))
                    Event List For : {{ ucwords(str_replace('_', '', request('type'))) }}
                @endif
            </h5>
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0">Event List</h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered m-0">
                        <thead>
                            <tr>
                                <th class="text-center">Serial</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($events as $key => $event)
                            <tr>
                                <td class="text-center">{{ $events->firstitem() + $key }}</td>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->date }}</td>
                                <td>{{ ucwords(str_replace('_', '', $event->type)) }}</td>
                                <td>{{ Str::limit($event->description, 25, '...') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('frontend.events.show', ['id' => $event->id]) }}" class="btn btn-secondary btn-sm">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>

                                    <a href="{{ route('frontend.events.edit', ['id' => $event->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>

                                    <a href="{{ route('frontend.events.delete', ['id' => $event->id]) }}" class="btn btn-danger btn-sm">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">No events found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center py-2">
                        {!! $events->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
