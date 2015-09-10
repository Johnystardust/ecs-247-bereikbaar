<?php

$primary_color 		= get_field('option_primary_color', 'option');
$secundary_color 	= get_field('option_secondary_color', 'option');
$tertiary_color 	= get_field('option_tertiary_color', 'option');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>E-consult</title>
	<style>
		.color-1 {
			color: <?php echo $primary_color; ?>;
		}

		.color-2 {
			color: <?php echo $secundary_color; ?>;
		}

		a {
		    color: <?php echo $secundary_color; ?>;
		}

		.btn {
			background-color: <?php echo $primary_color; ?>;
		}

		* {
		    margin: 0;
		    padding: 0;
		}
		* {
		    font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
		}
		img {
		    max-width: 100%;
		}
		.collapse {
		    margin: 0;
		    padding: 0;
		}
		body {
		    -webkit-font-smoothing: antialiased;
		    -webkit-text-size-adjust: none;
		    width: 100%!important;
		    height: 100%;
		}
		.btn {
		    text-decoration: none;
		    color: #FFF;
		    /*background-color: #666;*/
		    padding: 10px 16px;
		    font-weight: bold;
		    margin-right: 10px;
		    text-align: center;
		    cursor: pointer;
		    display: inline-block;
		}
		table.head-wrap {
		    width: 100%;
		}
		.mail-header.container table td.logo {
		    padding: 15px;
		}
		.mail-header.container table td.label {
		    padding: 15px;
		    padding-left: 0px;
		}
		table.body-wrap {
		    width: 100%;
		}
		table.footer-wrap {
		    width: 100%;
		    clear: both!important;
		}
		.footer-wrap .container td.content p {
		    border-top: 1px solid rgb(215, 215, 215);
		    padding-top: 15px;
		}
		.footer-wrap .container td.content p {
		    font-size: 10px;
		    font-weight: bold;
		}
		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
		    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
		    line-height: 1.1;
		    margin-bottom: 15px;
		    color: #000;
		}
		h1 small,
		h2 small,
		h3 small,
		h4 small,
		h5 small,
		h6 small {
		    font-size: 60%;
		    color: #6f6f6f;
		    line-height: 0;
		    text-transform: none;
		}
		h1 {
		    font-weight: 200;
		    font-size: 44px;
		}
		h2 {
		    font-weight: 200;
		    font-size: 37px;
		}
		h3 {
		    font-weight: 500;
		    font-size: 27px;
		}
		h4 {
		    font-weight: 500;
		    font-size: 23px;
		}
		h5 {
		    font-weight: 900;
		    font-size: 17px;
		}
		h6 {
		    font-weight: 900;
		    font-size: 14px;
		    text-transform: uppercase;
		    color: #444;
		}
		.collapse {
		    margin: 0!important;
		}
		p,
		ul {
		    margin-bottom: 10px;
		    font-weight: normal;
		    font-size: 14px;
		    line-height: 1.6;
		}
		p.lead {
		    font-size: 17px;
		}
		p.last {
		    margin-bottom: 0px;
		}
		ul li {
		    margin-left: 5px;
		    list-style-position: inside;
		}
		.container {
		    display: block!important;
		    width: 600px!important;
		    margin: 0 auto!important;
		    clear: both!important;
		}
		.content {
		    padding: 15px;
		    /*width: 600px;*/
		    margin: 0 auto;
		    display: block;
		}
		.content.no-padding {
			padding-right: 0;
			padding-left: 0;
		}
		.content table {
		    width: 100%;
		}
		.clear {
		    display: block;
		    clear: both;
		}
	</style>
</head>

<body bgcolor="#FFFFFF">

	<table class="head-wrap" bgcolor="#FFFFFF">
		<tr>
			<td></td>
			<td class="mail-header container">
				<div class="content no-padding">
					<table bgcolor="#FFFFFF">
						<tr>
							<td><img src="<?php the_field('option_sitelogo', 'option') ?>" alt="<?php bloginfo('name'); ?>" /></td>
							<td align="right"><h6 class="collapse"><?php _e( 'E-consult', 'ecs-corporate' ); ?></h6></td>
						</tr>
					</table>
				</div>
			</td>
			<td></td>
		</tr>
	</table>

	<table class="body-wrap">
		<tr>
			<td></td>
			<td class="container" bgcolor="#F8F8F8">
				<div class="content">
					<table>
						<tr>
							<td>
							<!-- $msg starts here -->
