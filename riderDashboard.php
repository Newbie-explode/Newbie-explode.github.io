<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="css/datatables/datatables.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <!--
         SOFTY PINKO
         https://templatemo.com/tm-535-softy-pinko
         -->
      <!-- Additional CSS Files -->
      <link rel="stylesheet" type="text/css" href="<?php echo site_url('bootstrap/dist/css/assets/css/bootstrap.min.css')?>">
      <link rel="stylesheet" type="text/css" href="<?php echo site_url('bootstrap/dist/css/assets/css/font-awesome.css')?>">
      <link rel="stylesheet" href="<?php echo site_url('bootstrap/dist/css/assets/css/templatemo-softy-pinko.css')?>">
      <link rel="stylesheet" href="<?php echo site_url('bootstrap/dist/css/assets/css/mystyle.css')?>">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
      <style>
         body {font-family: Arial, Helvetica, sans-serif;}
         .my-flexbox{
         display: flex;
         flex-wrap: nowrap;
         flex-direction: row;
         width: 1000px;
         top: auto;
         margin-right: auto;
         margin-left: 20%;
         }
         .my-flexbox>div{
         color: white;
         margin: 10px;
         text-align: center;
         font-size: 25px;
         flex-direction: row;
         flex-wrap: nowrap;
         }

         .my-flexbox-container{
            margin: 15px;
         }

         .right-space{
            display: flex;
            flex-wrap: nowrap;
            flex-direction: column;

         }

         .right-space>div{
            flex-direction: column;
            flex-wrap: nowrap;
         }

         .notice-board{
            border: 2px solid #ee82ee;
            margin: 10px;
         }
         .clock{
            margin: 5px;
         }

      </style>
      <title>Rider Dashboard</title>
   </head>
   <body>
      <!-- ***** Header Area Start ***** -->
      <header class="header-area header-sticky">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <nav class="main-nav">
                     <!-- ***** Logo Start ***** -->
                     <a href="#" class="logo" style="margin-top: 15px; margin-bottom: auto;">
                     <img src="<?php echo base_url('bootstrap/dist/css/assets/images/logobaru.jpeg')?>" width="100px" height="50px" border-radius="40px" alt="FYP"/>
                     </a>
                     <!-- ***** Logo End ***** -->
                     <!-- ***** Menu Start ***** -->
                     <ul class="nav">
                        <li><a href="<?php echo base_url('rider/logout'); ?>">Log out</a></li>
                     </ul>
                     <a class='menu-trigger'>
                     <span>Menu</span>
                     </a>
                     <!-- ***** Menu End ***** -->
                  </nav>
               </div>
            </div>
         </div>
      </header>
      <!-- ***** Header Area End ***** -->
      <!-- ***** Welcome Area Start ***** -->
      <div class="welcome-area" id="welcome">
         <!-- ***** Header Text Start ***** -->
         <div class="header-text">
            <div class="container">
               <div class="row">
                  <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                        <h2>Welcome Rider</h2>
                     <h1><strong>Web-Based Parcel Sorting System with Delivery Route Optimization</strong></h1>
                     <p>The website is designed to display the workflow of our project when it being executed</p>
                  </div>
               </div>
            </div>
         </div>
         <!-- ***** Header Text End ***** -->
      </div>
      <!-- ***** Welcome Area End ***** -->
      <!-- ***** Features Big Item Start ***** -->
      <section class="section padding-bottom-100">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="my-flexbox">
                         <div style="flex-grow: 11">    
                         <h3 style="color: black; background-color: white;">List of Parcel</h3>  
                            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                               <thead>
                                  <tr>
                                     <th class="th-sm">ID</th>
                                     <th class="th-sm">Parcel</th>
                                     <th class="th-sm">Address</th>
                                  </tr>
                               </thead>
                               <tbody>
                                  <?php
                                     $i=1;
                                     foreach($data as $row)
                                       {
                                       echo "<tr>";
                                       echo "<td>".$row->id."</td>";
                                       echo "<td>".$row->parcel."</td>";
                                       echo "<td>".$row->Address."</td>";
                                       echo "</tr>";
                                        $i++;
                                       } 
                                     ?>
                            </table>
                         </div>
                         <div style="flex-grow: 1">
                            <div class="right-space">
                                <div class="notice-board">
                                    <h2 style="color: black; background-color: #ee82ee;">Notice</h2>
                                    <marquee behavior="scroll" direction="left">
                                        <p style=" color: black;"> All parcels list have been updated for delivery!</p>
                                     </marquee>
                                     <div class="clock">
                                        <p style="color: black;"><span id="datetime"></span></p>
                                        <canvas id="canvas" width="200" height="200"style="background-color:#333"></canvas>
                                         <script>
                                           var dt = new Date();
                                           document.getElementById("datetime").innerHTML = dt.toLocaleString();
                                        </script>
                                    </div>
                                </div>
                             </div>
                         </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- ***** Features Big Item End ***** -->
      <!-- ***** Footer Start ***** -->
      <footer>
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <ul class="social">
                     <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                     <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                     <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                     <li><a href="#"><i class="fa fa-rss"></i></a></li>
                     <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  </ul>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <p class="copyright">Copyright &copy; 2020 ICS Apirl 2018 - Design: ICS APRIL 2018</p>
               </div>
            </div>
         </div>
      </footer>
      <!-- jQuery -->
      <script src="<?php echo base_url('bootstrap/dist/css/assets/js/jquery-2.1.0.min.js') ?>"></script>
      <!-- Bootstrap -->
      <script src="<?php echo base_url('bootstrap/dist/css/assets/js/popper.js') ?>"></script>
      <script src="<?php echo base_url('softypink-template/assets/js/bootstrap.min.js') ?>"></script>
      <!-- Plugins -->
      <script src="<?php echo base_url('bootstrap/dist/css/assets/js/scrollreveal.min.js') ?>"></script>
      <script src="<?php echo base_url('bootstrap/dist/css/assets/js/waypoints.min.js') ?>"></script>
      <script src="<?php echo base_url('bootstrap/dist/css/assets/js/jquery.counterup.min.js') ?>"></script>
      <script src="<?php echo base_url('bootstrap/dist/css/assets/js/imgfix.min.js') ?>"></script> 
      <!-- Global Init -->
      <script src="<?php echo base_url('bootstrap/dist/css/assets/js/custom.js') ?>"></script>
      <!-- Clock  -->
      <script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>

      <!-- Test button modal -->

      <!-- Custom DataTable -->
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
      <script src="js/datatables/datatables.js"></script>
      <script type="text/javascript">
         $(document).ready(function() {
             $('.datatable').dataTable({
                 "sPaginationType": "bs_four_button"
             }); 
             $('.datatable').each(function(){
                 var datatable = $(this);
                 // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                 var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                 search_input.attr('placeholder', 'Search');
                 search_input.addClass('form-control input-sm');
                 // LENGTH - Inline-Form control
                 var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                 length_sel.addClass('form-control input-sm');
             });
         });
      </script>
   </body>
</html>
<?php
   $this->load->view('admin/footer'); 
   ?>