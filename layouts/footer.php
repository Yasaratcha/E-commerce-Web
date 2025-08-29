<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiteAndBrew</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <link rel="stylesheet" href="assets/css/style.css?=v12">
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=B7BFCBWz954Q39YSXhFCxZ7WYzvFRl5Pzht6ILrodp17hUqWRIZzVQ5HA_b70TedwQtHv77ovAfE317JV_60hS_ERXPLiYOliTdtx9f0SmUA13-ZHyC-O37NRxcI9xMUmFJoRde4tw1Jcnj9-CMQHS2oNH3PubXWIr_VPQgA_7IhnzE1Tap1Na7nwtBZcKLGBjEl3Vg1XUvQbQu71qyVmrCZ0CCDITdV0IK2JXx6k_Emm3ClhK68CAWZJMw7Bu1JxuF48nPqaNKxlZukfAn0UgY2en1JHipeAAO0ub-DJ5MbbY8cudRIIpijp9FjRWKpw9Xm7wMRcA9VayhByok0NcpfriztGC3ckOP42Lyw6187ZQREVObW8LTRRlAFvkt_PSWocYuEzOAMyESyPM1KhTFH4WgrDQotQgOT_Ld70cLh8EnzPfPpgLY7DZoKtRmIj0pI-krFuh3UkRuCHDCNbUn1s1JXSihfDrk_arcsD1eA4en-tjMNFTkAhrYE82O9ls0Lty-tZmasOdOaDlZqbv8wSRSZAmTs5Xa4WpbvOjYtB5WGaFe61VIWmK9G6MuCm_tufr7G1smojzq4g0gG7oPRFfR60VP9QbQoIDHM3_bloI9Rc3OO3Ix4jZadnh6o_cGZd1qKbdchzW_fuPaTNw" charset="UTF-8"></script></head>


      <!-----footer----->
      <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
          <div class="product col-lg-3 col-md-4 col-sm-12">
            <img class="logo2" src="assets/imgs/logo.jpg">
            <p class="text pt-3">Where Every Bite Meets The Perfect Brew</p>
          </div>
          <div class="product col-lg-3 col-md-4 col-sm-12">
            <h5 class="pb-2">Menu</h5>
            <ul class="text-uppercase">
            <li><a href="">Milktea</a></li>
            <li><a href="">Pastries</a></li>
            <li><a href="">Coffee</a></li>
            <li><a href="">Dinner</a></li>
            </ul>
          </div>
          <div class="product col-lg-3 col-md-4 col-sm-12">
            <h5 class="pb-2">Contact Us</h5>
            <div>
              <h6 class="text-uppercase">Address</h6>
              <p>Street Name, City</p>
            </div>
              <div>
              <h6 class="text-uppercase">Phone</h6>
              <p>123456789</p>
            </div>
              <div>
              <h6 class="text-uppercase">Email</h6>
              <p>Juan@gmail.com</p>
            </div>
          </div>
           <div class="soc-med col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap">
            <h5 class="pb-2">Download Our App</h5>
            <div class="row">
              <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
              <a href=""><i class="fab fa-google-play"></i></a>
              <a href=""><i class="fab fa-apple"></i></a>
            </div>
           </div>
            <h5 class="pb-2">Visit us on</h5>
              <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
              <a href=""><i class="fab fa-facebook"></i></a>
              <a href=""><i class="fab fa-instagram"></i></a>
              <a href=""><i class="fab fa-twitter"></i></a>
              <a href=""><i class="fab fa-tiktok"></i></a>
          </div>
        </div> 

        <div class="copyright mt-5">
          <div class="row container mx-auto">
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
              <img src="assets/imgs/payment.jpg">
            </div>
             <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2 mx-1">
              <p>eCommerce @2025 All Rights Reserved</p>
            </div>
            </div>
          </div>
        </div>
      </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
      var mainImg = document.getElementById("mainImg");
      var smallImg = document.getElementsByClassName("small-img");

      for(let i=0; i<4; i++){
        smallImg[i].onclick = function(){
        mainImg.src = smallImg[i].src;
      }
      }


    </script>
</body>
</html>