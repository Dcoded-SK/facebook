@extends('afterlogin.layout.master')

@section('title')
    Home page

@endsection


@section('style_css')

    <style>
        /* Container styling */
        .container {
            width: 50%;
            margin-top: 60px;
            overflow-y: auto;
            -ms-overflow-style: none;
            scrollbar-width: none;
            max-height: 650px;
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
            width: 600px;
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
    </style>

@endsection

@section('content')

    <!--  -->

    <div class="container">
        <!-- Stories Section -->
        <div class="stories">
            <div class="story col-3" data-toggle="modal" data-target="#storyModal"
                style="background-color: blue; cursor: pointer;">
                <img src="{{ asset('images/')}}" style="margin-left: -10px;" alt="Story of sagar kohar">
                <span style="color: white;">
                    sagar kohar
                </span>
            </div>



            <!-- stories section -->


            <div class="story col-3" style="background-image:url('{{URL::to('/')}}/images/');background-size:200px">
                <a href="viewStori"><img src="{{URL::to('/')}}/images/" alt="Story 2">
                    <span style="font-weight:bold;color:white">sagar kohar</span></a>
            </div>



        </div>

        <!-- Upload Section -->
        <div class="upload_section">
            <div class="row">
                <div class="col-2">
                    <img src="{{URL::to('/')}}/images/" style="width:50px;border-radius:100%;height:50px;" alt="">
                </div>
                <div class="col-10">
                    <input type="text" data-toggle="modal" data-target="#firstModal"
                        placeholder="What's on your mind, Sagar?"
                        style="width:90%;height:50px; border-radius:10px;background-color:#E6EEF7; padding-left:10%;"
                        class="border-0" name="" id="">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">Live Video</div>
                <div class="col-4" data-toggle="modal" data-target="#firstModal">Upload Video/Photo</div>
                <div class="col-4" data-toggle="modal" data-target="#firstModal">Feeling/Activity</div>
            </div>
        </div>


        @if ($errors->any())
            <div class="alert alert-danger error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li> <!-- Display each error -->
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Modals -->

        <!-- First Modal -->
        <div class="modal fade" id="firstModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal" id="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Create Post</h3>
                            <span class="close" onclick="closeModal()">&times;</span>
                        </div>
                    </div>
                </div>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/post" method="post" enctype="multipart/form-data" id="postForm">
                            @csrf
                            <textarea name="caption" placeholder="Say something about your post"
                                style="width: 100%; height: 80px; border:none"></textarea>

                            <div class="image-fluide" style="width:100%;height:400px;"></div> <!-- Div for image preview -->

                            <input type="file" name="post" id="imageInput" onchange="previewImage(event)">
                            <br>
                            <hr>
                            <h5>Who can see your post?</h5>
                            <input type="radio" name="visibility" value="public" id="">Anyone <br>
                            <input type="radio" name="visibility" id="" value="private">Private
                            <br>
                            <input type="radio" name="visibility" id="" value="friends">Friends
                            <br>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">POST</button>
                            </div>
                        </form>
                    </div>




                </div>
            </div>
        </div>

        <!-- story modal -->


        <div class="modal fade" id="storyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal" id="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Create story</h3>
                            <span class="close" onclick="closeModal()">&times;</span>
                        </div>
                    </div>
                </div>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Story</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/story" method="post" enctype="multipart/form-data" id="postForm">
                            @csrf


                            <div class="image-fluide1" style="width:90%;height:300px;"></div> <!-- Div for image preview -->

                            <input type="file" name="story" id="imageInput1" onchange="previewImage(event)">
                            <br>
                            <hr>
                            <h5>Who can see your story?</h5>
                            <input type="radio" name="visibility" value="public" id="">Anyone <br>
                            <input type="radio" name="visibility" id="" value="private">Private
                            <br>
                            <input type="radio" name="visibility" id="" value="friends">Friends
                            <br>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">ADD</button>
                            </div>
                        </form>
                    </div>





                </div>
            </div>
        </div>




        <!-- Posts Section -->
        <div class="posts">
            <div class="post">
                <!-- Post header -->
                <div class="post-header">
                    <img class="img-fluid" src="{{ URL::to('/') }}/images/" alt="Profile Picture">
                    <p><span style="margin-right:15px; font-weight:bold;"></span>
                        is Feeling happy with Tilakram and 6 others at RK University, Gujarat</p>
                </div>

                <!-- Post content -->
                <div class="post-content">
                    <p>caption</p>
                    <a href="{{ URL::to('/') }}/images/">
                        <div style="height:600px;width:530px;" align="center">
                            <img class="img-fluid" src="{{ URL::to('/') }}/images/" style="width:100%;height:90%;" alt="">
                        </div>
                    </a>
                </div>

                <!-- Post footer -->
                <div class="post-footer">
                    <!-- Like button with dynamic color change -->
                    <button onclick="like()">
                        <img src="{{ URL::to('/') }}/images/logos/like.png" alt="Like Button" id="l" style="width:40px;">
                    </button>
                    <span>

                        Be the first to Like

                        <div class="" data-toggle="modal" data-target="#userModal"></div>
                    </span>





                    <button onclick="showCommentator()" id="c">Comment</button>
                    <div style="display:none;" class="commentSection">
                        <form action="comment" method="post">
                            @csrf
                            <Textarea name="comment" required style="width:300px; height:67px;"></Textarea>
                            <input type="hidden" value="" name="postId">
                            <input type="submit" value="Save" class="bg-primary">
                        </form>
                    </div>
                </div>

                <hr>
                <div class="comments" style="overflow-y:auto; max-height:150px; margin-top:20px;">
                    1 comments
                    <p><a href="friend_profile"><span>ashisi:</span></a>
                        wow</p>
                    <hr>




                </div>
            </div>
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


@endsection


<script>
    function previewImage(event) {
        var imageFluideDiv = document.querySelector('.image-fluide');
        imageFluideDiv.innerHTML = ""; // Clear any previous image
        var file = event.target.files[0];

        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '100%'; // Adjust as needed
                img.style.height = '100%'; // Fit the image within the div
                img.classList.add('img-fluid'); // Adding the Bootstrap img-fluid class
                imageFluideDiv.appendChild(img);
            }
            reader.readAsDataURL(file);
        }
    }
</script>

<script>
    function previewImage(event) {
        var imageFluideDiv = document.querySelector('.image-fluide1');
        imageFluideDiv.innerHTML = ""; // Clear any previous image
        var file = event.target.files[0];

        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '100%'; // Adjust as needed
                img.style.height = '100%'; // Fit the image within the div
                img.classList.add('img-fluid'); // Adding the Bootstrap img-fluid class
                imageFluideDiv.appendChild(img);
            }
            reader.readAsDataURL(file);
        }
    }
</script>