<style>
            #section-contact {
                background-image: url({{asset('images/works.png')}});
            }

            @media only screen and (-Webkit-min-device-pixel-ratio: 1.5),
            only screen and (-moz-min-device-pixel-ratio: 1.5),
            only screen and (-o-min-device-pixel-ratio: 3/2),
            only screen and (min-device-pixel-ratio: 1.5) {
                #section-contact {
                    background-image: url({{asset('images/works@2x.png')}});
                }
            }

            ;
        </style>
        <section id="section-contact" class="page-area vg-section-image vg-color-1">
            <div class="wrapper">
                <hgroup class="title vg-white-force">
                @if(isset($catContact))
                    <h1><strong>{{$catContact->title}}</strong></h1>
                    <p>{{$catContact->description}}</p>
                    @endif
                </hgroup>
                <div class="contactform"> <span class="error"></span> <span class="error"></span> <span
                        class="error"></span> <span class="error"></span>
                    <form id="contactForm" method="post" action="">
                        <input type="hidden" name="emailto1" value="mail" />
                        <input type="hidden" name="emailto2" value="nomail.com" />
                        <input type="text" name="contactName" id="contactName" class="requiredField" value=""
                            placeholder="Your Name" />
                        <input type="text" name="email" id="email" value="" class="requiredField email"
                            placeholder="Your Email" />
                        <textarea class="requiredField" name="comments" id="comments" placeholder="Message"></textarea>
                        <input type="hidden" name="submitted" id="submitted" value="true" />
                        <div class="clearfix"></div>
                        <button type="submit" name="submit" id="submitMsg" class="large_btn contact-btn">Submit</button>
                    </form>
                    <div id="note"></div>
                </div>
                @if(isset($setting))
                <div class="contactinfo">
                    <div class="vg-white-force">
                       {!!$setting->description!!}
                        <div class="contactway"> Name: {{$setting->linkedin}}<br />
                            Tel:{{$setting->hotline}}<br />
                            Address: {{$setting->address}} </div>
                        
                    </div>

                </div>
                @endif
                <script>
                    // mail-form
                    jQuery(document).ready(function () {
                        jQuery("#contactForm").submit(function () {
                            var str = jQuery(this).serialize();

                            jQuery.ajax({
                                type: "POST",
                                url: "https://simplekey.htmgarcia.com/modules/mod_circle_contact/ajax/send.php",
                                data: str,
                                success: function (msg) {

                                    jQuery("#note").ajaxComplete(function (event, request, settings) {
                                        if (msg == 'OK') {
                                            result = '<p style="color:green;">Thanks! Your email was successfully sent. I check my email all the time, so I should be in touch soon.</p>';
                                        }
                                        else {
                                            result = '<p style="color:red;">You must complete all fields in order to send the message. Remember use a valid email addrees.</p>';
                                        }

                                        jQuery(this).html(result).fadeIn("slow");
                                        jQuery(this).html(result);

                                    });
                                    //alert(msg);

                                }

                            });
                            return false;
                        });
                    });
                </script>
            </div>
        </section>