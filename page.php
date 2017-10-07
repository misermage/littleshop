<? include('header.php'); ?>
  <!-- Header End -->
	<? $Page = $Pages_obj->getPageById($_GET['id']); ?>
  <div class="space40"></div>

  <div class="container">       
    <div class="row"> 
      <div class="col-md-12">

        <div class="breadcrumb-container">
          <h1><? echo $Page['name']; ?></h1>
          
          <ol class="breadcrumb">
            <li><a href="index.php">Головна</a></li>
            <li class="active"><? echo $Page['name']; ?></li>
          </ol>
        </div>  
          
      </div>
    </div>    
  </div>          
  
  <div class="space40"></div>

    
  <div class="container">
    <div class="row">
      <div class="col-md-12">
			<? echo $Page['content']; ?>
      </div> 
    </div> 
  </div>         
           
  
  <div class="space40"></div> 

 
  
  
<? include('footer.php'); ?>