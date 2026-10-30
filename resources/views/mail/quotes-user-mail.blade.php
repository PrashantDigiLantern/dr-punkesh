<table class='email-container' style='margin: auto;' role='presentation' border='0' width='600' cellspacing='0' cellpadding='0' align='center'>
        <tbody>
                <tr>
                        <td style='padding: 10px 0; text-align: center;'>
                                <img style='height: 100; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;' src='{{$details["logo"]}}' alt='alt_text' border='0' />
                        </td>
                </tr>
        </tbody>
</table>
<!-- Email Header : END -->
<p>&nbsp;</p>
<!-- Email Body : BEGIN -->
<table class='email-container' style='margin: auto;' role='presentation' border='0' width='600' cellspacing='0' cellpadding='0' align='center'>
        <tbody>
                <tr>
                        <td style='padding: 40px 40px 20px; text-align: center;' bgcolor='#ffffff'>
                                <h1 style='margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #333333; font-weight: normal;'>Thank you for Quotes</h1>
                        </td>
                </tr>
                <tr>
                        <td style='font-family: sans-serif; font-size: 15px; line-height: 24px; color: #555555; text-align: center;' bgcolor='#ffffff'>
                                <p style='margin: 0;'>One of our team members shall get in touch with you shortly. If you would like to speak with someone immediately, connect with us on: 
                                <a href='{{"tel:+".$details["primarycountrycode"]."-".$details["primaryphone"]}}'>+{{$details["primarycountrycode"]}}-{{$details["primaryphone"]}}</a>
                                @if(isset($details["secondarycountrycode"])), <a href='{{"tel:+".$details["secondarycountrycode"]."-".$details["secondaryphone"]}}'>+{{$details["secondarycountrycode"]}}-{{$details["secondaryphone"]}}</a>
                                @endif 
                                <a href='{{"mailto:".$details["email"]}}'>{{$details["email"]}}</a></p>
                        </td>
                </tr>
                <tr>
                        <td style='padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: center;' bgcolor='#ffffff'>
                                <p style='margin: 0;'>Stay connected with us for updates!</p>
                        </td>
                </tr>
                <tr>
                        <td style='padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;' bgcolor='#ffffff'>
                                <table style='margin: auto; margin-top: -24px;' role='presentation' border='0' cellspacing='0' cellpadding='0' align='center'>
                                        <tbody>
                                                <tr>
                                                        <td class='button-td' style='border-radius: 3px; background: #000; text-align: center;'><a class='button-a' style='background: #000; border: 15px solid #000; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;' href='{{$details["url"]}}' target='_blank' rel='noopener'> &nbsp;&nbsp;&nbsp;&nbsp;<span style='color: #ffffff;'>Go to Website</span>&nbsp;&nbsp;&nbsp;&nbsp; </a></td>
                                                </tr>
                                        </tbody>
                                </table>
                        </td>
                </tr>
        </tbody>
</table>