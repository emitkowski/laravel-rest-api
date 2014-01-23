<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang='en' xml:lang='en' xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <title><{{ Config::get('app.name') }}</title>
    <meta content='text/html;charset=utf-8' http-equiv='Content-Type' />
    <style type='text/css'>

        body {font-family:Helvetica, Arial, sans-serif; color:#545454;}
        a { color: #0981be; text-decoration:underline;}
        a:hover { color: #0981be; text-decoration:none;}
        div, p, a, li, td { -webkit-text-size-adjust:none; }
        .email-border {
            width:675px;
            height:auto;
            padding:20px;
            background-color:#fff;
            border-width:3px;
            border-style: solid;
            border-color:#336799;
        }
        .grey-box {
            background-color:#ddd;
            margin-top:2px;
            -khtml-border-radius: 8px;
            -webkit-border-radius:8px;
            -moz-border-radius:8px;
            border-radius: 8px;

        }
        .curved-corners {
            -moz-border-radius:15px;
            -webkit-border-radius:15px;
            -khtml-border-radius: 15px;
            border-radius: 15px;
        }
    </style>
</head>
<body style='padding:10px;width:720px;margin:auto;'>

<table align="center" cellpadding="0" cellspacing="0" width="650px">
    <tr>
        <td>
            <p style="text-align:center;font-size:11px;font-family:Helvetica, Arial, sans-serif; color:#929292; margin:3px;">
                Be sure to add
                <a href="mailto:{{ Config::get('mail.from.address') }}" style="text-decoration: none; color: #0981be;" title="Add {{ Config::get('mail.from.address') }} to your whitelist">{{ Config::get('mail.from.address') }}</a>
                to your address book or safe sender list so our emails get to your inbox.
            </p>
        </td>
    </tr>
</table>

<table cellpadding="0" cellspacing="0">

    <tr>
        <td colspan="2">
            <div class="email-border curved-corners">

                <table width="100%">
                    <tr>
                        <td align="center"><a href="{{ Config::get('app.url') }}"><img border=0 alt="{{ Config::get('app.name') }}" src="{{ Config::get('app.url') }}/images/logo.png" /></a></td>
                    </tr>
                </table>


                <table style="background-color:#fff;color:#333;margin:10px 0 10px 0;" width="100%">
                    @include($_template)
                </table>

                <table class="grey-box" width="100%">
                    <tr>
                        <td>
                            <p style="font-family:Helvetica, Arial, sans-serif; color:#545454; font-weight:700; font-size:12px; text-align:center; line-height:16px; margin-top:10px; margin-right:10px; margin-left:10px; margin-bottom:10px;">
                                If you have any questions or need our help, please
                                <a href="{{ Config::get('app.url') }}/contact" style="color: #0981be;" title="Contact{{ Config::get('mail.from.name') }}">Contact Us</a>
                            </p>

                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>

</body>
</html>