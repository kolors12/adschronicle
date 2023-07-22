<?php ob_start(); error_reporting(0);
  session_start();
  require("cw_admin/lib/config.php");
  extract($_GET);
  extract($_POST);
  $date = date("Y-m-d");
  
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
    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" href="css/my_style.css"/>
    <style>
      .cls { 
      color: #F60; 
      }
      .disablededit {
      cursor: inherit;
      cursor: none;
      pointer-events: none;
      }
    </style>
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
      <div class="row" style="padding:30px">
        <div class="col-md-12">
         <center><?php if(!empty($_GET['post_msg'])){ echo $_GET['post_msg']; }?></center><br><br><br><br><br><br>
                   
               <center>   <a href="catagory_ads_form.php" class="btn btn-success">Publish Another Ad</a>&nbsp;&nbsp;&nbsp;&nbsp;
          
              <a href="index.php" class="btn btn-info">Go to Home</a></center><br><br><br><br><br><br><br><br><br><br>
        </div>
      </div>
      <?php include("footer.php") ?>
    </div>
    <script src="js/bootstrap.min.js"></script> 
  </body>
  <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
  <script src="js/jquery.geocomplete.js"></script>
  <script src="js/logger.js"></script>
  <script>
    $(function(){
        var options = { };
        $("#geocomplete").geocomplete(options);
       // $("#geocomplete").attr("placeholder","");
    });
  </script>
  <script type="text/javascript" src="js/nicEdit.js"></script>
  <script type="text/javascript">
    bkLib.onDomLoaded(function() {
        new nicEditor({fullPanel : true}).panelInstance('description');
    });
  </script>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
  <script>
    $(document).ready(function(){ 
     $("#add_form").validate({
         errorClass:'cls'
      });
     });
    
        $('#offered_services').bind('cut copy paste', function (e) {
            e.preventDefault(); //disable cut,copy,paste
        });
        $('#offered_services').keypress(function(e) {
           
            var tval = $('#offered_services').val(),
                tlength = tval.length,
                set = 120,
                remain = parseInt(set - tlength);
            //$('p').text(remain);
            if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
                $('#offered_services').val((tval).substring(0, tlength - 1))
            }
        });
    $('#category').change(function(){
    var id= $(this).val();
    $.ajax({
    type:"post",
    url:"ajaxReq.php",
    data:"cid="+id+"&action=fetchexp5",
     success:function(response){
      $('#sub_category').html(response);
    return true;
    }
    });
    });
    
    $('.super').change(function(){
    var cid= $(this).val();
    $.ajax({
    type:"post",
    url:"ajaxReq.php",
    data:"cid="+cid+"&action=fetchexp1",
     success:function(response){
      $('.area').html(response);
    return true;
    }
    });
    });

    function checkIt(evt) {
    evt = (evt) ? evt : window.event
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if(charCode > 31 && (charCode < 46 || charCode > 57)) {
        status = "This field accepts numbers only."
        return false
    } else if(charCode==47) {
        status = "This field accepts numbers only."
        return false
    }
    status = ""
    return true
    }
	
    $(function () {
        $("input[name='chkPassPort']").click(function () {
            if ($("#chkYes").is(":checked")) {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });
    });

  </script> 
</html>