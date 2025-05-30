<!DOCTYPE html>
<html lang="en" style="font-family: Arial, sans-serif; background-color: #f7f7f7; padding: 20px; margin: 0;">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Thank You Email</title>
</head>
<body style="background-color: #f7f7f7; margin: 0; padding: 0;">
<table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    <tr>
        <td class="header-bg" style="position: relative; padding: 40px 20px; text-align: center; background-color: #004aad; background-image: url('https://www.bsigroup.com/globalassets/localfiles/1400x585/amazon-river-1400x585-reversed.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 74, 173, 0.7); z-index: 1;"></div>
            <div style="position: relative; z-index: 2;">
                <h1 style="margin: 0; font-size: 32px; font-weight: bold; color: #ffffff; font-family: Arial, Helvetica, sans-serif; letter-spacing: 3px; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);" class="mobile-header">AVE</h1>
            </div>
        </td>
    </tr>
    <tr>
        <td style="padding: 30px; color: #333333;">
            <h2 style="font-weight: normal; margin-top: 0;">Thank you for contacting us, {{ $mailData['name'] }}!</h2>
            <p style="font-size: 16px; line-height: 1.5;">We have received your message and will get back to you shortly.</p>

            <hr style="border: none; border-top: 1px solid #dddddd; margin: 20px 0;" />

            <p style="font-weight: bold; font-size: 16px; margin-bottom: 5px;">Your Message:</p>
            <p style="font-size: 16px; line-height: 1.5; background: #f1f1f1; padding: 15px; border-radius: 5px;">{{ $mailData['body'] }}</p>

            <p style="margin-top: 30px; font-size: 14px; color: #777;">Best regards,<br />The AVE Team</p>
        </td>
    </tr>
    <tr style="background-color: #f7f7f7; text-align: center; font-size: 12px; color: #999; padding: 15px;">
        <td style="padding: 15px;">
            © {{ date('Y') }} AVE. All rights reserved.<br />
            No 18E0 St.K4B Phumi, Trung Morn St, Phnom Penh, Cambodia
        </td>
    </tr>
</table>
</body>
</html>
