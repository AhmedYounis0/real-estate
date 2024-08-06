<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <h2 class="heading">Important Links</h2>
                    <ul class="useful-links">
                        <li><a href="">Home</a></li>
                        <li><a href="">Properties</a></li>
                        <li><a href="">Agents</a></li>
                        <li><a href="">Blog</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <h2 class="heading">Locations</h2>
                    <ul class="useful-links">
                        <li><a href="">New York</a></li>
                        <li><a href="">Boston</a></li>
                        <li><a href="">Orlanco</a></li>
                        <li><a href="">Los Angeles</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <h2 class="heading">Contact</h2>
                    <div class="list-item">
                        <div class="left">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="right">
                            34 Antiger Lane, USA, 12937
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="right">contact@arefindev.com</div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="right">122-222-1212</div>
                    </div>
                    <ul class="social">
                        <li>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="fab fa-pinterest-p"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <h2 class="heading">Newsletter</h2>
                    <p>
                        To get the latest news from our website, please
                        subscribe us here:
                    </p>
                    <form id="subscribeForm" action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <input type="submit" id="subscribeBtn" class="btn btn-primary" value="Subscribe Now">
                        </div>
                    </form>
                    <div id="message"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="copyright">
                    Copyright 2023, ArefinDev. All Rights Reserved.
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="right">
                    <ul>
                        <li><a href="terms.html">Terms of Use</a></li>
                        <li>
                            <a href="privacy.html">Privacy Policy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#subscribeForm').submit(function(event) {
            // Prevent the default form submission
            event.preventDefault();

            // Serialize form data
            var formData = $(this).serialize();

            // AJAX request
            $.ajax({
                url: '/subscribers', // Ensure this URL matches your route
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Handle the response from the server
                    if (response.status === 'success') {
                        $('#message').html('<div class="alert alert-success">' + response.message + '</div>');
                        $('#subscribeForm')[0].reset(); // Clear the form fields
                    }
                },
                error: function(xhr, status, error) {
                    var response = xhr.responseJSON;
                    if (response.status === 'error') {
                        // Handle validation errors
                        var errorMessages = '';
                        $.each(response.errors, function(key, value) {
                            errorMessages += '<div class="alert alert-danger">' + value[0] + '</div>';
                        });
                        $('#message').html(errorMessages);
                    } else {
                        console.error(error);
                    }
                }
            });
        });
    });
</script>
