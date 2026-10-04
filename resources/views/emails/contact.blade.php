<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ $setting->site_name }}</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f3f6f9;
            font-family: Arial, Helvetica, sans-serif;
            color: #333333;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .email-wrapper {
            width: 100%;
            padding: 35px 15px;
            background: #f3f6f9;
        }

        .email-container {
            max-width: 700px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        }

        .email-header {
            background: #155a88;
            padding: 22px 20px;
            text-align: center;
        }

        .email-header img {
            max-height: 45px;
            max-width: 220px;
        }

        .email-title {
            padding: 25px 30px 10px;
        }

        .email-title h1 {
            margin: 0;
            color: #155a88;
            font-size: 24px;
            font-weight: 600;
        }

        .email-title p {
            margin: 7px 0 0;
            color: #777777;
            font-size: 14px;
        }

        .content {
            padding: 10px 30px 30px;
        }

        .details-table {
            width: 100%;
            border: 1px solid #e1e7ec;
        }

        .details-table td {
            border-bottom: 1px solid #e1e7ec;
            padding: 13px 15px;
            font-size: 14px;
            vertical-align: top;
        }

        .details-table tr:last-child td {
            border-bottom: none;
        }

        .label {
            width: 28%;
            background: #f5f8fa;
            color: #155a88;
            font-weight: 600;
        }

        .value {
            color: #444444;
            background: #ffffff;
        }

        .message {
            line-height: 1.6;
        }

        .thank-you {
            margin: 25px 0 0;
            color: #555555;
            font-size: 14px;
        }

        .email-footer {
            padding: 18px 30px;
            background: #155a88;
            text-align: center;
            color: #ffffff;
            font-size: 12px;
        }

        @media only screen and (max-width: 600px) {
            .email-wrapper {
                padding: 15px 8px;
            }

            .email-title,
            .content {
                padding-left: 18px;
                padding-right: 18px;
            }

            .details-table td {
                padding: 11px 10px;
                font-size: 13px;
            }

            .label {
                width: 32%;
            }
        }
    </style>
</head>

<body>

    <div class="email-wrapper">

        <div class="email-container">

            <!-- Header -->
            <div class="email-header">
                <img src="{{ asset('themes-assets/assets/img/logo-ondark.png') }}" alt="{{ $setting->site_name }}">
            </div>

            <!-- Title -->
            <div class="email-title">
                <h1>New Contact Enquiry</h1>
                <p>You have received a new enquiry from your website.</p>
            </div>

            <!-- Content -->
            <div class="content">

                <table class="details-table">

                    <tr>
                        <td class="label">Name</td>
                        <td class="value">
                            {{ $firstname }} {{ $lastname }}
                        </td>
                    </tr>

                    <tr>
                        <td class="label">Phone</td>
                        <td class="value">
                            {{ $phone }}
                        </td>
                    </tr>

                    <tr>
                        <td class="label">Email</td>
                        <td class="value">
                            {{ $email }}
                        </td>
                    </tr>

                    <tr>
                        <td class="label">Company</td>
                        <td class="value">
                            {{ $company }}
                        </td>
                    </tr>

                    <tr>
                        <td class="label">Message</td>
                        <td class="value message">
                            {{ $comments }}
                        </td>
                    </tr>

                </table>

                <p class="thank-you">
                    Thank you,<br>
                    <strong>{{ $setting->site_name }}</strong>
                </p>

            </div>

            <!-- Footer -->
            <div class="email-footer">
                {{ $setting->site_name }} &nbsp;|&nbsp; Contact Enquiry
            </div>

        </div>

    </div>

</body>

</html>
