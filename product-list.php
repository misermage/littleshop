<? include('header.php'); ?>
  <!-- Header End -->

  <div class="space40"></div>

  <div class="container">       
    <div class="row"> 
      <div class="col-md-12">

        <div class="breadcrumb-container">
          <h1>Магазин - Список товарів</h1>
          
          <ol class="breadcrumb">
            <li><a href="index.php">Головна</a></li>
            <li><a href="product-list.php">Магазин</a></li>
            <li class="active">Список товарів</li>
          </ol>
        </div>  
          
      </div>
    </div>    
  </div>          
  
  <div class="container">
    <div class="row"> 
      <div class="col-md-3">
      
        <div class="shop-sidebar">
          <div class="space15"></div>
  
          <h4><? if($_GET['cat']!=0){ echo $Items_obj->getCategoryName($_GET['cat']);}else{ ?>Категорії<? } ?></h4>
 
          <? $heads = $Items_obj->getCategories($_GET['cat']); ?>
		  <? for($i=0;$i<$heads['count'];$i++){ ?>
          <a href="product-list.php?cat=<? echo $heads[$i]['id']; ?>"><h6 style="padding:0px; margin:0;"><? echo $heads[$i]['name']; ?></h6></a>
          <ul class="list-2">
		  <? $next = $Items_obj->getCategories($heads[$i]['id']); ?>
		  <? if($next['count']>0){ ?>
		  <? for($k=0;$k<$next['count'];$k++){ ?>
            <li>
              <a href="product-list.php?cat=<? echo $next[$k]['id']; ?>"><i class="fa fa-chevron-right"></i><? echo $next[$k]['name']; ?></a>
            </li>
		  <? } ?>
		  <? } ?>
          </ul>
          
          <div class="space20"></div>   
		  <? } ?>
        </div>  

      </div>
      <div class="col-md-9">
        
        <div class="space20"></div> 
        
        <!-- Filter     
        <div class="product-filter">
          <div class="filter-item">
            Show: 12 <a href="#"><i class="fa fa-angle-down"></i></a>
          </div>  
          <div class="filter-item">
            Sort By: Position <a href="#"><i class="fa fa-angle-down"></i></a>
          </div>  
          <button class="btn"><i class="fa fa-long-arrow-up"></i></button>
          <div class="filter-item-right">
            View By: <a href="#"><i class="fa fa-th-large"></i></a><a href="#"><i class="fa fa-align-justify"></i></a>
          </div> 
        </div>  
         Filter End -->
        
        <div class="space30"></div>  
        
        <div class="row">
			<? $items = $Items_obj->getFromCategory($_GET['cat'],$_GET['page']); ?>
			<? if($items['count']>0){ ?>
			<? for($i=0;$i<$items['count'];$i++){ ?>
          <div class="col-md-12">
            <div class="product-list-item">
            
              <img src="<? echo $items[$i]['img'] ?>" alt="" style="padding:10px;">        
              <div class="product-list-data">
                <a href="product-detail.php?id=<? echo $items[$i]['id'] ?>"><h3><? echo $items[$i]['name'] ?></h3></a>
                <div class="product-list-data-inner"> 
                  <div class="cart-item-price"> 
                    <span class="new-price" style="padding:0"><? echo $items[$i]['price'] ?> грн</span>
                  </div>
                  <div class="cart-item-stars"> 
                    <div class="rating-shop-item">
                      <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                    </div>
                  </div>
                </div>
                <div>
                  <? echo $items[$i]['short_desc'] ?>
                </div>
				<div class="space20"></div> 
                <? 
					if(isset($_POST['add'.$items[$i]['id']])){
						$Items_obj->addToCart($items[$i]['id']);
					} 
				?>
				<? if($Items_obj->checkfor($items[$i]['id'])){ ?>
					<a href="checkout.php"><button class="btn btn-primary btn-sm" name="add<? echo $items[$i]['id']; ?>">Уже в корзині</button></a>
				<? }else{ ?>
					<form method="POST"><button class="btn btn-primary btn-sm" name="add<? echo $items[$i]['id']; ?>">Добавити в корзину</button></form>
				<? } ?>
              </div> 
                            
            </div>  
          </div>  
			<? } ?>
			<? }else{ ?>
			Товарів немає  
			<? } ?> 
        </div>
        <? $k = 10*$_GET['page']; ?>
		<? $num_pages = $items['max_count']/10 + 1; ?>
        <div class="row">
          <div class="col-md-4">
            <div class="items-info">
              Товари з <? echo $k; ?> по <? echo $k+10; ?>, усього <? echo $items['max_count']; ?>
            </div>  
          </div>
		  <? if($items['max_count']>10){ ?>
          <div class="col-md-8">
            <!-- Pagination -->            
            <ul class="pagination">
              <li><a href="product-list.php?cat=<? echo $_GET['cat']; ?>&page=<? if($_GET['page']-1>0){ echo $_GET['page']-1; }else{echo 0;}; ?>">&laquo;</a></li>
              <? for($i=0;$i<$num_pages;$i++){ ?>
			  <li <? if($_GET['page']==$i){ ?> class="active"<? } ?>><a href="product-list.php?cat=<? echo $_GET['cat']; ?>&page=<? echo $i; ?>"><? echo $i+1; ?></a></li>
			  <? } ?>
              <li><? if($_GET['page']<$num_pages){ ?><a href="product-list.php?cat=<? echo $_GET['cat']; ?>&page=<? echo $_GET['page']+1; ?>"><? } ?>&raquo;<? if($_GET['page']<$num_pages){ ?></a><? } ?></li> 
            </ul>               
            <!-- Pagination End -->
          </div> 
		 <? } ?>
        </div>  
        

      </div>     
    </div>   
  </div>   
     
  <div class="space40"></div> 
      

 
  <!-- Footer -->
  <? include('footer.php'); ?>
  