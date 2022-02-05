<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
</head>
<body style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -webkit-text-size-adjust: none; background-color: #ffffff; color: #000; height: 100%; line-height: 1.4; margin: 0; padding: 0; width: 100% !important;">
<style>
    @media  only screen and (max-width: 600px) {
        .inner-body {
            width: 100% !important;
        }

        .footer {
            width: 100% !important;
        }
    }

    @media  only screen and (max-width: 500px) {
        .button {
            width: 100% !important;
        }
    }
</style>
<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; background-color: #000; margin: 0; padding: 0; width: 100%;"><tr>
        <td align="center" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">
            <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; margin: 0; padding: 0; width: 100%;">
                <tr>
                    <td class="header" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; padding: 25px 0; text-align: center;">
                        <a href="http://kansasplantfarm.com/" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3d4852; font-size: 19px; font-weight: bold; text-decoration: none; display: inline-block;">
                            <img src="https://kansasplantfarm.com/plants_images/logo_top.png" alt="Kansas Plant Farm">
                        </a>
                    </td>
                </tr>
                <!-- Email Body --><tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; background-color: #000; border-bottom: 1px solid #000; border-top: 1px solid #000; margin: 0; padding: 0; width: 100%;">
                        <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px; background-color: #ffffff; border-color: #e8e5ef; border-radius: 2px; border-width: 1px; box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025), 2px 4px 0 rgba(0, 0, 150, 0.015); margin: 0 auto; padding: 0; width: 570px;">
                            <!-- Body content --><tr>
                                <td class="content-cell" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; padding: 32px;">

                                    <p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">

                                        Hi {{ $firstName }},<br/><br/>

                                    Thank you for scheduling an appointment to visit! This will help our staff dedicate our time to helping you. Please be on-time to your scheduled appointment. If it is the same day, please text us at 785-218-7475.<br/><br/>

                                    We have scheduled your appointment visit the following Date & Time:<br/><br/>

                                    Appointment Date: {{ date('l, F j',strtotime($date)) }}<br/>
                                    Appointment Time: {{ $time }}<br/><br/>


                                    If you need to cancel, follow this cancellation link:<br/>

                                        <a href="{{ $cancellationURL }}" target="_blank">Cancellation Link</a>
                                    </p>


                                    <p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
                                        <b>VISITING OUR PRIVATE BACKYARD NURSERY:</b>
                                        We are not open to the public except during published open hours, advertised plant sales and certain days in which we are open by appointment only for private shopping. To keep our prices reasonable, we have limited hours and staff and can only help a couple person at a time so if we get a rush of other customers, please be patient. We sell specialty plants that are not commonly found at the big box stores and cannot handle big crowds of shoppers at one time in our quiet neighborhood setting.
                                        When visiting, please park in our parking areas or in the cul-de-sac along the street. Please don't block in other cars or driveway entrances. Please be courteous and conscious of any loud noises you may be creating that might disturb the neighborhood. Pets are ok if on leash and not barking. It is very easy to get lost in the plants so children are ok if they stay with you and are not running freely or climbing on anything. Please do not let your car alarm go off while visiting. We do have a public port-a-potty restroom. Masks are optional and social distancing is an easy option in our open outdoor environment. If it starts raining hard, lightning or other unpredictable weather, we may close without notice as we do not have a public indoor covered area.
                                    </p>


                                    <p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
                                        <b>BUYING PLANTS:</b>
                                        We grow thousands of locally grown specialty plants. We also grow perennials, shrubs, trees, grasses, bamboos, edible plants, cold-hardy tropical plants, xeriscape plants, butterfly plants, native plants, house plants, patio plants, cacti-succulents, dry-shade plants and unusual/rare plants. Most of our plants are 99% organically grown and pesticides are not needed or rarely used. Our plants are grown in a natural topsoil mix to promote faster establishment when planted in your landscape.  We do not really have an exact published availability list but most items are available most of the time. Our website is updated periodically and most items you you see here or purchased on-line will be available. If an item is accidently over purchased or sold out, you will be refunded on that portion if you paid on-line. Many items are not priced in the farm but during your shopping appointment, we are able to quote prices. You may also download our price list or be furnished with a copy when visiting. Please check our website for any other days we are open to the public.
                                    </p>



                                    <p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
                                        <b>PAYMENTS FORMS ACCEPTED:</b>
                                        Most payments are completed on-line thru out payment gateway. Gift cards are available for shopping appointments. At the nursery, we accept cash, check, gift certificates, and credit cards. Payment is due at time of delivery or before you leave the nursery with your plants. You may also purchase plants on-line, check out on our secure KansasPlantFarm.com website, and pick out your plants in person during this scheduled time. We are exploring the option to add delivery and shipping but not at this time.
                                    </p>

                                    <p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
                                        Ryan D.<br/>
                                        Nursery Manager<br/>
                                        kansasplantfarm@gmail.com
                                    </p>





                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">
                        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px; margin: 0 auto; padding: 0; text-align: center; width: 570px;"><tr>
                                <td class="content-cell" align="center" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; padding: 32px;">
                                    <p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; line-height: 1.5em; margin-top: 0; color: #b0adc5; font-size: 12px; text-align: center;">© 2021 Kansas Plant Farm. All rights reserved.</p>

                                </td>
                            </tr></table>
                    </td>
                </tr>
            </table>
        </td>
    </tr></table>
</body>
</html>

