<!--=================================
footer -->
<footer class="footer">
    <div class="footer-bottom bg-dark mt-5">
        <div class="container">
            <div class="row">
{{--                <div class="col-md-4 text-center text-md-right mt-4 mt-md-0">
                    <div class="d-flex justify-content-md-start justify-content-center">
                        <ul class="list-unstyled d-flex mb-0">
                            <li class="text-white"><a href="about-us">About</a></li>
                            <li><a href="our_team">Team</a></li>
                            <li><a href="contact-us">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 text-center  mt-4 mt-md-0 ">
                    <a href="https://www.facebook.com/saifmanpoweroffical/"> <i class="fab fa-facebook-f fa-3x text-white mr-3"></i></a>
                    <a href="https://www.youtube.com/channel/UCd7TVnWdLi2atk2Z64dh9Bg"> <i class="fab fa-youtube fa-3x text-white mr-3"></i></a>
                    <a href='https://wa.me/+923314852221' target='_blank'><i class= "fab fa-whatsapp fa-3x text-white"></i></a>

                </div>--}}
                {{--<div class="col-md-12 text-center text-white text-md-right mt-4 mt-md-0">--}}
                <div class="col-md-12 text-center text-white  mt-4 mt-md-0">
                    <p class="mb-0"> &copy;Copyright <span id="copyright"> <?= date('Y')?></span>
                        {{getSettingValue('company_name')}}  All Rights Reserved </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--=================================
footer-->

<!--=================================
Back To Top-->
<div id="back-to-top" class="back-to-top">
    <i class="fas fa-angle-up"></i>
</div>
<!--=================================
Back To Top-->


<!--=================================
Javascript -->

<!-- JS Global Compulsory (Do not remove)-->
<script src="{{ asset('front_end/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('front_end/js/popper/popper.min.js') }}"></script>
<script src="{{ asset('front_end/js/bootstrap/bootstrap.min.js') }}"></script>

<!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
<script src="{{ asset('front_end/js/jquery.appear.js') }}"></script>
<script src="{{ asset('front_end/js/counter/jquery.countTo.js') }}"></script>
<script src="{{ asset('front_end/js/owl-carousel/owl-carousel.min.js') }}"></script>

<!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
<script src="{{ asset('front_end/js/select2/select2.full.js') }}"></script>
@stack('script')

<!--Floating WhatsApp javascript-->
{{--<script type="text/javascript"--}}
{{--        src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js"></script>--}}


<!-- Template Scripts (Do not remove)-->
<script src="{{ asset('front_end/js/custom/custom.js') }}"></script>
<script src="{{ asset('front_end/js/custom.js') }}"></script>


</body>

</html>
