<?php

$message = "<!DOCTYPE html>";
$message .= "<html lang=\"en\" xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\">";
$message .= "<head>";
$message .= "<meta charset=\"utf-8\">";
$message .= "<!-- utf-8 works for most cases -->";
$message .= "<meta name=\"viewport\" content=\"width=device-width\">";
$message .= "<!-- Forcing initial-scale shouldn't be necessary -->";
$message .= "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">";
$message .= "<!-- Use the latest (edge) version of IE rendering engine -->";
$message .= "<meta name=\"x-apple-disable-message-reformatting\">";
"<!-- Disable auto-scale in iOS 10 Mail entirely -->";
$message .= "<title>{$emailSubject}</title>";
$message .= "<!-- The title tag shows in email notifications, like Android 4.4. -->";

$message .= "<!-- Web Font / @font-face : BEGIN -->";
$message .= "<!-- NOTE: If web fonts are not required, lines 10 - 27 can be safely removed. -->";

$message .= "<!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->";
$message .= "<!--[if mso]>";
$message .= "<style>";
$message .= "* {
	font-family: sans-serif !important;
	}";
$message .= "</style>";
$message .= "<![endif]-->";

$message .= "<!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->";
$message .= "<!--[if !mso]><!-->";
$message .= "<!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> -->";
$message .= "<!--<![endif]-->";

$message .= "<!-- Web Font / @font-face : END -->";

$message .= "<!-- CSS Reset : BEGIN -->";

$message .= "<style>";

$message .= "	/* What it does: Remove spaces around the email design added by some email clients. */
	/* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
	html,
	body {
	margin: 0 auto !important;
	padding: 0 !important;
	height: 100% !important;
	width: 100% !important;
	}

	/* What it does: Stops email clients resizing small text. */
	* {
	-ms-text-size-adjust: 100%;
	-webkit-text-size-adjust: 100%;
	}

	/* What it does: Centers email on Android 4.4 */
	div[style*=\"margin: 16px 0\"] {
	margin: 0 !important;
	}

	/* What it does: Stops Outlook from adding extra spacing to tables. */
	table,
	td {
	mso-table-lspace: 0pt !important;
	mso-table-rspace: 0pt !important;
	}

	/* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
	table {
	border-spacing: 0 !important;
	border-collapse: collapse !important;
	table-layout: fixed !important;
	margin: 0 auto !important;
	}
	table table table {
	table-layout: auto;
	}

	/* What it does: Uses a better rendering method when resizing images in IE. */
	img {
	-ms-interpolation-mode:bicubic;
	}

	/* What it does: A work-around for email clients meddling in triggered links. */
	*[x-apple-data-detectors],  /* iOS */
	.x-gmail-data-detectors,    /* Gmail */
	.x-gmail-data-detectors *,
	.aBn {
	border-bottom: 0 !important;
	cursor: default !important;
	color: inherit !important;
	text-decoration: none !important;
	font-size: inherit !important;
	font-family: inherit !important;
	font-weight: inherit !important;
	line-height: inherit !important;
	}

	/* What it does: Prevents Gmail from displaying an download button on large, non-linked images. */
	.a6S {
	display: none !important;
	opacity: 0.01 !important;
	}
	/* If the above doesn't work, add a .g-img class to any image in question. */
	img.g-img + div {
	display: none !important;
	}

	/* What it does: Prevents underlining the button text in Windows 10 */
	.button-link {
	text-decoration: none !important;
	}

	/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
	/* Create one of these media queries for each additional viewport size you'd like to fix */

	/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
	@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
	.email-container {
	min-width: 320px !important;
	}
	}
	/* iPhone 6, 6S, 7, 8, and X */
	@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
	.email-container {
	min-width: 375px !important;
	}
	}
	/* iPhone 6+, 7+, and 8+ */
	@media only screen and (min-device-width: 414px) {
	.email-container {
	min-width: 414px !important;
	}
	}";

$message .= "</style>";

$message .= "<!-- CSS Reset : END -->";

$message .= "<!-- Progressive Enhancements : BEGIN -->";
$message .= "<style>";

$message .= "/* What it does: Hover styles for buttons */";
$message .= ".button-td,
	.button-a {
	transition: all 100ms ease-in;
	}
	.button-td:hover,
	.button-a:hover {
	background: #555555 !important;
	border-color: #555555 !important;
	}

	/* Media Queries */
	@media screen and (max-width: 600px) {

	.email-container {
	width: 100% !important;
	margin: auto !important;
	}

	/* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
	.fluid {
	max-width: 100% !important;
	height: auto !important;
	margin-left: auto !important;
	margin-right: auto !important;
	}

	/* What it does: Forces table cells into full-width rows. */
	.stack-column,
	.stack-column-center {
	display: block !important;
	width: 100% !important;
	max-width: 100% !important;
	direction: ltr !important;
	}
	/* And center justify these ones. */
	.stack-column-center {
	text-align: center !important;
	}

	/* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
	.center-on-narrow {
	text-align: center !important;
	display: block !important;
	margin-left: auto !important;
	margin-right: auto !important;
	float: none !important;
	}
	table.center-on-narrow {
	display: inline-block !important;
	}

	/* What it does: Adjust typography on small screens to improve readability */
	.email-container p {
	font-size: 17px !important;
	}
	}";

