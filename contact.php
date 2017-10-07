<? include('header.php'); ?>
  <!-- Header End -->

  <div class="space40"></div>

  <div class="container">       
    <div class="row"> 
      <div class="col-md-12">

        <div class="breadcrumb-container">
          <h1>Контакти</h1>
          
          <ol class="breadcrumb">
            <li><a href="index.php">Головна</a></li>
            <li class="active">Контакти</li>
          </ol>
        </div>  
          
      </div>
    </div>    
  </div>          
  
  <div class="space20"></div>
      
  <div class="container">
    <div class="row contact-data">
      <div class="col-md-4">
        <h4>Адреса</h4>
				<? echo $Sitedata['address']; ?>
        <div class="space20"></div>
      </div>  
      <div class="col-md-4">
        <h4>Контактна інформація</h4>  
        <i class="fa fa-phone"></i> <? echo $Sitedata['telephone']; ?><br>
        <i class="fa fa-envelope"></i> <a href="mailto:<? echo $Sitedata['mail']; ?>"><? echo $Sitedata['mail']; ?></a><br>
        <i class="fa fa-globe"></i> <a href="<? echo $Sitedata['site']; ?>" rel="external"><? echo $Sitedata['site']; ?></a><br>
        <div class="space20"></div>
      </div>  
      <div class="col-md-4">
        <h4>Розпорядок роботи</h4>  
        <? echo $Sitedata['hours_of_work']; ?>
        <div class="space20"></div>
      </div>  
    </div>
  </div>

  <div class="space30"></div>
  
  <div class="container">
    <div class="row">
      <div class="col-md-12">                                                                                                                                                                                      
        <iframe id="map" src="<? echo $Sitedata['google_maps']; ?>"></iframe>
      </div>
    </div>
  </div> 

  <div class="space50"></div>  
  
  <div class="container">
    <div class="row">   

      <div class="col-md-6">    
         <h4>Контактна форма</h4> 
      
          <!-- Form -->
          <form role="form" name="ajax-form" id="ajax-form" action="php/mail-it.php" method="post" class="contact-form">
            <div class="row">            
              <div class="form-group col-sm-6">
                <label for="name2">І'мя</label>
                <input class="form-control" id="name2" name="name" onblur="if(this.value == '') this.value='І'мя'" onfocus="if(this.value == 'І'мя') this.value=''" type="text" value="І'мя">
                <div class="error" id="err-name">Будь ласка, введіть ваше ім'я</div>
              </div>
              <div class="form-group col-sm-6">
                <label for="email2">E-mail</label>
                <input  class="form-control" id="email2" name="email"  type="text"  onfocus="if(this.value == 'E-mail') this.value='';" onblur="if(this.value == '') this.value='E-mail';" value="E-mail">
                <div class="error" id="err-emailvld">Не коректно введено E-mail</div> 
              </div>
            </div>                
            <div class="row">            
              <div class="form-group col-md-12">
                <label for="message2">Повідомлення</label>
                <textarea class="form-control" id="message2" name="message" onblur="if(this.value == '') this.value='Повідомлення'" onfocus="if(this.value == 'Повідомлення') this.value=''">Повідомлення</textarea>
                <div class="error" id="err-message">Будь ласка, введіть повідомлення</div>     
              </div>
            </div> 
            <div class="row spacer30"></div>
            <div class="row">            
              <div class="col-md-12 text-center">
                <div id="ajaxsuccess">E-mail було успішно надіслано.</div>
                <div class="error" id="err-form">Виникли проблеми з перевіркою форми, перегляньте введені дані ще раз!</div>
                <div class="error" id="err-timedout">Немає зєднання з сервером!</div>
                <div class="error" id="err-state"></div>                 
                <button type="submit" class="btn btn-primary" id="send">Надіслати</button>
              </div>
            </div>
          </form>   
          <!-- Form End -->

      </div>         
      <div class="col-md-6">    
				<h4>Соціальні мережі</h4>
        <div class="social-2">
			<a href="<? echo $Sitedata['facebook']; ?>"><i class="fa fa-facebook"></i></a>
            <a href="<? echo $Sitedata['google']; ?>"><i class="fa fa-google"></i></a>
            <a href="<? echo $Sitedata['vk']; ?>"><i class="fa fa-vk"></i></a>
            <a href="<? echo $Sitedata['twitter']; ?>"><i class="fa fa-twitter"></i></a>
            <a href="<? echo $Sitedata['youtube']; ?>"><i class="fa fa-youtube"></i></a>
        </div> 
        

      </div>
      
    </div>    
  </div> 

  
  <div class="space60"></div> 

 
  <!-- Footer -->
<? include('footer.php'); ?>
         