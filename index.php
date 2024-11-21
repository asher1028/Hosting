<?php include 'userSessionStart.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parish of San Juan</title>
    <link rel="stylesheet" href="userHomepage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v21.0"></script>
       <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS (including Popper.js for modals) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <!-- Adding jQuery and Bootstrap JS for carousel functionality -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <script>
        function readmore() { window.location.href = './User/userAbout.php'; }
        function massSchedule() { window.location.href = '../User/userPrivateMass.php'; }
        function contactUs() { window.location.href = './User/userContactUs.php'; }
        function sacraments() { window.location.href = './User/userSacraments.php'; }
        function igopen(event) {
                event.preventDefault();
                window.open("https://www.instagram.com/angtinigsjbp/", '_blank');
            }
            function fbopen(event) {
                event.preventDefault();
                window.open("https://www.facebook.com/parokyangsanjuanhagonoy/", '_blank');
            }
        </script>
    <style>
        /* Styles for consistent carousel sizing */
        #imageCarousel .carousel-inner {
            width: 100%;
            height: 350px;
            overflow: hidden;
        }
        
        #imageCarousel .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Custom styling for sections */
        .welcome-section,
        .mass-schedule-section,
        .sacraments-section,
        .video-section,
        .services-offered-section,
        .contact-section
        .social-section {
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.3); /* 90% opacity white */
        }

        /* Alternating colors for sections */
        .mass-schedule-section, .video-section,   .contact-section{
            background-color: rgba(255, 0, 0, 0.6);
        }

        .carousel-controls {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }
        
        /* Contact Section */
        .contact-section img {
            width: 50px;
            
        }
    </style>
    
</head>
<body>
    <header>
        <?php include 'userHeader.php'; ?>
    </header>
  

    <div class="container my-5">
        
<!-- Welcome Section with Carousel and Text Overlay -->
<div class="welcome-section position-relative text-center bg-white my-3" style="max-width: 800px; margin: auto;"> <!-- Center the content -->
    <!-- Carousel -->
    <div id="imageCarousel" class="carousel slide" data-ride="carousel" data-interval="5000" style="height: 500px; position: relative;">
        <div class="carousel-inner" style="height: 100%;">
            <div class="carousel-item active">
                <img src="../Images/home.png" class="d-block w-100 h-100" alt="Church Image 1" style="object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="../Images/angTinig.png" class="d-block w-100 h-100" alt="Church Image 2" style="object-fit: cover;">
            </div>
        </div>
        <a class="carousel-control-prev carousel-controls" href="#imageCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next carousel-controls" href="#imageCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Text Overlay -->
    <div class="overlay-content text-black p-5" style="position: absolute; bottom: 0; left: 0; width: 100%; background: rgba(0, 0, 0, 0);">
        <h2>Welcome to our Parish</h2>
        <p>Parokya ng San Juan Bautista is a Catholic church located in San Juan, Hagonoy, Bulacan. It is part of the Diocese of Malolos, established in 1947. The Parish Fiesta is celebrated every 24th day of June.</p>
        <button class="btn btn-secondary" onclick="readmore()">Read More...</button>
    </div>
</div>



<!-- Mass Schedule Section with Transparent Dark Red Background -->
<div class="row align-items-center text-center my-5 mass-schedule-section">
    <div class="col-md-6">
        <h2 class="text-light">SET APPOINTMENT</h2>
        <p class="text-light">Services Offered: <br><br>House Blessings <br> Business Blessings <br> Car Blessings <br> Religious Item Blessing <br> Anointing of the Sick</p>
        <button class="btn btn-secondary mt-4" onclick="massSchedule()">SET APPOINTMENT</button>
    </div>
    <div class="col-md-6">
        <!-- Link to open the image in a modal -->
        <a href="#" data-toggle="modal" data-target="#massScheduleModal">
            <img src="../Images/schedule.jpg" class="img-fluid" alt="Mass Schedule Image">
            <h3 class="text-light mt-3">View Mass Schedule</h3>
        </a>
    </div>
</div>