$message .= "</style>";
$message .= "<!-- Progressive Enhancements : END -->";

$message .= "<!-- What it does: Makes background images in 72ppi Outlook render at correct size. -->";
$message .= "<!--[if gte mso 9]>";
$message .= "<xml>
	<o:OfficeDocumentSettings>
	<o:AllowPNG/>
	<o:PixelsPerInch>96</o:PixelsPerInch>
	</o:OfficeDocumentSettings>
	</xml>";
$message .= "<![endif]-->";

$message .= "</head>";

$message .= "<body width=\"100%\" style=\"margin: 0; mso-line-height-rule: exactly;\">";
$message .= "<center style=\"width: 100%; background-color: #ffffff; text-align: left;\">";
$message .= "<!--[if mso | IE]>";
$message .= "<table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" bgcolor=\"#121213\" style=\"background-color: #121213;\">";
$message .= "<tr>";
$message .= "<td>";
$message .= "<![endif]-->";

$message .= "<!-- Visually Hidden Preheader Text : BEGIN -->";
$message .= "<div style=\"display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;\">";
$message .= $emailSubSubject;
$message .= "</div>";
$message .= "<!-- Visually Hidden Preheader Text : END -->";

$message .= "<!-- Email Header : BEGIN -->";
$message .= "<!-- Logo Region Table Begins -->";
$message .= "<table role=\"presentation\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"600\" style=\"margin: auto; background-color:#121213; \" class=\"email-container\">";
$message .= "<tr bgcolor=\"#121213\">";
$message .= "<td style=\"padding: 20px 0; text-align: center\" >";
$message .= "<img src=\"{$this->m_controller->m_image_directory}logo/wheelies-logo.png\" width=\"130\" height=\"31\" alt=\"TropMe's Logo\" border=\"0\" style=\"height: auto; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;\">";
// background: #dddddd;
$message .= "</td>";
$message .= "</tr>";
$message .= "</table>";
$message .= "<!-- Logo Region Table End -->";

$message .= "<!-- Email Header : END -->";

$message .= "<!-- Email Body : BEGIN -->";

$message .= "<table role=\"presentation\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"600\" style=\"margin: auto;\" class=\"email-container\">";

$message .= "<tr>";
$message .= "<td bgcolor=\"#ffffff\" style=\"padding: 20px 20px; text-align: center;\">";
$message .= "<h1 style=\"margin: 0; font-family: sans-serif; font-size: 24px; line-height: 125%; color: #333333; font-weight: normal;\">";
$message .= "New Subscriber Information";
$message .= "</h1>";
$message .= "</td>";
$message .= "</tr>";

$message .= "<tr>";
$message .= "<td td bgcolor=\"#ffffff\" style=\"padding: 0 20px 20px; font-family: sans-serif; font-size: 16px; line-height: 140%; color: #121213; text-align: center;\">";
$message .= "<div>";
$message .= "Hi webmaster,";
$message .= "<br>";
$message .= "Please find new subscriber information below.";
$message .= "</div>";
$message .= "</td>";
$message .= "</tr>";

$message .= "<tr>";
$message .= "<td bgcolor=\"#ffffff\" style=\"padding: 0 20px 20px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #121213; text-align: center;\">";

$message .= "<div>";

$message .= "<p style=\"margin: 0;\">";
$message .= "Name: " . $fullName;
$message .= "</p>";

$message .= "<p style=\"margin: 0;\">";
$message .= "Email: " . $email;
$message .= "</p>";

$message .= "</div>";
$message .= "</td>";
$message .= "</tr>";

$message .= "<!-- 1 Column Text + Button : END -->";

$message .= "</table>";
$message .= "<!-- Email Body : END -->";

$message .= "<!-- Email Footer : BEGIN -->";
$message .= "<table role=\"presentation\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"100%\" style=\"max-width: 680px; font-family: sans-serif; color: #121213; font-size: 12px; line-height: 140%; padding-top:40px;\">";

$message .= "<tr>";
$message .= "<td bgcolor=\"#121213\" style=\"padding: 20px 10px; width: 100%; font-family: sans-serif; font-size: 12px; line-height: 140%; text-align: center; color: #ffffff;\" class=\"x-gmail-data-detectors\">";
$message .= "This e-mail is automatically generated. Please do not reply to this message.";
$message .= "<br>";
$message .= "TrophMe is the trading name of Trophme Limited, a company registered in England and Wales (No. 11190882).";
$message .= "<br>";
$message .= "</td>";
$message .= "</tr>";

$message .= "<tr>";
$message .= "<td style=\"padding: 20px 0; text-align: center\">";
$message .= "<img src=\"{$this->m_controller->m_image_directory}about-page-top-banner.jpg\" width=\"53\" height=\"66\" alt=\"TropMe Icon\" border=\"0\" style=\"height: auto; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;\">";
$message .= "</td>";
$message .= "</tr>";

$message .= "</table>";
$message .= "<!-- Email Footer : END -->";

$message .= "<!--[if mso | IE]>";
$message .= "</td>";
$message .= "</tr>";
$message .= "</table>";
$message .= "<![endif]-->";
$message .= "</center>";
$message .= "</body>";

$message .= "</html>";