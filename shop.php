<? include('header.php'); ?>
  <!-- Header End -->

  <div class="space40"></div>

  <div class="container">       
    <div class="row"> 
      <div class="col-md-12">

        <div class="breadcrumb-container">
          <h1>Магазин - Товари</h1>
          
          <ol class="breadcrumb">
            <li><a href="index.php">Головна</a></li>
            <li><a href="#">Магазин</a></li>
            <li class="active">Товари</li>
          </ol>
        </div>  
          
      </div>
    </div>    
  </div>          
  
  <div class="container">
    <div class="row"> 
      <div class="col-md-12">
		
        <div class="row space30"></div>  
			
        <div class="row">
			<? $list = $Items_obj->getList(20); ?>
			<? for($i=0;$i<$list['count'];$i++){ ?>
				<div class="col-md-4">
					<div class="product" style="min-height: 440px;">
					<div class="image-container" style="background:#fff;">
						<center><img src="<? echo $list[$i]['img']; ?>" alt="" style="padding:30px;width:auto;max-width:100%; height:300px;"></center>
					</div>  
					<div class="info">
						<h3><a href="product-detail.php?id=<? echo $list[$i]['id']; ?>"><? echo $list[$i]['name']; ?></a></h3>
						<div class="price"><? echo $list[$i]['price']; ?> грн</div>
					</div>  
					</div>  
				</div>      
			<? } ?>
        </div>

      </div>
    </div>
  </div>
          

  
  <div class="space20"></div> 
 
  <!-- Footer -->
<? include('footer.php'); ?>