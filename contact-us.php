<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>         
            <!-- breadcrumb start -->
            <div class="breadcrumb-area">
                <div class="container-fluid text-center">
                    <div class="breadcrumb-stye gray-bg ptb-100">
                        <h2 class="page-title">contact us</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li class="active">contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- breadcrumb end -->
            <!-- contact-area start -->
            <div class="contact-area ptb-100">
                <div class="container-fluid map-contact">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-12 text-center">
                            <div class="contact-from gray-bg">
                                <form id="contact-form" action="contact-us.php" method="post">
                                    <input name="name" type="text" placeholder="Name">
                                    <input name="email" type="email" placeholder="Email">
                                    <textarea name="message" placeholder="Your message"></textarea>
                                    <button class="submit" name="submit" type="submit">Send Massage</button>
                                </form>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                        <?php
                        
                        if(isset($_POST['submit'])) {
                         //Admin receives email through this code
                            $sender_name = escape_string($_POST['name']);
                            $sender_email = escape_string($_POST['email']);
                            $sender_message = escape_string($_POST['message']);

                            $receiver_email = "iradisavljevic168@gmail.com";

                            mail($receiver_email,$sender_name,$sender_email,$sender_message);

                            //Send email to sender through this code//

                            $email = $_POST['email'];
                            $message = "I shall get you soon,thanks for sending us email";
                            $from = "iradisavljevic168@gmail.com";

                            mail($email,$message,$from);

                            echo "<h2 align='center'>Your message has been sent successfully</h2>";
                        }
                        
                        
                        ?>
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="communication contact-from">
                                <div class="single-communication">
                                    <div class="communication-icon">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                    </div>
                                    <div class="communication-text">
                                        <h3>Address:</h3>
                                        <p>Miata 309 S Main St,Stafford, KS 67578</p>
                                    </div>
                                </div>
                                <div class="single-communication">
                                    <div class="communication-icon">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </div>
                                    <div class="communication-text">
                                        <h3>Phone:</h3>
                                        <p>0123 456 789   -   15 2368 4597</p>
                                    </div>
                                </div>
                                <div class="single-communication">
                                    <div class="communication-icon">
                                        <i class="fa fa-fax" aria-hidden="true"></i>
                                    </div>
                                    <div class="communication-text">
                                        <h3>Fax:</h3>
                                        <p>0123 456 789   -   15 2368 4597</p>
                                    </div>
                                </div>
                                <div class="single-communication">
                                    <div class="communication-icon">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="communication-text">
                                        <h3>Email:</h3>
                                        <p><a href="https://bootexperts.com/support/login.php">support.center@gmail.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-map pb-100">
                <div id="hastech"></div>
            </div>
            <!-- contact-area end -->

            <?php require_once("includes/footer.php"); ?>
            
        <!-- google map api -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_qDiT4MyM7IxaGPbQyLnMjVUsJck02N0"></script>
        <script>
            var myCenter=new google.maps.LatLng(30.249796, -97.754667);
            function initialize()
            {
                var mapProp = {
                    center:myCenter,
                    scrollwheel: false,
                    zoom:15,
                    mapTypeId:google.maps.MapTypeId.ROADMAP
                };
                var map=new google.maps.Map(document.getElementById("hastech"),mapProp);
                var marker=new google.maps.Marker({
                    position:myCenter,
                    animation:google.maps.Animation.BOUNCE,
                    icon:'assets/img/map-marker.png',
                    map: map,
                });
                var styles = [
                    {
                        stylers: [
                            { hue: "#c5c5c5" },
                            { saturation: -100 }
                        ]
                    },
                ];
                map.setOptions({styles: styles});
                marker.setMap(map);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
