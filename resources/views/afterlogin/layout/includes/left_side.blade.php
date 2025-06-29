<style>
    /* Sidebar styling */
    .sidebar {
        margin-top: 60px;
        /* Space from the top */
        height: 100%;
        /* Full height of the viewport */
        width: 20%;
        /* Sidebar width */
        position: fixed;
        /* Fixed position on the left */
        left: 0;
        /* Align to the left edge */
        background-color: #E6EEF7;
        /* Background color */
        padding-top: 20px;
        /* Padding at the top */
    }

    /* Sidebar hover effect */
    .sidebar:hover {
        border-right: 10px solid #AAB2BB;
        /* Add right border on hover */
    }

    /* Sidebar link styling */
    .sidebar a {
        padding: 10px 15px;
        /* Padding inside the link */
        text-decoration: none;
        /* Remove underline from links */
        font-size: 18px;
        /* Font size */
        color: black;
        /* Text color */
        font-weight: 600;
        /* Font weight */
        display: block;
        /* Make links block elements for full-width clickable area */
    }

    /* Sidebar link hover effect */
    .sidebar a:hover {
        background-color: #BEC1C4;
        /* Background color on hover */
        color: white;
        /* Text color on hover */
    }

    /* Profile picture styling */
    .sidebar .profile-pic {
        width: 40px;
        /* Width of the profile picture */
        height: 40px;
        /* Height of the profile picture */
        border-radius: 50%;
        /* Make the profile picture circular */
        margin-right: 10px;
        /* Space between profile picture and text */
    }

    /* Navigation item styling */
    .sidebar .nav-item {
        padding: 10px 0;
        /* Vertical padding for navigation items */
    }
</style>



<div class="sidebar">
    <div class="nav flex-column">
        <!-- Profile section -->

        <!-- Navigation links -->
        <div class="nav-item">
            <a href="#"><i class="fas fa-home"></i> Home</a>
        </div>
        <div class="nav-item">
            <a href="#"><i class="fas fa-newspaper"></i> News Feed</a>
        </div>
        <div class="nav-item">
            <a href="#"><i class="fas fa-user-friends"></i> Friends</a>
        </div>
        <div class="nav-item">
            <a href="#"><i class="fas fa-users"></i> Groups</a>
        </div>
        <div class="nav-item">
            <a href="#"><i class="fas fa-store"></i> Marketplace</a>
        </div>
        <div class="nav-item">
            <a href="#"><i class="fas fa-tv"></i> Watch</a>
        </div>
        <div class="nav-item">
            <a href="#"><i class="fas fa-cog"></i> Settings</a>
        </div>
    </div>
</div>




<!-- JavaScript to auto-hide the messages after 5 seconds -->
<script>
    window.onload = function () {
        setTimeout(function () {
            var successMessage = document.getElementById('successMessage');
            var errorMessage = document.getElementById('errorMessage');

            if (successMessage) {
                successMessage.style.display = 'none';
            }

            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 5000); // 5000 milliseconds = 5 seconds
    };
</script>