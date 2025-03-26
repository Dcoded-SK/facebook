@extends('afterlogin.layout.master')

@section('title')
    Home page
@endsection


@section('style_css')
    <style>
        /* Container styling */
        .container {
            width: 80%;
            margin-top: 60px;
            overflow-y: auto;
            -ms-overflow-style: none;
            scrollbar-width: none;
            /* max-height: 650px; */
            z-index: 0;
        }

        /* Stories section styling */
        .stories {
            display: flex;
            margin-bottom: 20px;
            overflow-x: auto;
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
        }

        /* Individual story styling */
        .story {
            width: 20%;
            height: 300px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-right: 10px;
            display: flex;
            justify-content: center;
        }

        /* Story image styling */
        .story img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        /* Upload section styling */
        .upload_section {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 10px;
        }

        /* Posts section styling */
        .posts {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            min-width: 500px;
        }

        /* Individual post styling */
        .post {
            margin-bottom: 20px;
            border-top: 1px solid #9EA0A2;
            border-bottom: 1px solid #9EA0A2;
            padding: 10px 2px;
            margin-bottom: 50px;
            border-radius: 5%;
            padding: 1%;
        }

        /* Post header styling */
        .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        /* Post header image styling */
        .post-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Post content styling */
        .post-content {
            margin-bottom: 10px;
            height: 700px;
            width: 100%;
            padding-left: 10%;
            border-radius: 5%;
            border-bottom: 1px solid #9EA0A2;
        }

        /* Post footer styling */
        .post-footer {
            display: flex;
            justify-content: space-between;
        }

        /* Post footer button styling */
        .post-footer button {
            color: black;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            background-color: transparent;
        }

        .like-container {
            position: relative;
            display: inline-block;
        }

        .like-button {
            background: none;
            border: none;
            font-size: 30px;
            cursor: pointer;
            color: #555;
            transition: color 0.3s ease;
        }

        .like-button:hover {
            color: #1877f2;
            /* Facebook Blue */
        }

        /* Reactions Box */
        .reactions {
            display: none;
            position: absolute;
            bottom: 50px;
            left: 0;
            background: white;
            padding: 8px;
            border-radius: 10px;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.2);
            white-space: nowrap;
        }

        /* Icons inside the reaction box */
        .reactions i {
            font-size: 28px;
            margin: 8px;
            cursor: pointer;
        }

        /* Hover effect on icons */
        .reactions i:hover {
            transform: scale(1.2);
            filter: brightness(1.2);
        }

        /* Reaction Colors */
        .like {
            color: #1877f2;
        }

        /* Blue */
        .love {
            color: #e0245e;
        }

        /* Pink-Red */
        .laugh {
            color: #f7b928;
        }

        /* Yellow */
        .angry {
            color: #f02849;
        }

        /* Red */

        /* Show reactions on hover */
        .like-container:hover .reactions {
            display: flex;
            gap: 10px;
            opacity: 1;
        }
    </style>
@endsection

