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
