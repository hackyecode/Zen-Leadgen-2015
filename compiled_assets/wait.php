<?php
// timezone 

// includes
include_once 'assets/inc/functions/commons.php';
// globals 

// inputs
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]--> 
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>   
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Wealth Creation Investing</title>
        <meta name="author" content="The Darwin Investing Network">
        <meta name="description" content="Congratulations! You've taken the first step towards eliminating your migraines.
Miami Center for craniomandibular disorders have treated thousans of patients just like yourself.">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
        <!-- Main styles -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css?v=0.6.1">
        <!-- Autor: MobiusZero -->
        <!-- Created: 09192016 -->
        <!-- Contact: mz(at)mz.com -->
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif] -->
        
<section class="content module coreg">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h1 class="text-center text-capitialize">If you think that was a good deal, you are in for something ever better!</h1>
				<h3 class="text-center text-capitialize text-primary">Choose any of the offers below at no cost to you ...</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9 center-block">
				<div class="coreg_iframe">
					<?php 
	$dynamic = false;
	$typage = 'http://wealthcreationinvesting.com/monthly-cash-flow/thank-you.php';
	if ($_GET && $dynamic === true) {
		$coreg_fields = array('aid','caid');
		foreach ($coreg_fields as $coreg_field_key) {
			${$coreg_field_key} = $_GET["{$coreg_field_key}"];
		}	
	} else {
		$coreg_fields = array('aid' => 300,'caid' => 1);
	}

	echo "<iframe id=\"special_offers\" src=\"http://thedarwinhub.com/track/display.php?id={$coreg_fields['aid']}&catid={$coreg_fields['caid']}&redirect={$typage}\"></iframe>";
?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- footer -->
<?php $domain_name = str_replace("www.", "", $_SERVER['SERVER_NAME']); ?>
<footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 center-block">
                        <ul class="text-center">
                            <li><span class="text-uppercase"><?php echo $domain_name; ?></span> &copy; <span id="year"></span> <script> var date = new Date(); var get_year = date.getFullYear(); document.getElementById("year").innerHTML = get_year; </script></li>
                        </ul>
                        <p>The <?php echo $domain_name; ?> is not an investment advisor and is not registered with the U.S. Securities and Exchange Commission or the Financial Industry Regulatory Authority. Further, owners, employees, agents or representatives of The <?php echo $domain_name; ?> are not acting as investment advisors and might not be registered with the U.S. Securities and Exchange Commission or the Financial Industry Regulatory.</p>
                        <p>The sender of this email makes no representations or warranties concerning the products, practices or procedures of any company or entity mentioned or recommended in this email, and makes no representations or warranties concerning said company or entity&rsquo;s compliance with applicable laws and regulations, including, but not limited to, regulations promulgated by the SEC or the CFTC. The sender of this email may receive a portion of the proceeds from the sale of any products or services offered by a company or entity mentioned or recommended in this email. The recipient of this email assumes responsibility for conducting its own due diligence on the aforementioned company or entity and assumes full responsibility, and releases the sender from liability, for any purchase or order made from any company or entity mentioned or recommended in this email.</p>
                        <p>The content on any of The <?php echo $domain_name; ?> websites, products or communication is for educational purposes only. Nothing in its products, services, or communications shall be construed as a solicitation and/or recommendation to buy or sell a security. Trading stocks, options and other securities involves risk. The risk of loss in trading securities can be substantial. The risk involved with trading stocks, options and other securities is not suitable for all investors. Prior to buying or selling an option, an investor must evaluate his/her own personal financial situation and consider all relevant risk factors. See: <a href="http://www.optionsclearing.com/publications/risks/riskstoc.pdf">Characteristics and Risks of Standardized Options.</a></p>
                        <p>The information presented in this site is not intended to be used as the sole basis of any investment decisions, nor should it be construed as advice designed to meet the investment needs of any particular investor. Nothing in our research constitutes legal, accounting or tax advice or individually tailored investment advice. Our research is prepared for general circulation and has been prepared without regard to the individual financial circumstances and objectives of persons who receive or obtain access to it. Our research is based on sources that we believe to be reliable. However, we do not make any representation or warranty, expressed or implied, as to the accuracy of our research, the completeness, or correctness or make any guarantee or other promise as to any results that may be obtained from using our research. To the maximum extent permitted by law, neither we, any of our affiliates, nor any other person, shall have any liability whatsoever to any person for any loss or expense, whether direct, indirect, consequential, incidental or otherwise, arising from or relating in any way to any use of or reliance on our research or the information contained therein. Some discussions contain forward looking statements which are based on current expectations and differences can be expected. All of our research, including the estimates, opinions and information contained therein, reflects our judgment as of the publication or other dissemination date of the research and is subject to change without notice. Further, we expressly disclaim any responsibility to update such research. Investing involves substantial risk. Past performance is not a guarantee of future results, and a loss of original capital may occur. No one receiving or accessing our research should make any investment decision without first consulting his or her own personal financial advisor and conducting his or her own research and due diligence, including carefully reviewing any applicable prospectuses, press releases, reports and other public filings of the issuer of any securities being considered. None of the information presented should be construed as an offer to sell or buy any particular security. As always, use your best judgment when investing.</p>
                        <p><strong>Disclaimer:</strong> Past performance is no guarantee of future performance. This product is for educational purposes only. Practical application of the products herein are at your own risk and The <?php echo $domain_name; ?>.com, its partners, representatives and employees assume no responsibility or liability for any use or mis-use of the product. Please contact your financial advisor for specific financial advice tailored to your personal circumstances. Any trades shown are hypothetical example and do not represent actual trades. Actual results may differ. Nothing here in constitutes a recommendation respecting the particular security illustrated.</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- bootstrap plugins -->
        <script src="assets/js/scripts.min.js?v=3.3.5"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.5.5/iframeResizer.min.js"></script>
        <script>
            $("#special_offers").iFrameResize({
                log:false, 
            }); 
        </script>
    </body>
</html>