<!-- Modal for Mass Schedule Image -->
<div class="modal fade" id="massScheduleModal" tabindex="-1" role="dialog" aria-labelledby="massScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <img src="../Images/schedule.jpg" class="img-fluid w-100" alt="Mass Schedule Image">
            </div>
        </div>
    </div>
</div>


<!-- Modal for the Mass Schedule Image -->
<div class="modal fade" id="massScheduleModal" tabindex="-1" role="dialog" aria-labelledby="massScheduleModalLabel" aria-hidden="true" style="margin-top: auto;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img src="../Images/schedule.jpg" class="img-fluid" alt="Large Mass Schedule">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

        <!-- Sacraments Section -->
        <div class="row align-items-center text-center my-5 sacraments-section bg-white">
            <div class="col-md-6 mb-3 mb-md-0">
                <img src="../Images/sacraments.jpg" class="img-fluid" alt="Sacraments Image" style="width: 100%; height: auto;">
            </div>
            <div class="col-md-6">
                <p>
                    1. BAPTISM<br>2. CONFIRMATION<br>3. EUCHARIST (HOLY COMMUNION)<br>4. RECONCILIATION (PENANCE OR CONFESSION)<br>5. ANNOINTING OF THE SICK<br>6. MATRIMONY (MARRIAGE) <br>7. HOLY ORDERS
                </p>
                <button class="btn btn-secondary mt-4" onclick="sacraments()">Read About Sacraments..</button>
            </div>
        </div>

        <!-- Event Section -->
        <div class="row align-items-center text-center my-5 video-section">
            <div class="col-md-6">
                <h1 class="text-light">SCHEDULE OF EVENTS</h1>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
            </div>
            <div class="col-md-6">
                <h4 class="text-light">NEWS AND EVENTS</h4>
                 <img src="../Images/eventsPic.jpg" class="img-fluid" alt="Event Image" style="width: 450px; height: 450px;">
            </div>
        </div>

        <!-- Services Offered Section -->
       <div class="row align-items-center text-center my-5 services-offered-section bg-white">
    <div class="col-12">
        <h1 class="text-black mb-4">SERVICES OFFERED</h1>
    </div>

    <!-- Baptism -->
    <div class="col-md-4 mb-4">
        <a href="#" onclick="checkLogin('./User/userBaptismSchedule.php')">
            <img src="../Images/baptismLogo.jpg" class="img-fluid rounded shadow" alt="Baptism Image" style="max-height: 200px; width: 100%; object-fit: cover; border: double black;">
        </a>
        <h4 class="text-black mt-2">Baptism</h4>
    </div>

    <!-- Wedding -->
    <div class="col-md-4 mb-4">
        <a href="#" onclick="checkLogin('./User/userWeddingSchedule.php')">
            <img src="../Images/marriageLogo.jpg" class="img-fluid rounded shadow" alt="Wedding Image" style="max-height: 200px; width: 100%; object-fit: cover; border: double black;">
        </a>
        <h4 class="text-black mt-2">Wedding</h4>
    </div>
    <!-- Mass -->
<div class="col-md-4">
    <a href="#" data-bs-toggle="modal" data-bs-target="#massModal">
        <img src="../Images/massLogo.jpg" class="img-fluid rounded shadow" alt="Mass Image" style="max-height: 200px; width: 100%; object-fit: cover; border: double black;">
    </a>
    <h4 class="text-black mt-2">Mass</h4>
</div>

<!-- Modal Structure -->
<div class="modal fade" id="massModal" tabindex="-1" aria-labelledby="massModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="massModalLabel">Choose Mass Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Please select an option:</p>
                <div class="d-grid gap-2">
                    <a href="./User/userFuneralScheduleApplication.php" class="btn btn-primary">Funeral Mass</a>
                    <a href="./User/userPrivateMass.php" class="btn btn-secondary">Private Mass</a>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<script>
    function checkLogin(redirectUrl) {
        <?php if (isset($_SESSION['username'])): ?>
            // If user is logged in, redirect to the requested page
            window.location.href = redirectUrl;
        <?php else: ?>
            // If user is not logged in, show an alert and redirect to the login page
            alert("You must be logged in to continue.");
            window.location.href = "./User/userLogin.php";
        <?php endif; ?>
    }
