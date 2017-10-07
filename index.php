<? include('header.php'); ?>
  <!-- Header End -->

  <!-- Flex-1 
  <div class="flex-1">
    <ul class="slides">
      <li>        
        <img src="img/flex/01.jpg" alt="">
      </li>
      <li>        
        <img src="img/flex/02.jpg" alt="">
      </li>
      <li>        
        <img src="img/flex/03.jpg" alt="">
      </li>
      <li>        
        <img src="img/flex/04.jpg" alt="">
      </li>
    </ul>
  </div>   
  Flex-1 End -->

  <div class="space20"></div>     
  <div class="container">
	<div class="col-md-12">
        
        <div class="space20"></div> 
 
        
        <div class="row">
        <? $list = $Items_obj->getList(4); ?>
		<? for($i=0;$i<$list['count'];$i++){ ?>
          <div class="col-md-6">
            <div class="product-list-item">
            
              <img src="<? echo $list[$i]['img']; ?>" alt="">        
              <div class="product-list-data">
                <a href="product-detail.php?id=<? echo $list[$i]['id']; ?>">
					<h3><? echo $list[$i]['name']; ?></h3>
				</a>
                <div class="product-list-data-inner"> 
                  <div class="cart-item-price"> 
                    <span class="new-price" style="padding-left:0;"><? echo $list[$i]['price']; ?> грн</span>
                  </div>
                  <div class="cart-item-stars"> 
                    <div class="rating-shop-item">
                      <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                    </div>
                  </div>
                </div>
                <div>
                  <? echo $list[$i]['short_desc']; ?>
                </div>
                <div class="space20"></div> 
				<? 
					if(isset($_POST['add'.$list[$i]['id']])){
						$Items_obj->addToCart($list[$i]['id']);
					} 
				?>
				<? if($Items_obj->checkfor($list[$i]['id'])){ ?>
					<a href="checkout.php"><button class="btn btn-primary btn-sm" name="add<? echo $list[$i]['id']; ?>">Уже в корзині</button></a>
				<? }else{ ?>
					<form method="POST"><button class="btn btn-primary btn-sm" name="add<? echo $list[$i]['id']; ?>">Добавити в корзину</button></form>
				<? } ?>
              </div> 
                            
            </div>  
          </div>   
		<? } ?>
          
        </div>                

      </div>
  </div>
  <div class="space20"></div> 
  <!-- Parallax -->
  
  
  <div class="space60"></div> 

 <? include('footer.php'); ?>