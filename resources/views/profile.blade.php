@extends('layouts.app')


@section('content')

<div class="row py-5 px-4">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <div class="col-md-5 mx-auto">
        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 cover">
                <div class="media align-items-end profile-head">
                    <div class="profile mr-3">
                        @if(\App\Models\User::find($user_id)->image)
                            <img src="{{\Illuminate\Support\Facades\Storage::disk('local')->url(\App\Models\User::find($user_id)->image)}}" alt="user" class="profile-photo-md pull-left">
                        @else
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="user" class="profile-photo-md pull-left">
                        @endif                    </div>
                    <div class="media-body mb-5 text-black">
                        <h4 class="mt-0 mb-0">{{$name}}</h4>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3">
                <h5 class="mb-0">About</h5>
                <div class="p-4 rounded shadow-sm bg-light">
                    <p class="font-italic mb-0">{{$desc}}</p>
                </div>
            </div>
            <div class="py-4 px-4">
                <div class="row">
                    <div class="col-md-8">
                        @foreach($posts as $post)
                            @if($post->user->id != $user_id) @continue;
                            @endif
                            <div class="post-content">
                                <div class="post-container">
                                    <a href="{{$post->user->id}}">
                                        @if($post->user->image)
                                            <img src="{{\Illuminate\Support\Facades\Storage::disk('local')->url($post->user->image)}}" alt="user" class="profile-photo-md pull-left">
                                        @else
                                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="user" class="profile-photo-md pull-left">
                                        @endif
                                    </a>
                                    <div class="post-detail">
                                        <div class="user-info">
                                            <h5><a href="{{$post->user->id}}" class="profile-link">{{$post->user->name}}</a> <span
                                                    class="following">following</span></h5>
                                            <p class="text-muted">Published post
                                                about {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
                                        </div>
                                        <div class="reaction">
                                            <form class="form-inline" method="post" action="{{route('posts.like', ['post_id' => $post->id])}}">
                                                @csrf
                                                @if($post->reaction == null || $post->reaction == 1)
                                                    <a class="btn text-green" onclick="$(this).closest('form').submit()"><i class="fa fa-thumbs-up"></i> {{$post->likes_count}} </a>
                                                @else
                                                    <a class="btn text-black-50" onclick="$(this).closest('form').submit()"><i class="fa fa-thumbs-up"></i> {{$post->likes_count}} </a>
                                                @endif
                                            </form>
                                            <form class="form-inline" method="post" action="{{route('posts.dislike', ['post_id' => $post->id])}}">
                                                @csrf
                                                @if($post->reaction == null || $post->reaction == 0)
                                                    <a class="btn text-red" onclick="$(this).closest('form').submit()"><i class="fa fa-thumbs-down"></i> {{$post->dislikes_count}} </a>
                                                @else
                                                    <a class="btn text-black-50" onclick="$(this).closest('form').submit()"><i class="fa fa-thumbs-down"></i> {{$post->dislikes_count}} </a>
                                                @endif
                                            </form>

                                        </div>
                                        <div class="line-divider"></div>
                                        <div class="post-text">
                                            <p>
                                                {{$post->description}}
                                                <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i
                                                    class="em em-anguished"></i></p>
                                        </div>
                                        <hr>
                                        <div class="line-divider"></div>
                                        @foreach($post->comments as $comment)
                                            <div class="post-comment">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt=""
                                                     class="profile-photo-sm">
                                                <p><a href="{{$post->user->id}}" class="profile-link">{{$comment->user->name}} </a>
                                                    <span>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</span>
                                                    <br>
                                                    {{$comment->description}}
                                                </p>
                                            </div>
                                        @endforeach
                                        <form class="form-inline" method="post" action="{{route('comments.create', ['post_id' => $post->id])}}">
                                            @csrf
                                            <textarea required class="form-control" name="description" style="width: 80%" placeholder="Post a comment!"></textarea>
                                            <button type="submit" class="btn btn-primary mb-2">Post!</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