@section('content')
    <!--  -->

    <div class="container">
        <!-- Stories Section -->
        <div class="stories">
            <div class="story col-3" data-bs-toggle="modal" data-bs-target="#storyModal"
                style="background-color: blue; cursor: pointer;">

                <img src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : asset('storage/profiles/defaultuser.jpg') }}"
                    alt="Profile Picture" style="width: 40px">
                <span style="color: white;">
                    {{ auth()->user()->first_name }}
                </span>
            </div>



            <!-- stories section -->


            <div class="story col-3 bg-secondary"
                style="background-image:url('{{ URL::to('/') }}/images/');background-size:200px">
                <a href="viewStori"><img src="{{ URL::to('/') }}/images/" alt="Story 2">
                    <span style="font-weight:bold;color:white">ashish kohar</span></a>
            </div>
            <div class="story col-3 bg-secondary"
                style="background-image:url('{{ URL::to('/') }}/images/');background-size:200px">
                <a href="viewStori"><img src="{{ URL::to('/') }}/images/" alt="Story 2">
                    <span style="font-weight:bold;color:white">ashish kohar</span></a>
            </div>
            <div class="story col-3 bg-secondary"
                style="background-image:url('{{ URL::to('/') }}/images/');background-size:200px">
                <a href="viewStori"><img src="{{ URL::to('/') }}/images/" alt="Story 2">
                    <span style="font-weight:bold;color:white">ashish kohar</span></a>
            </div>
            <div class="story col-3 bg-secondary"
                style="background-image:url('{{ URL::to('/') }}/images/');background-size:200px">
                <a href="viewStori"><img src="{{ URL::to('/') }}/images/" alt="Story 2">
                    <span style="font-weight:bold;color:white">ashish kohar</span></a>
            </div>



        </div>



        <!-- Upload Section -->
        <div class="upload_section">
            <div class="row">
                <div class="col-2">
                    <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                        style="width:50px;border-radius:100%;height:50px;" alt="">
                </div>
                <div class="col-10">
                    <input type="text" data-bs-toggle="modal" data-bs-target="#postModal"
                        placeholder="What's on your mind, Sagar?"
                        style="width:90%;height:50px; border-radius:10px;background-color:#E6EEF7; padding-left:10%;"
                        class="border-0">

                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">Live Video</div>
                <div class="col-4" data-bs-toggle="modal" data-bs-target="#postModal">Upload Video/Photo</div>
                <div class="col-4" data-bs-toggle="modal" data-bs-target="#postModal">Feeling/Activity</div>
            </div>
        </div>







        <!-- Posts Section -->


        <div class="posts">
            @foreach ($posts as $post)
                    <div class="post">
                        <!-- Post header -->
                        <div class="post-header">
                            <img class="img-fluid" src="{{ asset('storage/' . $post->getUser->profile_picture) }}"
                                alt="Profile Picture">
                            <p><span style="margin-right:15px; font-weight:bold;"></span>
                                is Feeling happy with Tilakram and 6 others at RK University, Gujarat</p>
                        </div>

                        <!-- Post content -->
                        <div class="post-content">
                            <p>{{ $post->caption }}</p>
                            <a href="{{ asset('storage/' . $post->content) }}">
                                <div style="width:70%;height:90%;" align="center">
                                    <img class="img-fluid" src="{{ asset('storage/' . $post->content) }}"
                                        style="width:100%;height:100%;" alt="">
                                </div>
                            </a>
                        </div>

                        <?php
                $userReaction = $post->getReaction->where('user_id', auth()->user()->id)->first(); // Get the user's reaction (if any)

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ?>
                        <!-- Post footer -->
                        <div class="post-footer">

                            <div class="like-container">
                                <button class="like-button" id="like-button-{{ $post->id }}"
                                    style="color: {{ $userReaction ? getReactionColor($userReaction->reaction_type) : '#000' }};">
                                    <i class="fa-solid  {{ $userReaction ? getReactionIcon($userReaction->reaction_type) : 'fa-thumbs-up' }}"
                                        id="like-icon-{{ $post->id }}"></i>
                                </button>

                                <!-- Reactions -->
                                <div class="reactions" id="reaction-box-{{ $post->id }}">
                                    <i class="fa-solid fa-thumbs-up like react" data-reaction="like" data-post-id="{{ $post->id }}"
                                        title="Like"></i>
                                    <i class="fa-solid fa-heart love react" data-reaction="love" data-post-id="{{ $post->id }}"
                                        title="Love"></i>
                                    <i class="fa-solid fa-face-laugh laugh react" data-reaction="laugh"
                                        data-post-id="{{ $post->id }}" title="Laugh"></i>
                                    <i class="fa-solid fa-face-angry angry react" data-reaction="angry"
                                        data-post-id="{{ $post->id }}" title="Angry"></i>
                                </div>

                                <span id="reaction-count-{{ $post->id }}">{{ $post->get_reaction_count }}</span>
                            </div>

                            @if ($post->get_reaction_count < 1) <span id="reaction-text-{{ $post->id }}">Be the first to Like</span>
                            @endif







                            <button onclick="showCommentator({{ $post->id }})" id="c">Comment</button>
                            <div style="display:none;" class="commentSection-{{ $post->id }}">
                                <form action="" method="post" class="commentForm">
                                    @csrf
                                    <Textarea name="comment" style="width:300px; height:67px;"></Textarea>
                                    <input type="hidden" value="{{ $post->id }}" name="postId">
                                    <input type="submit" value="Save" class="saveComment bg-primary">
                                </form>
                                <button type="button" class="bg-secondary"
                                    onclick="showCommentator({{ $post->id }})">Cancel</button>
                            </div>
                        </div>
                        <div class="TotalComment-{{ $post->id }}">{{ $post->getComment->count() }} comments</div>

                        <hr>
                        <div class="comments-{{ $post->id }}" style="overflow-y:auto; max-height:150px; margin-top:20px;">


                            @if($post->getComment)

                                @foreach ($post->getComment as $comment)
                                    <a href="friend_profile-{{ $comment->getUser->id }}" style="text-decoration: none;">
                                        <p><span id="commentor"
                                                style="margin-right:15px; font-weight:bold;">{{ $comment->getUser->first_name }}</span>
                                    </a>
                                    <span id="comment">{{ $comment->comment }}</span>
                                    <hr>
                                @endforeach
                            @endif

                        </div>
                    </div>
            @endforeach

        </div>

        <!-- Modal for Likes -->
        <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Users Who Reacted</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ashish
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Modals -->

    <!-- Post Modal -->
    <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <form action="/post" method="post" enctype="multipart/form-data">
                        @csrf
                        <textarea name="caption" placeholder="Say something about your post"
                            style="width: 100%; height: 80px; border:none"></textarea>

                        <div class="image-fluid" style="width:100%;height:400px;"></div> <!-- Div for image preview -->

                        <input type="file" name="content" id="imageInput" onchange="previewImage(event)">
                        <hr>
                        <h5>Who can see your post?</h5>
                        <input type="radio" name="visibility" value="public"> Anyone <br>
                        <input type="radio" name="visibility" value="private"> Private <br>
                        <input type="radio" name="visibility" value="friends"> Friends <br>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">POST</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Story Modal -->
    <div class="modal fade" id="storyModal" tabindex="-1" role="dialog" aria-labelledby="storyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="storyModalLabel">Add Story</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <form action="/story" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="image-fluid1" style="width:90%;height:300px;"></div> <!-- Div for image preview -->

                        <input type="file" name="story" id="imageInput1" onchange="previewImage(event)">
                        <hr>
                        <h5>Who can see your story?</h5>
                        <input type="radio" name="visibility" value="public"> Anyone <br>
                        <input type="radio" name="visibility" value="private"> Private <br>
                        <input type="radio" name="visibility" value="friends"> Friends <br>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">ADD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('scripts')
    <script>
        jQuery(document).ready(function () {

            // Reaction section starts
            $('.react').click(function () {
                var reaction = $(this).data('reaction');
                var postId = $(this).data('post-id');

                $.ajax({
                    url: "{{ route('post.reaction') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        postId: postId,
                        reaction: reaction
                    },
                    success: function (response) {
                        console.log(response);
                        $('#reaction-count-' + postId).html(response.reactCount);

                        updateLikeButton(response.reaction, postId);

                        if (response.reactCount > 0) {
                            $('#reaction-text-' + postId).html('');
                        } else {
                            $('#reaction-text-' + postId).html('Be the first to Like');
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });

            function updateLikeButton(reaction, postId) {
                let icon = $("#like-icon-" + postId);
                let button = $("#like-button-" + postId);

                let reactions = {
                    like: {
                        icon: "fa-thumbs-up",
                        color: "#1877f2"
                    },
                    love: {
                        icon: "fa-heart",
                        color: "#e0245e"
                    },
                    laugh: {
                        icon: "fa-face-laugh",
                        color: "#f7b928"
                    },
                    angry: {
                        icon: "fa-face-angry",
                        color: "#f02849"
                    },
                    defaulticon: {
                        icon: "fa-thumbs-up", // Set default icon back to thumbs-up
                        color: "#000" // Default color
                    }
                };

                if (reactions[reaction]) {
                    icon.attr("class", "fa-solid " + reactions[reaction].icon);
                    button.css("color", reactions[reaction].color);
                }
            }


            $(".like-container").mouseleave(function () {
                setTimeout(() => {
                    $(this).find(".reactions").hide();
                }, 500);
            });

            $(".like-container").mouseenter(function () {
                $(this).find(".reactions").show();
            });
            // Reaction section end

            // comment section star

            $(".saveComment").click(function (e) {


                e.preventDefault();

                const form_data = $(this).parents(".commentForm");
                $.ajax({
                    url: "{{ route('api.setComment') }}",
                    type: "POST",
                    data: form_data.serialize(),
                    success: function (response) {
                        console.log(response);

                        // Update the comment count for the specific post
                        $(".TotalComment-" + response.comment.post_id).html(response
                            .total_comments + " comments");

                        // Append the new comment dynamically
                        $(".comments-" + response.comment.post_id).prepend(
                            `  <a href="friend_profile-${response.comment.user_id}" style="text-decoration: none;">
                                                                <p><span id="commentor"
                                                                        style="margin-right:15px; font-weight:bold;">${response.comment.user_name}</span>
                                                            </a>
                                                            <span id="comment">${response.comment.comment}</span>
                                                            <hr>`
                        );

                        showCommentator(response.comment.post_id);

                    },
                    error: function (error) {
                        console.log(error);
                    }
                })
            });

        });


        function showCommentator(id) {
            $(".commentSection-" + id).toggle();
        }
    </script>
@endpush