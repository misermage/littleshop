 <!-- Parallax 
  <div id="parallax-two" class="parallax" style="background-image:url(img/parallax/02.jpg);">
    <div class="parallax-text-container">
      <div class="parallax-text-item">
        Uptake Store
        <h2>Present your bussiness at the highest level</h2>
      </div>
    </div>        
  </div> 
   Parallax End -->

  <div class="strip-divider"></div>  
 
  <!-- Footer -->
  <div class="footer">   
    <div class="white-background">  
      <div class="container">
        <div class="row space60"></div>
		<?
			$Menus = $Pages_obj->getAllMenus();
			$Pages = $Pages_obj->getPages();
		
		
		?>
        <div class="row">
			<!--
          <div class="col-md-3 col-sm-6">
            <h4 style="text-transform:uppercase;"><? echo $Menus[0]['mname']; ?></h4>
            <ul>
              <li>
                <a href="#">Contact Us</a>
              </li><li>  
                <a href="#">Shipping Information</a>
              </li><li>    
                <a href="#">Returns & Exchanges</a>
              </li><li>    
                <a href="#">FAQ</a>
              </li><li>    
                <a href="#">Privacy and Security</a>
              </li>
            </ul> 
            <div class="space20"></div>   
          </div>
          <div class="col-md-3 col-sm-6">
            <h4 style="text-transform:uppercase;"><? echo $Menus[1]['mname']; ?></h4>
            <ul>
              <li>
                <a href="#">My account</a>
              </li><li>      
                <a href="#">Gift Card</a>
              </li><li>      
                <a href="#">Uptake Credit Card</a>
              </li><li>      
                <a href="#">Trade & Contract Sales</a>
              </li><li>      
                <a href="#">Manufacturers</a> 
              </li>
            </ul>   
            <div class="space20"></div>   
          </div>
          <div class="col-md-3 col-sm-6">
            <h4 style="text-transform:uppercase;"><? echo $Menus[2]['mname']; ?></h4>
            <ul>
              <li>
                <a href="#">About Us</a>
              </li><li>
                <a href="#">Presss</a>
              </li><li>
                <a href="#">Careerss</a>
              </li><li>
                <a href="#">Terms of Uses</a>
              </li><li>
                <a href="#">Site Maps</a>
              </li>
            </ul>   
            <div class="space20"></div>   
          </div>
		  -->
		  <div class="col-md-3 col-sm-6">
            <h4 style="text-transform:uppercase;"><? echo $Menus[0]['mname']; ?></h4>
            <ul>
				<? for($i=0;$i<$Pages['count'];$i++){ ?>
				<? if($Pages[$i]['menuid'] == 1){ ?>
					<li>
						<a href="page.php?id=<? echo $Pages[$i]['id']; ?>"><? echo $Pages[$i]['name']; ?></a>
					</li>
				<? } ?>
				<? } ?>
            </ul> 
            <div class="space20"></div>   
          </div>
          <div class="col-md-3 col-sm-6">
            <h4 style="text-transform:uppercase;"><? echo $Menus[1]['mname']; ?></h4>
            <ul>
				<? for($i=0;$i<$Pages['count'];$i++){ ?>
				<? if($Pages[$i]['menuid'] == 2){ ?>
					<li>
						<a href="page.php?id=<? echo $Pages[$i]['id']; ?>"><? echo $Pages[$i]['name']; ?></a>
					</li>
				<? } ?>
				<? } ?>
            </ul>   
            <div class="space20"></div>   
          </div>
          <div class="col-md-3 col-sm-6">
            <h4 style="text-transform:uppercase;"><? echo $Menus[2]['mname']; ?></h4>
            <ul>
              <? for($i=0;$i<$Pages['count'];$i++){ ?>
				<? if($Pages[$i]['menuid'] == 3){ ?>
					<li>
						<a href="page.php?id=<? echo $Pages[$i]['id']; ?>"><? echo $Pages[$i]['name']; ?></a>
					</li>
				<? } ?>
				<? } ?>
            </ul>   
            <div class="space20"></div>   
          </div>
          <div class="col-md-3 col-sm-6">
            <h4>Підписка</h4>
            Підпишіться на нашу розсилку, щоб першими взнавати про знижки та спеціальні пропозиції.
            <div class="space20"></div>  
                           
            <!-- Newsletter Input -->
            <div class="input-group">
			<? if(isset($_POST['sendmail'])){
				$User_obj->addMail();
			} ?>
			<form method="POST" style="display: flex;"> 
              <input type="text" class="form-control" name="mailss" placeholder="Ваш e-mail"  >
              <span class="input-group-btn">
                <button class="btn" name="sendmail" type="button" ><i class="fa fa-envelope"></i></button>
              </span>
			 </form>
            </div>

            <div class="space20"></div>   
          </div> 
        </div>
        
        <div class="row space40"></div> 
        
      </div>
    </div>
    
    <div class="strip-divider"></div>                            

    <div class="container">

      <div class="row space60"></div> 

      <div class="row copyright-container">
        <div class="col-md-1">
          <img src="<? echo $Sitedata['siteimg']; ?>" class="logo-footer" alt="">
        </div>
        <div class="col-md-6">
          <div class="copyright">
            
          </div>
        </div>
        <div class="col-md-5">
        
          <div class="social">
            <a href="<? echo $Sitedata['facebook']; ?>"><i class="fa fa-facebook"></i></a>
            <a href="<? echo $Sitedata['google']; ?>"><i class="fa fa-google"></i></a>
            <a href="<? echo $Sitedata['vk']; ?>"><i class="fa fa-vk"></i></a>
            <a href="<? echo $Sitedata['twitter']; ?>"><i class="fa fa-twitter"></i></a>
            <a href="<? echo $Sitedata['youtube']; ?>"><i class="fa fa-youtube"></i></a>
          </div> 
          <div>                                
          </div>                                
        </div>
      </div>   
	
    </div>
    <div class="space60"></div>  
    <div style="float:right;margin-top:-25px;margin-right:5px;"> Розробник <a href="https://vk.com/jokartaros">Назар Григорчук</a></div>
  </div>   
  <!-- Footer End-->

  <!-- JavaScripts -->
  <script type="text/javascript" src="js/jquery-1.10.2.js"></script>                                                       
  <script type="text/javascript" src="js/bootstrap.js"></script>  
  <script type="text/javascript" src="js/jquery.easing.js"></script>  
  <script type="text/javascript" src="js/jquery.sticky.js"></script> 
  <script type="text/javascript" src="js/selectnav.js"></script>        
  <script type="text/javascript" src="js/animate.js"></script>
  <script type="text/javascript" src="js/jquery.fitvids.js"></script> 
  <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
  <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script> 
  <script type="text/javascript" src="js/retina.js"></script> 
  <script type="text/javascript" src="js/respond.min.js"></script> 
  <script type="text/javascript" src="js/scale.fix.js"></script>
  <script type="text/javascript" src="js/jquery.countdown.js"></script> 
	<script type="text/javascript" src="js/jquery.flexslider-min.js"></script> 
  <script type="text/javascript" src="js/functions.js"></script> 
                                      
</body>
</html>
         