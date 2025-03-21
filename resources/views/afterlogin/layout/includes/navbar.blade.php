<style>
/* Navbar styling */
/* Navbar Styling */
.navbar {
    background-color: #fff;
    color: black;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
}

/* Navbar brand and link styling */
.navbar-brand,
.nav-link,
.form-control {
    color: #6D7073 !important;
}

/* Navbar brand specific styling */
.navbar-brand {
    font-size: 24px;
    font-weight: bold;
}

/* Search input field color */
.form-control {
    color: green;
}

/* Navigation icons size */
.nav-icon {
    font-size: 25px;
    margin: 10px;
}

/* Profile picture styling */
.profile-pic {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

/* Justify content between for navbar collapse */
.navbar-collapse {
    justify-content: space-between;
}

/* Styling for search input group */
.input-group .form-outline {
    background-color: #E6EEF7;
    border-radius: 20px;
    width: 100%;
}

/* Remove dropdown arrow for profile picture */
.di::after {
    display: none;
}

/* Notification container */
.notification {
    position: relative;
    display: inline-block;
}

/* Bell icon styling */
.notification .nav-link {
    position: relative;
    font-size: 30px;
    /* Adjust icon size */
    color: #000;
    /* Change icon color if needed */
}

/* Notification badge */
.notification .badge {
    position: absolute;
    top: -5px;
    /* Adjust position to align with the icon */
    right: -5px;
    /* Adjust position */
    padding: 5px;
    border-radius: 50%;
    background-color: red;
    color: white;
    font-size: 12px;
    min-width: 18px;
    min-height: 18px;
    text-align: center;
    line-height: 14px;
    font-weight: bold;
}

/* Dropdown menu styling */
.dropdown-menu,
.comments {
    width: 300px;
    max-height: 400px;
    overflow: hidden;
}

/* Hide scrollbar for comments */
.comments::-webkit-scrollbar {
    display: none;
}

/* Ensure dropdown item text wraps correctly */
.dropdown-item {
    white-space: normal;
}

/* Search bar styles */
.input-group {
    width: 300px;
    height: 40px;
}

.input-group .form-outline {
    display: flex;
    align-items: center;
    padding: 5px;
    border-radius: 20px;
}

.input-group .form-control {
    border: none;
    background-color: #E6EEF7;
    border-radius: 20px;
}

/* Navbar icons */
.nav-link {
    margin: 0 10px;
}

/* Logo styling */
#logo {
    font-size: 30px;
    font-weight: 700;
    color: #6D7073;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .navbar-collapse {
        text-align: center;
    }

    .col-md-4 {
        width: 100%;
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
    }

    .profile-pic {
        width: 35px;
        height: 35px;
    }

    .nav-icon {
        font-size: 22px;
    }
}
</style>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <!-- Logo -->
    <a class="" style="font-size:30px;font-weight:700;color:blue;margin-right:20px;text-decoration:none"
        href="{{ route('afterlogin.home') }}" id="logo">MeetUp</a>
    <!-- Toggler Button for smaller screens -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar Content -->
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="row w-100">
            <!-- Search Bar -->
            <div class="col-md-4 d-flex justify-content-start">
                <div class="input-group" style="width:300px;height:40px;">
                    <div class="form-outline d-flex align-items-center" data-mdb-input-init>
                        <!-- Search Icon -->
                        <button type="button" id="searchicon" class="btn btn border-0" data-mdb-ripple-init>
                            <i class="fas fa-search"></i>
                        </button>
                        <!-- Search Input Field -->
                        <input type="search" name="search" class="form-control border-0 " onfocus="remove()"
                            onblur="show()" placeholder="Search here"
                            style="border-radius:20px;background-color:#E6EEF7">
                    </div>
                </div>
            </div>

            <!-- Navigation Icons -->
            <div class="col-md-4 d-flex justify-content-center">
                <!-- Home Icon -->
                <a class="nav-link" href="{{ route('afterlogin.home') }}"><i class="fas fa-home nav-icon"></i></a>
                <!-- Video Icon -->
                <a class="nav-link" href="#"><i class=" fas fa-solid fa-circle-play nav-icon"></i></a>
                <!-- Friends Icon -->
                <a class="nav-link" href="/friends"><i class="fas fa-user-friends nav-icon"></i></a>
                <!-- Groups Icon -->
                <a class="nav-link" href="#"><i class="fas fa-users nav-icon"></i></a>
                <!-- Marketplace Icon -->
                <a class="nav-link" href="#"><i class="fas fa-store nav-icon"></i></a>
            </div>


            <!-- Profile and Notifications -->
            <div class="col-md-4 d-flex justify-content-end align-items-center">
                <!-- Profile Dropdown -->
                <div class="dropdown mx-2">
                    <a class="nav-link dropdown-toggle di" href="{{ URL::to('/') }}/profile" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : asset('storage/profiles/defaultuser.jpg') }}"
                            alt="Profile Picture" style="width: 40px;border-radius:50%;height:40px;">

                    </a>
                    <div class="dropdown-menu dropdown-menu-right i" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/profile">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </div>

                <!-- Notification Dropdown -->
                <div class="notification dropdown mx-2">
                    <a class="nav-link dropdown-toggle di" href="#" id="notificationDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-bell"></i>
                        <span class="badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
                        <!-- Notification Items -->
                        <a class="dropdown-item" href="#">
                            <strong>John Doe</strong> liked your post.
                            <br><small class="text-muted">2 minutes ago</small>
                        </a>
                        <a class="dropdown-item" href="#">
                            <strong>Mary Smith</strong> commented on your photo.
                            <br><small class="text-muted">5 minutes ago</small>
                        </a>
                        <a class="dropdown-item" href="#">
                            <strong>Robert Brown</strong> sent you a friend request.
                            <br><small class="text-muted">10 minutes ago</small>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center" href="#">
                            View all notifications
                        </a>
                    </div>
                </div>

                <!-- Messenger Icon -->
                <a class="nav-link mx-2" href="/messanger"><i class="fas fa-envelope nav-icon"></i></a>
            </div>

        </div>
    </div>
</nav>



<script>
// Hide the search icon and logo when the search input is focused
function remove() {
    document.getElementById('searchicon').style.display = 'none';
    document.getElementById('logo').style.display = 'none';
}

// Show the search icon and logo when the search input loses focus
function show() {
    document.getElementById('searchicon').style.display = 'inline';
    document.getElementById('logo').style.display = 'inline';
}
</script>