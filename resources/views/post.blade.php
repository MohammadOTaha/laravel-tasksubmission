@extends('master')

@section('title') POST @endsection

<br>
@section('content')
{{--    @foreach($posts as $post)--}}
{{--        <h2>{{$post->user->name}}</h2>--}}
{{--        <h3>{{$post->description}}</h3>--}}
{{--        <p>{{$post->created_at}}</p>--}}
{{--    @endforeach--}}

<form class="form-control" action="{{route('posts.create')}}" method="post">
    @csrf
    <textarea class="form-control" name="description"></textarea>
    <button class="form-control" type="submit">Post!</button>
</form>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="post-content">
                    <div class="post-container">
                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="user" class="profile-photo-md pull-left">
                        <div class="post-detail">
                            <div class="user-info">
                                <h5><a href="timeline.html" class="profile-link">{{$post->user->name}}</a> <span class="following">following</span></h5>
                                <p class="text-muted">Published post about {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
                            </div>
                            <div class="reaction">
                                <a class="btn text-green"><i class="fa fa-thumbs-up"></i> 13</a>
                                <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                            </div>
                            <div class="line-divider"></div>
                            <div class="post-text">
                                <p>
                                    {{$post->description}}
                                    <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                            </div>
                            <div class="line-divider"></div>
                            {{--                        <div class="post-comment">--}}
                            {{--                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" class="profile-photo-sm">--}}
                            {{--                            <p><a href="timeline.html" class="profile-link">Diana </a><i class="em em-laughing"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>--}}
                            {{--                        </div>--}}
                            {{--                        <div class="post-comment">--}}
                            {{--                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="profile-photo-sm">--}}
                            {{--                            <p><a href="timeline.html" class="profile-link">John</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>--}}
                            {{--                        </div>--}}
                            {{--                        <div class="post-comment">--}}
                            {{--                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="profile-photo-sm">--}}
                            {{--                            <input type="text" class="form-control" placeholder="Post a comment">--}}
                            {{--                        </div>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
