<div class="container-fluid bg-body-tertiary">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('frontend.index') }}">
                    <img src="{{ getDynamicAsset('assets/img/logo.png') }}" height="40" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-0 ms-auto mb-2 mb-lg-0 gap-4">

                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('frontend.index') }}">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('events*') ? 'active' : '' }}" href="{{ route('frontend.events.index') }}">
                                Event List
                            </a>
                        </li>

                        @if(count(getEventTypes()) > 0)
                            <li class="nav-item">
                                <div class="dropdown">
                                    <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Event Types
                                    </div>
                                    <ul class="dropdown-menu">
                                        @foreach(getEventTypes() as $type)
                                            <li>
                                                <a class="dropdown-item" href="{{ route('frontend.events.index', ['type' => $type]) }}">
                                                    {{ ucwords($type) }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