</script>


        </div>

         <!-- Video Section -->
        <div class="row align-items-center text-center my-5 video-section">
            <div class="col-md-6">
                <p class="text-light">REV. FATHER MELCHOR R. IGNACIO</p>
                <img src="../Images/father.jpg" class="img-fluid" alt="Father Image">
            </div>
            <div class="col-md-6">
                <p class="text-light">FEATURED VIDEO</p>
                <video width="100%" controls>
                    <source src="../Images/Featured.mp4" type="video/mp4">
                </video>
            </div>
        </div>
<div class="row align-items-center text-center my-5 welcome-section bg-white">
    <h1 class="col-12 mb-4">GALLERY</h1>
    
    <!-- Gallery Container -->
    <div class="gallery-container d-flex justify-content-center overflow-hidden">
        <div class="gallery-wrapper d-flex">
            <!-- Gallery Images -->
            <div class="gallery-item">
                <a href="#" data-toggle="modal" data-target="#imageModal" data-img-src="../Images/image12.jpg">
                    <img src="../Images/image12.jpg" class="img-fluid rounded shadow gallery-image" alt="Gallery Image 1">
                </a>
            </div>
            <div class="gallery-item">
                <a href="#" data-toggle="modal" data-target="#imageModal" data-img-src="../Images/image13.jpg">
                    <img src="../Images/image13.jpg" class="img-fluid rounded shadow gallery-image" alt="Gallery Image 2">
                </a>
            </div>
            <div class="gallery-item">
                <a href="#" data-toggle="modal" data-target="#imageModal" data-img-src="../Images/image1.jpg">
                    <img src="../Images/image1.jpg" class="img-fluid rounded shadow gallery-image" alt="Gallery Image 3">
                </a>
            </div>
            <div class="gallery-item">
                <a href="#" data-toggle="modal" data-target="#imageModal" data-img-src="../Images/image15.jpg">
                    <img src="../Images/image15.jpg" class="img-fluid rounded shadow gallery-image" alt="Gallery Image 4">
                </a>
            </div>
            <div class="gallery-item">
                <a href="#" data-toggle="modal" data-target="#imageModal" data-img-src="../Images/image5.jpg">
                    <img src="../Images/image5.jpg" class="img-fluid rounded shadow gallery-image" alt="Gallery Image 5">
                </a>
            </div>
            <div class="gallery-item">
                <a href="#" data-toggle="modal" data-target="#imageModal" data-img-src="../Images/image6.jpg">
                    <img src="../Images/image6.jpg" class="img-fluid rounded shadow gallery-image" alt="Gallery Image 6">
                </a>
            </div>
            <div class="gallery-item">
                <a href="#" data-toggle="modal" data-target="#imageModal" data-img-src="../Images/image7.jpg">
                    <img src="../Images/image7.jpg" class="img-fluid rounded shadow gallery-image" alt="Gallery Image 7">
                </a>
            </div>
            <div class="gallery-item">
                <a href="#" data-toggle="modal" data-target="#imageModal" data-img-src="../Images/image8.jpg">
                    <img src="../Images/image8.jpg" class="img-fluid rounded shadow gallery-image" alt="Gallery Image 8">
                </a>
            </div>
            <div class="gallery-item">
                <a href="#" data-toggle="modal" data-target="#imageModal" data-img-src="../Images/image9.jpg">
                    <img src="../Images/image9.jpg" class="img-fluid rounded shadow gallery-image" alt="Gallery Image 9">
                </a>
            </div>
            <div class="gallery-item">
                <a href="#" data-toggle="modal" data-target="#imageModal" data-img-src="../Images/image10.jpg">
                    <img src="../Images/image10.jpg" class="img-fluid rounded shadow gallery-image" alt="Gallery Image 10">
                </a>
            </div>
            <div class="gallery-item">
                <a href="#" data-toggle="modal" data-target="#imageModal" data-img-src="../Images/image11.jpg">
                    <img src="../Images/image11.jpg" class="img-fluid rounded shadow gallery-image" alt="Gallery Image 11">
                </a>
            </div>
        </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="col-12 text-center my-3">
        <button id="prevBtn" class="btn btn-secondary">Previous</button>
        <button id="nextBtn" class="btn btn-secondary">Next</button>
    </div>
