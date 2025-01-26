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
            <div class="row">
                <div class="col-md-5">
                    <div class="row text-center">
                        <div class="col-md-12 col-lg-12 contact-info-block">
                            <div class="contact-info-inner">
                                <div class="row">
                                    <div class="col-md-6">
                                        <i class="fa fa-phone"></i>
                                        <span>Call Us</span>
                                        <p class="paragraph-medium paragraph-black">+ 01 1122 xxx 333</p>
                                        <p>+ 01 1122 333 xxx </p>
                                    </div>
                                    <div class="col-md-6">                                
                                        <i class="fa fa-envelope"></i>
                                        <span>Email Us</span>
                                        <p class="paragraph-medium paragraph-black">info@seducare.com</p>
                                        <p>info@mysoftheaven.com </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">                              
                                        <hr>
                                        <i class="fa fa-map-marker"></i>
                                        <span>Location</span>
                                        <p class="paragraph-medium paragraph-black">19-B/2-C & 2-D, Block-F, 5th Floor</p>
                                        <p class="paragraph-medium paragraph-black">Ring Road, Shymoli, Dhaka-1207. </p>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div class="modal-header text-center">
                        <h5 class="modal-title">Quick Contact</h5>
                    </div>
                    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                                    <i class="fa fa-user-o"></i>
                                    <input class="mdl-textfield__input" type="text" id="name">
                                    <label class="mdl-textfield__label" for="name">Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                                    <i class="fa fa-phone"></i>
                                    <input class="mdl-textfield__input" type="text" id="mobile">
                                    <label class="mdl-textfield__label" for="mobile">Mobile Number</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label form-input-icon">
                                    <i class="fa fa-hospital-o"></i>
                                    <input class="mdl-textfield__input" type="text" id="address_designation">
                                    <label class="mdl-textfield__label" for="address_designation">Address</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label form-input-icon">
                                    <i class="fa fa-hospital-o"></i>
                                    <input class="mdl-textfield__input" type="text" id="message">
                                    <label class="mdl-textfield__label" for="message">Message</label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center pt-4">
                            <button class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-button--raised button button-primary button-lg">Submit</button>
                        </div>
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