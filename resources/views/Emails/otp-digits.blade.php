<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your OTP</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f4f6f8; margin:0; padding:20px;">
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff; border-radius:8px; padding:24px;">
                    <tr>
                        <td style="text-align:center;">
                            <h1 style="margin:0 0 8px; font-size:22px; color:#111;">Your One-Time Password (OTP)</h1>
                            <p style="margin:0 0 18px; color:#666; font-size:14px;">
                                Use the code below to complete your action. This code is valid for {{ $expiresIn ?? '10 minutes' }}.
                            </p>

                            @php
                                $digits = str_split((string) ($otp ?? ''));
                            @endphp

                            <div style="margin:18px 0; text-align:center;">
                                @foreach($digits as $d)
                                    <span style="
                                        display:inline-block;
                                        width:48px;
                                        height:48px;
                                        line-height:48px;
                                        margin:0 6px;
                                        font-size:20px;
                                        font-weight:700;
                                        color:#111;
                                        background:#f7fafc;
                                        border:1px solid #e3e8ef;
                                        border-radius:6px;
                                    ">
                                        {{ $d }}
                                    </span>
                                @endforeach
                            </div>

                            <p style="margin:12px 0 0; color:#666; font-size:13px;">
                                If you did not request this, please ignore this email or contact support.
                            </p>

                            <p style="margin:18px 0 0; font-size:13px; color:#999;">
                                Or copy this code: <strong style="color:#111;">{{ $otp ?? '' }}</strong>
                            </p>
                        </td>
                    </tr>
                </table>

                <p style="margin-top:12px; font-size:12px; color:#999;">
                    © {{ date('Y') }} Your Company
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