</div>

<!-- Modal Structure -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" class="img-fluid" alt="Selected Image">
            </div>
        </div>
    </div>
</div>

<style>
body {
    padding: 0; /* Remove any default margin or padding */
    background-image: url("../Images/mainBG.png");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}

/* Ensure equal margins on the left and right sides of the gallery container */
.gallery-container {
    position: relative; /* Position for relative child elements */
    width: 100%; /* Full width of the container */
    padding: 0 15px; /* Equal padding on the left and right for spacing */
    box-sizing: border-box; /* Include padding in the element's total width */
}

/* Gallery wrapper that holds images */
.gallery-wrapper {
    display: flex; /* Flexbox for horizontal alignment */
    transition: transform 0.5s ease; /* Smooth transition for scrolling */
    justify-content: center; /* Align items in the center */
}

/* Gallery item setup */
.gallery-item {
    flex: 0 0 150px; /* Set a fixed width for uniformity */
    margin: 0 10px; /* Margin between items */
}

/* Gallery image setup */
.gallery-image {
    width: 100%; /* Responsive image */
    height: 100px; /* Fixed height for uniformity */
    object-fit: cover; /* Maintain aspect ratio without distortion */
}

/* Modal image setup */
.modal-body {
    display: flex;
    justify-content: center;
}

.modal-body img {
    max-width: 80%; /* Control image size in modal */
    height: auto; /* Maintain aspect ratio */
}


</style>

<script>
 $(document).ready(function() {
    let currentIndex = 0;
    const images = [
        "../Images/image12.jpg",
        "../Images/image13.jpg",
        "../Images/image1.jpg",
        "../Images/image15.jpg",
        "../Images/image6.jpg",
        "../Images/image5.jpg",
        "../Images/image7.jpg",
        "../Images/image8.jpg",
        "../Images/image9.jpg",
        "../Images/image10.jpg",
        "../Images/image11.jpg"
    ];

    // Function to update the visible images based on currentIndex
    function updateGallery() {
        const visibleImages = 6; // Number of images to show
        const start = currentIndex;
        const end = currentIndex + visibleImages;

        $('.gallery-item').each(function(index) {
            if (index >= start && index < end) {
                $(this).show(); // Show image
            } else {
                $(this).hide(); // Hide image
            }
        });

        // Disable buttons if at the start or end
        $('#prevBtn').prop('disabled', currentIndex === 0);
        $('#nextBtn').prop('disabled', currentIndex + visibleImages >= images.length);
    }

    // Open modal and set the image
    $('a[data-toggle="modal"]').on('click', function() {
        const imgSrc = $(this).data('img-src');
        $('#modalImage').attr('src', imgSrc);
    });

    // Next button functionality
    $('#nextBtn').on('click', function() {
        if (currentIndex + 6 < images.length) {
            currentIndex += 1; // Move to the next index
            updateGallery();
        }
    });

    // Previous button functionality
    $('#prevBtn').on('click', function() {
        if (currentIndex > 0) {
            currentIndex -= 1; // Move to the previous index
            updateGallery();
        }
    });

    // Initialize the gallery
    updateGallery();
});

</script>

    <div class="text-center mt-3" style="background-color: rgba(255,0,0,0.6);">
          <!-- Contact Us Link -->
        <a href="userContactUs.php" style="color: inherit; text-decoration: underline;">Contact Us</a>
        <p style="font-style: white;">&copy;All Rights Reserved<br> 2024 Parokya ng San Juan Bautista. </p>
    </div>
</div>




</div> 
</div>
</body>
</html>
