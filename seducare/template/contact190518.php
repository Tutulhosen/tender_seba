    <?php require_once 'header.html'; ?>
    
    <!-- Start Page Title Section -->
    <div class="page-ttl" style="padding-top: 200px;">
        <div class="layer-stretch">
            <div class="page-ttl-container">
                <h1>Contact Us</h1>
                <p><a href="#">Home</a> &#8594; <span>Contact Us</span></p>
            </div>
        </div>
    </div><!-- End Page Title Section -->
    <!-- Start Contact Detail Section -->
    <div id="contact-page" class="layer-stretch">
        <div class="layer-wrapper">
            <div class="row text-center">
                <div class="col-md-6 col-lg-4 contact-info-block">
                    <div class="contact-info-inner">
                        <i class="fa fa-phone"></i>
                        <span>Call Us</span>
                        <p class="paragraph-medium paragraph-black">+ 01 1122 xxx 333</p>
                        <p>+ 01 1122 333 xxx </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 contact-info-block">
                    <div class="contact-info-inner">
                        <i class="fa fa-envelope"></i>
                        <span>Email Us</span>
                        <p class="paragraph-medium paragraph-black">info@seducare.com</p>
                        <p>info@mysoftheaven.com </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 contact-info-block">
                    <div class="contact-info-inner">
                        <i class="fa fa-map-marker"></i>
                        <span>Location</span>
                        <p class="paragraph-medium paragraph-black">19-B/2-C & 2-D, Block-F, 5th Floor</p>
                        <p class="paragraph-medium paragraph-black">Ring Road, Shymoli, Dhaka-1207. </p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Contact Detail Section -->
    
    <!-- Start Google Map Section -->
    <div id="map" style="margin-bottom: 50px;">
        <div class="map-wrapper">
            <div id="map-container"></div>
        </div>
        <div class="map-address">
            <div class="map-icon"><i class="fa fa-map-marker"></i></div>
            <div class="map-address-ttl">19-B/2-C & 2-D, Block-F, 5th Floor</div>
            <div class="paragraph-medium paragraph-black">Ring Road, Shymoli, Dhaka-1207.</div>
        </div>
    </div><!-- End Google Map Section -->
   
    <!-- Start Make an Appointment Modal -->
    <?php require_once 'demo_form.php'; ?>
    <!-- End Make an Appointment Modal -->

    
    <!-- Google Map Block Script -->
    <script>
        var map;
        function initMap() {
            var loc = {
                lat: 23.770656,
                lng: 90.359457 
            };
            var isDraggable = !('ontouchstart' in document.documentElement);

            map = new google.maps.Map(document.getElementById('map-container'), {
                center: loc,
                zoom: 14,
                draggable: isDraggable,
                scrollwheel: false
            });

            var marker = new google.maps.Marker({
                position: loc,
                map: map
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrfZFinAlOolOnn-efoKbiw3_Izg39qP4
&amp;callback=initMap" async defer></script>
   
    <!-- Start Footer Section -->
    <?php require_once 'footer.php'; ?>