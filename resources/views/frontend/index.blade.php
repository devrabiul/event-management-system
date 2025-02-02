@extends('frontend.layouts.master')

@section('title', 'Event List')

@section('content')
<div class="container">

    <div>
        <div class="row g-2 align-items-center py-3 {{ count($courses) > 0 ? 'min-height-70vh' : 'min-height-90vh' }} flex-column-reverse flex-md-row header-section">
            <div class="col-md-12">
                <div class="header-text text-center">
                    <span class="welcome">
                        Welcome to...
                    </span>
                    <h1 class="title">
                        Event Management System
                    </h1>
                </div>
                <div class="d-flex justify-content-center">
                    <img src="{{ getDynamicAsset('assets/img/business-people-discuss.jpg') }}" alt="boy-reading" class="w-100" />
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-start g-2">
        @if (count($courses) > 0)

            <div class="col-12">
                <h3 class="text-center">Event List</h3>
                <p class="text-center">Manage and explore events effortlessly.</p>
            </div>

            @foreach($courses as $course)
                <div class="col-md-4 col-lg-3">
                    <div class="card event-card">
                        <div class="card-body">
                            <div class="card-image-box">
                                <img src="{{ getDynamicAsset('assets/img/event-management-services.png') }}" alt="boy-reading" class="w-100 h-100 object-fit-cover" />
                            </div>
                            <h6 class="card-title line-limit-1">
                                {{ $course?->name }}
                            </h6>
                            <p class="card-text line-limit-2">
                                {{ Str::limit($course->description, 20, '...') }}
                            </p>
                            <a href="{{ route('frontend.events.show', ['id' => $course->id]) }}" class="btn btn-sm btn-outline-primary">
                                <span class="pe-1"><i class="fa-solid fa-calendar-days"></i></span>
                                Check Event
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach


            <div class="d-flex justify-content-center py-4">
                {!! $courses->links() !!}
            </div>

        @endif
    </div>
</div>
@endsection
