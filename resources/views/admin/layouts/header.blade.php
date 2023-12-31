    <header class="header-main">
        <section class="sidebar-header">
            <section class="d-flex justify-content-between flex-md-row-reverse px-2">
                <span id="sidebar-toggle-show" class="d-inline d-md-none pointer"><i class="fas fa-toggle-off"></i></span>
                <span id="sidebar-toggle-hide" class="d-none d-md-inline pointer"><i class="fas fa-toggle-on"></i></span>
                <span><a href="{{ route('admin.home') }}"><img class="logo" src="{{ asset($logoURL) }}"/></a></span>
                <span class="d-md-none" id="menu-toggle"><i class="fas fa-ellipsis-h"></i></span>
            </section>
        </section>
        <section class="body-header" id="body-header">
            <section class="d-flex justify-content-between">
                <section>
                    <span class="mr-5">
                        <span id="search-area" class="search-area d-none">
                            <i id="search-area-hide" class="fas fa-times pointer"></i>
                            <input id="search-input" type="text" class="search-input">
                            <i class="fas fa-search pointer"></i>
                        </span>
                    <i id="search-toggle" class="fas fa-search p-1 d-none d-md-inline pointer"></i>
                    </span>

                    <span id="full-screen" class="pointer p-1 d-none d-md-inline mr-5">
                        <i id="screen-compress" class="fas fa-compress d-none"></i>
                        <i id="screen-expand" class="fas fa-expand "></i>
                    </span>
                </section>
                <section>
                    <span class="ml-2 ml-md-4 position-relative">
                        <span id="header-notification-toggle" class="pointer">
                            <i class="far fa-bell"></i>
                            <sup class="badge badge-danger">
                                @if ($notifications->count() !== 0)
                                    {{ $notifications->count() }}
                                    @else
                                    0
                                @endif
                            </sup>
                        </span>
                    <section id="header-notification" class="header-notifictation rounded">
                        <section class="d-flex justify-content-between">
                            <span class="px-2">
                                نوتیفیکیشن ها
                            </span>
                            <span class="px-2">
                                <span class="badge badge-primary">جدید</span>
                            </span>
                        </section>

                        <ul class="list-group rounded px-0">

                            @foreach ($notifications as $notification)
                            <li class="list-group-item list-group-item-action">
                                <section class="media">
                                    <section class="media-body pr-1">
                                        <h5 class="notification-user">{{$notification['data']['message']}}</h5>
                                    </section>
                                </section>
                            </li>
                            @endforeach

                        </ul>
                    </section>
                    </span>
                    <span class="ml-2 ml-md-4 position-relative">
                        <span id="header-comment-toggle" class="pointer">
                            <i class="far fa-comment-alt">
                            <sup class="badge badge-danger">
                                @if ($unseenComments->count() !== 0)
                                {{ $unseenComments->count() }}
                                @else
                                0
                                @endif
                            </sup></i>
                        </span>

                    <section id="header-comment" class="header-comment">

                            <section class="border-bottom px-4">
                                <input type="text" class="form-control form-control-sm my-4" placeholder="جستجو ...">
                            </section>

                        <section class="header-comment-wrapper">
                            <ul class="list-group rounded px-0">

                                @foreach ($unseenComments as $unseenComment)
                                @if ($unseenComment->commentable_type == 'App\Models\Content\Post')
                                <a href="{{ route('admin.content.comment.index') }}" class="text-black text-decoration-none">
                                    @else
                                <a href="{{ route('admin.market.comment.index') }}" class="text-black text-decoration-none">
                                @endif
                                <li class="list-group-item list-groupt-item-action">
                                    <section class="media">
                                        <img src="{{ asset($unseenComment->user->profile_photo_path) }}" alt="avatar" class="notification-img">
                                        <section class="media-body pr-1">
                                            <section class="d-flex flex-column">
                                                <span class="d-flex justify-content-between align-items-start mt-1">
                                                    <h6 class="comment-user">{{ $unseenComment->user->fullName }}</h6>
                                                    <h6 class="title-color font-size-8">
                                                        {{ jalaliDate($unseenComment->created_at) }}
                                                    </h6>
                                                </span>
                                                <span class="comment-body title-color font-size-10">
                                                    <i class="fas fa-circle text-success comment-user-status"></i>
                                                    {{ $unseenComment->body }}
                                                </span>
                                            </section>
                                        </section>
                                    </section>
                                </li>
                                </a>
                                @endforeach


                            </ul>
                        </section>

                    </section>

                    </span>
                    <span class="ml-3 ml-md-5 position-relative">
                        <span id="header-profile-toggle" class="pointer">
                            <img class="header-avatar" src="{{ asset(auth()->user()->profile_photo_path) }}" alt="">
                            <span class="header-username">{{ auth()->user()->name }}</span>
                    </span>
                    </span>
                </section>
            </section>
        </section>
    </header>
