<?php ob_start();
  error_reporting(0);
  require("cw_admin/lib/config.php");
  extract($_GET);
  if(isset($_GET) && $_GET['search']=='Search'){
              //unset($_GET['search']);
  			$srr='';
              $ser.="search=Search&";
              if(!empty($_GET['txtReligion'])){
                  $srr.= "txtReligion LIKE '%".$_GET['txtReligion']."%' AND ";
                  $ser.="txtReligion=".$_GET['txtReligion']."&";
              }
              if(!empty($_GET['txtSect'])){
                  $srr.= "txtSect LIKE '%".$_GET['txtSect']."%' AND ";
                  $ser.="txtSect=".$_GET['txtSect']."&";
              }
              if(!empty($_GET['txtMstatus'])){
                  $srr.= "txtMstatus LIKE '%".$_GET['txtMstatus']."%' AND ";
                  $ser.="txtMstatus=".$_GET['txtMstatus']."&";
              }
              if(!empty($_GET['searchby'])){
				  if($_GET['searchby']=='bride'){
					 $sfor = 'Bride'; 
				  } else if($_GET['searchby']=='bridegroom'){
					 $sfor = 'BrideGroom'; 
				  }
                  $srr.= "searchfor = '".$sfor."' AND ";
                  $ser.="searchby=".$_GET['searchby']."&";
              }
              $srr;
              $ser;
              if(!empty($srr)){
                  $srr = "AND ".substr($srr,0,-4);
              }
              if(!empty($ser)){
                  $ser = substr($ser,0,-1);
              }
  			$srr;
  		  $ser;
               
   }     
//echo "SELECT DISTINCT(txtLocality) FROM  `matrimonial_ads` WHERE `status`='Active' AND `txtCity` LIKE '%".$_COOKIE['areaname']."%' $srr ORDER BY `guid` DESC"; exit;   
   	    $serth = $db->query("SELECT DISTINCT(txtLocality) FROM  `matrimonial_ads` WHERE `status`='Active' AND `txtCity` LIKE '%".$_COOKIE['areaname']."%' $srr ORDER BY `guid` DESC");

  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Ads Chronicle&reg;</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/my_style.css">
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->

