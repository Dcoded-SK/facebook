@extends('afterlogin.layout.master')

@section('title')
    Home page
@endsection


@section('style_css')
    <style>
        .story-viewer-container {
            position: relative;
            height: 90vh;
            width: 80%;
            display: flex;
            flex-direction: column;
        }

        .story-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            position: absolute;
            left: 0;
            margin-top: 10%;
            right: 0;
            z-index: 10;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), transparent);
        }

        .story-progress-container {
            display: flex;
            gap: 5px;
            width: 100%;
            position: absolute;
            top: 10px;
            left: 0;
            padding: 0 15px;
            z-index: 11;
        }

        .story-progress {
            height: 3px;
            background-color: rgba(255, 255, 255, 0.4);
            flex-grow: 1;
            border-radius: 3px;
            overflow: hidden;
        }

        .story-progress-bar {
            height: 100%;
            background-color: white;
            width: 0%;
            transition: width 0.1s linear;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #1877f2;
        }

        .user-name {
            font-weight: bold;
        }

        .story-time {
            font-size: 14px;
            opacity: 0.8;
        }

        .story-content {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .story-image {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .story-video {
            max-width: 100%;
            max-height: 100%;
        }

        .story-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 10;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.5), transparent);
        }

        .reply-input {
            flex-grow: 1;
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 20px;
            padding: 10px 15px;
            color: white;
            margin-right: 10px;
        }

        .reply-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .action-btn {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            margin: 0 5px;
            cursor: pointer;
        }

        .close-btn {
            color: white;
            font-size: 24px;
            background: none;
            border: none;
            cursor: pointer;
        }

        .navigation-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.3);
            border: none;
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 20px;
            z-index: 10;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .prev-btn {
            left: 20px;
        }

        .next-btn {
            right: 20px;
        }

        .seen-by {
            position: absolute;
            top: 60px;
            right: 15px;
            display: flex;
            align-items: center;
            font-size: 12px;
            background: rgba(0, 0, 0, 0.5);
            padding: 5px 10px;
            border-radius: 20px;
        }

        .seen-by-avatar {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            object-fit: cover;
            margin-left: 5px;
        }
    </style>
@endsection

@section('content')
    <!--  -->
    <div class="story-viewer-container">


        @foreach ($stories as $story)

            <!-- Progress bars -->
            <div class="story-progress-container">
                <div class="story-progress">
                    <div class="story-progress-bar" style="width: 100%"></div>
                </div>

            </div>

            <!-- Header -->
            <div class="story-header">
                <div class="user-info">
                    <img src="{{$story->getUser->profile_picture ? asset('storage/' . $story->getUser->profile_picture) : asset('storage/profiles/defaultuser.svg')}}"
                        class="user-avatar" alt="User">
                    <div>
                        <div class="user-name">{{ $story->getUser->first_name }}</div>
                        <div class="story-time">{{ $story->created_at->diffForHumans() }}</div>
                    </div>
                </div>
                <button class="close-btn">
                    <i class="fas fa-times"></i>
                </button>
            </div>


            <!-- Navigation buttons -->
            <button class="navigation-btn prev-btn">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="navigation-btn next-btn">
                <i class="fas fa-chevron-right"></i>
            </button>

            <!-- Story content -->
            <div class="story-content">
                <img src="{{asset('storage/' . $story->story)}}" class="story-image" width="100%" alt="Story">
            </div>

            <!-- Footer -->
            <div class="story-footer">
                <input type="text" class="reply-input" placeholder="Send message">
                <button class="action-btn">
                    <i class="far fa-heart"></i>
                </button>
                <button class="action-btn">
                    <i class="far fa-paper-plane"></i>
                </button>
            </div>

        @endforeach

    </div>
@endsection