<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="js/crawler.js" type="text/javascript"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-color:#eee">
<div class="container shadow"  style="background-color:#fff">
  <header>
    <?php include("header.php") ?>
    <div class="row" style="background-color:#01ADED; padding:5px 0px">
      <div class="col-md-12"> <a class="btn btn-danger" href="index.php" role="button">Back to Home Page</a> </div>
    </div>
  </header>
  <div class="row" style="padding:10px 0px 0px 0px;">
    <div class="col-md-12" style="background-image:url(images/bg-b.jpg); margin-bottom:10px">
      <div style="font-size:16px; color:#fff; font-weight:bold; padding:10px" align="center">Terms and Conditions</div>
    </div>
    <div class="col-md-12">
      <div style="line-height:1.8; margin-bottom:15px; margin-top:10px" align="justify">
        <p><strong>YOUR ACCEPTANCE OF THIS AGREEMENT:</strong> This is an agreement between you ("you" or "your") and AdsChronicle.com  , a company with its registered office at #10-3-12/6/D, Mehdipatnam X Roads, Hyderabad 500028. ("AdsChronicle.com" "we," or "our") that governs your use of the search services offered by AdsChronicle.com through its website www.AdsChronicle.com.com ("Website"), telephone search, SMS, WAP or any other medium using which AdsChronicle.com may provide the search services (collectively "Media" ). When you access or use any of the Media you agree to be bound by these Terms and Conditions ("Terms").</p>
        <p><strong>CHANGES:</strong> We may periodically change the Terms and the Site without notice, and you are responsible for checking these Terms periodically for revisions. All amended Terms become effective upon our posting to the Site, and any use of the site after such revisions have been posted signifies your consent to the changes.</p>
        <p><strong>HOW YOU MAY USE OUR MATERIALS:</strong> We use a diverse range of information, text, photographs, designs, graphics, images, sound and video recordings, animation, content, advertisement and other materials and effects (collectively "Materials") for the search services on the Media. We provide the Material through the Media FOR YOUR PERSONAL AND NON-COMMERCIAL USE ONLY.</p>
        <p>While every attempt has been made to ascertain the authenticity of the Media content, AdsChronicle.com is not liable for any kind of damages, losses or action arising directly or indirectly, due to access and/or use of the content in the Media including but not   to decisions based on the content in the Media which results in any loss of data, revenue, profits, property, infection by viruses etc.</p>
        <p>Accordingly, you may view, use, copy, and distribute the Materials found on the Media for internal, non-commercial, informational purposes only. You are prohibited from data mining, scraping, crawling, or using any process or processes that send automated queries to AdsChronicle.com.. You may not use the Media or any of them to compile a collection of listings, including a competing listing product or service. You may not use the Media or any Materials for any unsolicited commercial e-mail. Except as authorized in this paragraph, you are not being granted a license under any copyright, trademark, patent or other intellectual property right in the Materials or the products, services, processes or technology described therein. All such rights are retained by AdsChronicle.com, its subsidiaries, parent companies, and/or any third party owner of such rights.</p>
        <p><strong>HOW YOU MAY USE OUR MARKS:</strong> The AdsChronicle.com company names and logos and all related products and service names, design marks and slogans are trademarks and service marks owned by and used under license from AdsChronicle.com or its wholly-owned subsidiaries. All other trademarks and service marks herein are the property of their respective owners. All copies that you make of the Materials on any of the Media must bear any copyright, trademark or other proprietary notice located on the respective Media that pertains to the material being copied. You are not authorized to use any AdsChronicle.com name or mark in any advertising, publicity or in any other commercial manner without the prior written consent of AdsChronicle.com. Requests for authorization should be made to admin@adschronicle.com.</p>
        <p><strong>HOW WE MAY USE INFORMATION YOU PROVIDE TO US:</strong> Do not send us any confidential or proprietary information. Except for any personally identifiable information that we agree to keep confidential as provided in our Privacy Policy, any material, including, but not   to any feedback, data, answers, questions, comments, suggestions, ideas or the like, which you send to us will be treated as being non-confidential and nonproprietary. We assume no obligation to protect confidential or proprietary information (other than personally identifiable information) from disclosure and will be free to reproduce, use, and distribute the information to others without restriction. We will also be free to use any ideas, concepts, know-how or techniques contained in information that you send us for any purpose whatsoever including but not   to developing, manufacturing and marketing products and services incorporating such information.</p>
        <p><strong>REVIEWS, RATINGS &amp; COMMENTS BY USERS:</strong></p>
        <p>Since, AdsChronicle.com provides information directory services through various mediums (SMS, WAP, E-Mail, Website, APP and voice or phone), your ("Users") use any of the aforementioned medium to post Reviews, Ratings and Comments about the AdsChronicle.com services and also about the Advertiser's listed at AdsChronicle.com is subject to additional terms and conditions as mentioned herein.</p>
        <p>You are solely responsible for the content of any transmissions you make to the Site or any transmissions you make to any mediums offered by AdsChronicle.com and any materials you add to the Site or add to any mediums offered by AdsChronicle.com, including but not   to transmissions like your Reviews, Ratings &amp; Comments posted by you(the "Communications"). AdsChronicle.com does not endorse or accept any of your Communication as representative of their (AdsChronicle.com) views. By transmitting any public Communication to the Site, you grant AdsChronicle.com an irrevocable, non-exclusive, worldwide, perpetual, unrestricted, royalty-free license (with the right to sublicense) to use, reproduce, distribute, publicly display, publicly perform, adapt, modify, edit, create derivative works from, incorporate into one or more compilations and reproduce and distribute such compilations, and otherwise exploit such Communications, in all media now known or later developed.</p>
        <p>You confirm and warrant that you have the right to grant these rights to AdsChronicle.com . You hereby waive and grant to AdsChronicle.com all rights including intellectual property rights and also "moral rights" in your Communications, posted at AdsChronicle.com through any of mediums of AdsChronicle.com. AdsChronicle.com is free to use all your Communications as per its requirements from time to time. You represent and warrant that you own or otherwise control all of the rights to the content that you post as Review, Rating or Comments; that the content is accurate; that use of the content you supply does not violate these Terms and will not cause injury to any person or entity. For removal of doubts it is clarified that, the reference to Communications would also mean to include the reviews, ratings and comments posted by your Friend's tagged by you. Also AdsChronicle.com reserves the right to mask or unmask your identity in respect of your Reviews, Ratings &amp; Comments posted by you.</p>
        <p>AdsChronicle.com has the right, but not the obligation to monitor and edit or remove any content posted by you as Review, Rating or Comments. AdsChronicle.com cannot review all Communications made on and through any of the mediums of AdsChronicle.com. However, AdsChronicle.com reserves the right, but has no obligation, to monitor and edit, modify or delete any Communications (or portions thereof) which AdsChronicle.com in its sole discretion deems inappropriate, offensive or contrary to any AdsChronicle.com policy, or that violate this terms:</p>
        <p>AdsChronicle.com reserves the right not to upload or distribute to, or otherwise publish through the Site or Forums any Communication which</p>
        <p>1.     is obscene, indecent, pornographic, profane, sexually explicit, threatening, or abusive</p>
        <p>2.     constitutes or contains false or misleading indications of origin or statements of fact;</p>
        <p>3.     slanders, libels, defames, disparages, or otherwise violates the legal rights of any third party;</p>
        <p>4.     causes injury of any kind to any person or entity;</p>
        <p>5.     infringes or violates the intellectual property rights (including copyright, patent and trademark rights), contract rights, trade secrets, privacy or publicity rights or any other rights of any third party;</p>
        <p>6.     violates any applicable laws, rules, or regulations;</p>
        <p>7.     contains software viruses or any other malicious code designed to interrupt, destroy or limit the functionality of any computer software or hardware or telecommunications equipment;</p>
        <p>8.     impersonates another person or entity, or that collects or uses any information about Site visitors.</p>
        <p>It is also clarified that, if there are any issues or claims due to your posts by way of Reviews, Ratings and Comments, then AdsChronicle.com reserves right to take appropriate legal action against you. Further, you shall indemnify and protect AdsChronicle.com against such claims or damages or any issues, due to your posting of such Reviews, Ratings and Comments AdsChronicle.com takes no responsibility and assumes no liability for any content posted by you or any third party on AdsChronicle.com site or on any mediums of AdsChronicle.com.</p>
        <p>You further acknowledge that conduct prohibited in connection with your use of the Forums includes, but is not   to, breaching or attempting to breach the security of the Site or any of the mediums of AdsChronicle.com.</p>
        <p><strong>PRIVACY POLICY:</strong></p>
        <p>AdsChronicle.com is committed to protecting the privacy and confidentiality of any personal information that it may request and receive from its clients, business partners and other users of the Website. To read our privacy policy statement regarding such personal information please refer privacy policy</p>
        <p><strong>CONTENT DISCLAIMER:</strong></p>
        <p>AdsChronicle.com communicates information provided and created by advertisers, content partners, software developers, publishers, marketing agents, employees, users, resellers and other third parties. While every attempt has been made to ascertain the authenticity of the content on the Media AdsChronicle.com has no control over content, the accuracy of such content, integrity or quality of such content and the information on our pages, and material on the Media may include technical inaccuracies or typographical errors, and we make no guarantees, nor can we be responsible for any such information, including its authenticity, currency, content, quality, copyright compliance or legality, or any other intellectual property rights compliance, or any resulting loss or damage. Further, we are not liable for any kind of damages, losses or action arising directly or indirectly due to any content, including any errors or omissions in any content, access and/or use of the content on the Media or any of them including but not   to content based decisions resulting in loss of data, revenue, profits, property, infection by viruses etc.</p>
        <p>All of the data on products and promotions including but not   to, the prices and the availability of any product or service or any feature thereof, is subject to change without notice by the party providing the product or promotion. You should use discretion while using the Media .</p>
        <p>AdsChronicle.com reserves the right, in its sole discretion and without any obligation, to make improvements to, or correct any error or omissions in, any portion of the Media. Where appropriate, we will endeavor to update information listed on the Website on a timely basis, but shall not be liable for any inaccuracies.</p>
        <p>All rights, title and interest including trademarks and copyrights in respect of the domain name and Media content hosted on the Media are reserved with AdsChronicle.com. Users are permitted to read, print or download text, data and/or graphics from the Website or any other Media for their personal use only. Unauthorized access, reproduction, redistribution, transmission and/or dealing with any information contained in the Media in any other manner, either in whole or in part, are strictly prohibited, failing which strict legal action will be initiated against such users.</p>
        <p>Links to external Internet sites may be provided within the content on Website or other Media as a convenience to users. The listing of an external site does not imply endorsement of the site by AdsChronicle.com or its affiliates. AdsChronicle.com does not make any representations regarding the availability and performance of its Media or any of the external websites to which we provide links. When you click on advertiser banners, sponsor links, or other external links from the Website or other Media, your browser automatically may direct you to a new browser window that is not hosted or controlled by AdsChronicle.com.</p>
        <p>AdsChronicle.com and its affiliates are not responsible for the content, functionality, authenticity or technological safety of these external sites. We reserve the right to disable links to or from third-party sites to any of our Media, although we are under no obligation to do so. This right to disable links includes links to or from advertisers, sponsors, and content partners that may use our Marks as part of a co-branding relationship.</p>
        <p>Some external links may produce information that some people find objectionable, inappropriate, or offensive. We are not responsible for the accuracy, relevancy, copyright compliance, legality, or decency of material contained in any externally linked websites. We do not fully screen or investigate business listing websites before or after including them in directory listings that become part of the Materials on our Media, and we make no representation and assume no responsibility concerning the content that third parties submit to become listed in any of these directories.</p>
        <p>All those sections in the Media that invite reader participation will contain views, opinion, suggestion, comments and other information provided by the general public, and AdsChronicle.com will at no point of time be responsible for the accuracy or correctness of such information. AdsChronicle.com reserves the absolute right to accept/reject information from readers and/or advertisements from advertisers and impose/relax Media access rules and regulations for any user(s).</p>
        <p>AdsChronicle.com also reserves the right to impose/change the access regulations of the Media , whether in terms of access fee, timings, equipment, access restrictions or otherwise, which shall be posted from time to time under these terms and conditions. It is the responsibility of users to refer to these terms and conditions each time they use the Media.</p>
        <p>While every attempt has been made to ascertain the authenticity of the content in the Media, AdsChronicle.com is not liable for any kind of damages, losses or action arising directly or indirectly, due to access and/or use of the content in the Media including but not   to any decisions based on content in the Media resulting in loss of data, revenue, profits, property, infection by viruses etc.</p>
        <p><strong>WARRANTY DISCLAIMER:</strong></p>
        <p>Please remember that any provider of goods or services is entitled to register with AdsChronicle.com. AdsChronicle.com does not examine whether the advertisers are good, reputable or quality sellers of goods / service providers. You must satisfy yourself about all relevant aspects prior to availing of the terms of service. AdsChronicle.com has also not negotiated or discussed any terms of engagement with any of the advertisers. The same should be done by you. Purchasing of goods or availing of services from advertisers shall be at your own risk.</p>
        <p>We do not investigate, represent or endorse the accuracy, legality, legitimacy, validity or reliability of any products, services, deals, coupons or other promotions or materials, including advice, ratings, and recommendations contained on, distributed through, or linked, downloaded or accessed from the Media.</p>
        <p>References that we make to any names, marks, products or services of third parties or hypertext links to third party sites or information do not constitute or imply our endorsement, sponsorship or recommendation of the third party, of the quality of any product or service, advice, information or other materials displayed, purchased, or obtained by you as a result of an advertisement or any other information or offer in or in connection with the Media.</p>
        <p>Any use of the Media, reliance upon any Materials, and any use of the Internet generally shall be at your sole risk. AdsChronicle.com disclaims any and all responsibility or liability for the accuracy, content, completeness, legality, reliability, or operability or availability of information or material displayed in the search results in the Media.</p>
        <p>THE MATERIAL AND THE MEDIA USED TO PROVIDE THE MATERIAL (INCLUDING THE WEBSITE ) ARE PROVIDED "AS IS" AND "AS AVAILABLE" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESS OR IMPLIED OR STATUTORY, INCLUDING, BUT NOT   TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NON-INFRINGEMENT. ADSCHRONICLE.COM DISCLAIMS, TO THE FULLEST EXTENT PERMITTED UNDER LAW, ANY WARRANTIES REGARDING THE SECURITY, RELIABILITY, TIMELINESS, ACCURACY AND PERFORMANCE OF THE MEDIA AND MATERIALS. ADSCHRONICLE.COM DOES NOT WARRANT THAT ANY DEFECTS OR ERRORS WILL BE CORRECTED; OR THAT THE CONTENT IS FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS.</p>
        <p>ADSCHRONICLE.COM DISCLAIMS ANY AND ALL WARRANTIES TO THE FULLEST EXTENT OF THE LAW, INCLUDING ANY WARRANTIES FOR ANY INFORMATION, GOODS, OR SERVICES, OBTAINED THROUGH, ADVERTISED OR RECEIVED THROUGH ANY LINKS PROVIDED BY OR THROUGH THE MEDIA SOME COUNTRIES OR OTHER JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES, SO THE ABOVE EXCLUSIONS MAY NOT APPLY TO YOU. YOU MAY ALSO HAVE OTHER RIGHTS THAT VARY FROM COUNTRY TO COUNTRY AND JURISDICTION TO JURISDICTION.</p>
        <p><strong>DISCLAIMER for "AdsChronicle.com GUARANTEE" and "Just Right"</strong></p>
        <p>The "AdsChronicle.com Guarantee" and "Just Right" is a   assurance offered by AdsChronicle.com that the name and contact information of the advertiser and the category in which the advertiser is listed by AdsChronicle.com, have been verified as existing and correct at the time of the advertiser's application to register with AdsChronicle.com. AdsChronicle.com makes no representations or warranties, whether express or implied, including but not   to warranties of the continued existence and/or operations of the advertiser, or the quality, quantity, merchantability or fitness for use of the goods or services offered by the advertiser.</p>
        <p><strong>ADDITIONAL DISCLAIMER:</strong></p>
        <p>Users using any of AdsChronicle.com service across the following mediums ie. through internet ie www.AdsChronicle.com.com Website, Wapsite, SMS, phone or any other medium are bound by this additional disclaimer wherein they are cautioned to make proper enquiry before they (Users) rely, act upon or enter into any transaction (any kind or any sort of transaction including but not   to monetary transaction ) with the Advertiser listed with AdsChronicle.com.</p>
        <p>All the Users are cautioned that all and any information of whatsoever nature provided or received from the Advertiser/s is taken in good faith, without least suspecting the bonafides of the Advertiser/s and AdsChronicle.com does not confirm, does not acknowledge, or subscribe to the claims and representation made by the Advertiser/s listed with AdsChronicle.com .Further, AdsChronicle.com is not at all responsible for any act of Advertiser/s listed at AdsChronicle.com.</p>
        <p><strong>LIMITATION OF LIABILITY:</strong></p>
        <p>IN NO EVENT SHALL ADSCHRONICLE.COM BE LIABLE TO ANY USER ON ACCOUNT OF SUCH USER'S USE, MISUSE OR RELIANCE ON THE MEDIA FOR ANY DAMAGES WHATSOEVER, INCLUDING DIRECT, SPECIAL, PUNITIVE, INDIRECT, CONSEQUENTIAL OR INCIDENTAL DAMAGES OR DAMAGES FOR LOSS OF PROFITS, REVENUE, USE, OR DATA WHETHER BROUGHT IN WARRANTY, CONTRACT, INTELLECTUAL PROPERTY INFRINGEMENT, TORT (INCLUDING NEGLIGENCE) OR OTHER THEORY, EVEN IF ADSCHRONICLE.COM ARE AWARE OF OR HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGE, ARISING OUT OF OR CONNECTED WITH THE USE (OR INABILITY TO USE) OR PERFORMANCE OF THE MEDIA, THE MATERIALS OR THE INTERNET GENERALLY, OR THE USE (OR INABILITY TO USE), RELIANCE UPON OR PERFORMANCE OF ANY MATERIAL CONTAINED IN OR ACCESSED FROM ANY MEDIA. ADSCHRONICLE.COM DOES NOT ASSUME ANY LEGAL LIABILITY OR RESPONSIBILITY FOR THE ACCURACY, COMPLETENESS, OR USEFULNESS OF ANY INFORMATION, APPARATUS, PRODUCT OR PROCESS DISCLOSED ON THE MEDIA OR OTHER MATERIAL ACCESSIBLE FROM THE MEDIA.</p>
        <p>THE USER OF THE MEDIA ASSUMES ALL RESPONSIBILITY AND RISK FOR THE USE OF THIS MEDIA AND THE INTERNET GENERALLY. THE FOREGOING LIMITATIONS SHALL APPLY NOTWITHSTANDING ANY FAILURE OF THE ESSENTIAL PURPOSE OF ANY   REMEDY AND TO THE FULLEST EXTENT PERMITTED UNDER APPLICABLE LAW. SOME COUNTRIES DO NOT ALLOW THE EXCLUSION OR LIMITATION OF LIABILITY OF CONSEQUENTIAL OR INCIDENTAL DAMAGES, SO THE ABOVE EXCLUSIONS MAY NOT APPLY TO ALL USERS; IN SUCH COUNTRIES LIABILITY IS   TO THE FULLEST EXTENT PERMITTED BY LAW.</p>
        <p><strong>THIRD PARTY SITES:</strong></p>
        <p>Your correspondence or business dealing with or participation in the sales promotions of advertisers or service providers found on or through the Media, including payment and delivery of related goods or services, and any other terms, conditions, and warranties or representations associated with such dealings, are solely between you and such advertisers or service providers. You assume all risks arising out of or resulting from your transaction of business over the Internet, and you agree that we are not responsible or liable for any loss or result of the presence of information about or links to such advertisers or service providers on the Media. You acknowledge and agree that we are not responsible or liable for the availability, accuracy, authenticity, copyright compliance, legality, decency or any other aspect of the content, advertising, products, services, or other materials on or available from such sites or resources. You acknowledge and agree that your use of these linked sites is subject to different terms of use than these Terms, and may be subject to different privacy practices than those set forth in the Privacy Policy governing the use of the Media . We do not assume any responsibility for review or enforcement of any local licensing requirements that may be applicable to businesses listed on the Media.</p>
        <p>MONITORING OF MATERIALS TRANSMITTED BY YOU: Changes may be periodically incorporated into the Media. AdsChronicle.com may make improvements and/or changes in the products, services and/or programs described in these Media and the Materials at any time without notice. We are under no obligation to monitor the material residing on or transmitted to the Media . However, anyone using the Media agrees that AdsChronicle.com may monitor the Media contents periodically to (1) comply with any necessary laws, regulations or other governmental requests; (2) to operate the Media properly or to protect itself and its users. AdsChronicle.com reserves the right to modify, reject or eliminate any material residing on or transmitted to its Media that it, in its sole discretion, believes is unacceptable or in violation of the law or these Terms and Conditions. DELETIONS FROM SERVICE: AdsChronicle.com will delete any materials at the request of the user who submitted the materials or at the request of an advertiser who has decided to "opt-out" of the addition of materials to its advertising, including, but not   to ratings and reviews provided by third parties. AdsChronicle.com reserves the right to delete (or to refuse to post to public forums) any materials it deems detrimental to the system or is, or in the opinion of AdsChronicle.com, may be, defamatory, infringing or violate of applicable law. AdsChronicle.com reserves the right to exclude Material from the Media. Materials submitted to AdsChronicle.com for publication on the Media may be edited for length, clarity and/or consistency with AdsChronicle.com's editorial standards.</p>
        <p><strong>INDEMNIFICATION:</strong></p>
        <p>You agree to indemnify and hold us and (as applicable) our parent, subsidiaries, affiliates, officers, directors, agents, and employees, harmless from any claim or demand, including reasonable attorneys' fees, made by any third party due to or arising out of your breach of these Terms, your violation of any law, or your violation of the rights of a third party, including the infringement by you of any intellectual property or other right of any person or entity. These obligations will survive any termination of the Terms.</p>
        <p><strong>MISCELLANEOUS:</strong></p>
        <p>These Terms will be governed by and construed in accordance with the Indian laws, without giving effect to its conflict of laws provisions or your actual state or country of residence, and you agree to submit to personal jurisdiction in India. You agree to exclude, in its entirety, the application to these Terms of the United Nations Convention on Contracts for the International Sale of Goods. You are responsible for compliance with applicable laws. If for any reason a court of competent jurisdiction finds any provision or portion of the Terms to be unenforceable, the remainder of the Terms will continue in full force and effect. These Terms constitute the entire agreement between us and supersedes and replaces all prior or contemporaneous understandings or agreements, written or oral, regarding the subject matter of these Terms. Any waiver of any provision of the Terms will be effective only if in writing and signed by you and AdsChronicle.com. AdsChronicle.com reserves the right to investigate complaints or reported violations of these Terms and to take any action we deem necessary and appropriate. Such action may include reporting any suspected unlawful activity to law enforcement officials, regulators, or other third parties. In addition, we may take action to disclose any information necessary or appropriate to such persons or entities relating to user profiles, e-mail addresses, usage history, posted materials, IP addresses and traffic information. AdsChronicle.com reserves the right to seek all remedies available at law and in equity for violations of these Terms.</p>
        <p>Notices. All of our notices, demands and other communications must be in writing and will be deemed to have been given (a) if mailed by certified mail, postage prepaid, (b) if delivered by overnight courier, (c) if sent by facsimile transmission and such transmission is confirmed as received, or (d) if sent by electronic mail, and such message is confirmed as received, in each case to the address, fax number or e-mail address specified on the Order for the recipient of such notice. All of your notices, demands and other communications must be in writing and will be deemed to have been given (a) if mailed by certified mail, postage prepaid or if delivered by overnight courier, to our address.</p>
        <p>Force Majeure. In no event shall we or any Distribution Site have liability or be deemed to be in breach hereof for any failure or delay of performance resulting from any governmental action, fire, flood, insurrection, earthquake, power failure, network failure, riot, explosion, embargo, strikes (whether legal or illegal), terrorist act, labor or material shortage, transportation interruption of any kind or work slowdown or any other condition not reasonably within our control. Your payment obligations shall continue during any event of force majeure. Indemnification. You agree to indemnify us and the Distribution Sites and hold us and the Distribution Site harmless from and with respect to any claims, actions, liabilities, losses, expenses, damages and costs (including, without limitation, actual attorneys' fees) that may at any time be incurred by us or them arising out of or in connection with these Terms or any Advertising Products or services you request, including, without limitation, any claims, suits or proceedings for defamation or libel, violation of right of privacy or publicity, criminal investigations, infringement of intellectual property, false or deceptive advertising or sales practices and any virus, contaminating or destructive features. Telephone Conversations. All telephone conversations between you and us about your advertising may be recorded and you hereby consent to such monitoring and recordation. Arbitration: Any disputes and differences whatsoever arising in connection with these Terms shall be settled by Arbitration in accordance with the Arbitration and Conciliation Act, 1996. a) All proceedings shall be conducted in English language. b) Unless the Parties agree on a sole arbitrator there shall be three Arbitrators, one to be selected by each of the parties, and the third to be selected by the two Arbitrators appointed by the parties. c) The venue of Arbitration shall be in Hyderabad, India.</p>
        <p>Entire Agreement. These Terms constitutes the entire agreement between you and us with respect to the subject matter of these Terms and supersedes all prior written and all prior or contemporaneous oral communications regarding such subject matter. Accordingly, you should not rely on any representations or warranties that are not expressly set forth in these Terms. If any provision or provisions of these Terms shall be held to be invalid, illegal, unenforceable or in conflict with the law of any jurisdiction, the validity, legality and enforceability of the remaining provisions shall not in any way be affected or impaired. Except as provided in Section 1, these Terms may not be modified except by writing signed by you and us; provided, however, we may change these Terms from time to time, and such revised terms and conditions shall be effective with respect to any Advertising Products ordered after written notice of such revised terms to you or, if earlier, posting of such revised terms and conditions on our Website.</p>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <footer>
    <?php include("footer.php") ?>
  </footer>
</div>
<script src="js/bootstrap.min.js"></script> 
<!-- Modal -->
<div class="modal fade" id="myModalAD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload your AD</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <form>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" placeholder="Full Name" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status">
              </div>
              <br>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input type="text" placeholder="Mobile No" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status">
              </div>
              <br>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="text" placeholder="EMail-id" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status">
              </div>
              <br>
              <div class="form-group">
                <label for="exampleInputFile">File Upload:</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block"><small>Upload Photos, Videos, Location Map, ect.,.</small></p>
              </div>
              <button type="submit" class="btn btn-info">Submit</button>
            </form>
          </div>
          <div class="col-md-6" align="right"> <img src="images/contact.jpg" style="padding-top:30px" class="img-responsive"  alt=""/> </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
