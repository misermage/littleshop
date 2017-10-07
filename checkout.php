<? include('header.php'); ?>
  <!-- Header End -->

  <div class="space40"></div>

  <div class="container">       
    <div class="row"> 
      <div class="col-md-12">

        <div class="breadcrumb-container">
          <h1>Корзина</h1>
          
          <ol class="breadcrumb">
            <li><a href="index.php">Головна</a></li>
            <li><a href="shop.php">Магазин</a></li>
            <li class="active">Корзина</li>
          </ol>
        </div>  
          
      </div>
    </div>    
  </div>          
  
  <div class="space20"></div>

  <div class="container">       
    <div class="row"> 
      <div class="col-md-12">

        <h3>БУДЬ ЛАСКА, ПЕРЕГЛЯНЬТЕ СВОЄ ЗАМОВЛЕННЯ</h3>
        
        <!-- Checkout Products -->
				<? if(isset($_GET['delete'])){
					$Items_obj->deleteFromCart($_GET['delete']);
				} ?>
				<form action="#" method="post">
					<table class="shop_table cart bordered" cellspacing="0">
						<thead>
							<tr>
								<th class="product-info">Ім'я</th>
								<th class="product-code">Код товару</th>
								<th class="product-quantity">Кількість</th>
								<th class="product-price">Ціна за одиницю</th>
								<th class="product-subtotal">Сума</th>
							</tr>
						</thead>
						<tbody>
							<? $summ = 0; ?>
							<? if(isset($_COOKIE['cart_count']) && $_COOKIE['cart_count']>0){?>
							<? for($i=1;$i<=$_COOKIE['cart_count'];$i++){ ?>
							<? $pieces = explode(".", $_COOKIE['cart'.$i]); ?>
							<? $cart_item = $Items_obj->getItemById($pieces[0]); ?>
							<tr class="cart_table_item">
								<td class="product-info">
									<div class="product-thumbnail">
										<a href="#"><img src="<? echo $cart_item[0]['img']; ?>" alt="elephant" title="elephant"></a>
									</div>
									<div class="product-name">
										<a href="product-detail.php?id=<? echo $cart_item[0]['id']; ?>"><span class="h4"><? echo $cart_item[0]['name']; ?></span></a>
										
									</div>
								</td>
								<!-- The code -->
								<td class="product-code">
									<center><? echo $cart_item[0]['id']; ?></center>
								</td>
								
								<!-- Quantity inputs -->
								<td class="product-quantity">
									<div class="quantity buttons_added">
									<? 
										if(isset($_POST['changeqty'.$Items_obj->getCartItemID($_COOKIE['cart'.$i])])){
											$Items_obj->changeQty($_COOKIE['cart'.$i]);
										}

									?>
									<form method="POST">
										<input type="text" name="qty" value="<? echo $Items_obj->getCartItemCount($_COOKIE['cart'.$i]); ?>" class="qty text" ><br>
										<input type="submit" value="Змінити" class="btn qty-update dark" name="changeqty<? echo $Items_obj->getCartItemID($_COOKIE['cart'.$i]); ?>">
									</form>
									</div>
									<a href="?delete=<? echo $_COOKIE['cart'.$i]; ?>" class="remove" title="Видалити товар">×</a>
									
								</td>
								<!-- Product price -->
								<td class="product-price" style="text-align:center"><span><? echo $cart_item[0]['price']; ?> грн</span></td>

								<!-- Product subtotal -->
								<td class="product-subtotal"><span><? echo $cart_item[0]['price']*$pieces[1]; $summ+=$cart_item[0]['price']*$pieces[1]; ?> грн</span></td> 
							</tr>
							<? } ?>
							<? }else{ ?>
								<tr>
									<td colspan="5">Корзина пуста</td>
								</tr>
							<? } ?>
						</tbody>
					</table>
				</form>
        <!-- Checkout Products End -->

      </div>  
    </div> 
  </div> 
    
  <div class="space30"></div> 
  
  <div class="container">
    <div class="row">   
      <div class="col-md-8">
      
				<div class="">
					<h3>Оформлення замовлення</h3>
					
					<? if(isset($_POST['submitorder'])){
						$Items_obj->formOrder($userData['id']);
					} ?>
						<form class="shipping_calculator" method="POST">
						<? if($checker != 'unloginned'){ ?>
							<span>Залишити коментар</span>
							<section class="shipping-calculator-form">
								<div class="clear"></div>
								<p class="form-row form-row-wide">
									<textarea class="input-text" value="" placeholder="Коментар" name="comm" style="width:100%; margin-bottom:10px;"></textarea>
								</p>
	
							</section>
						<? }else{ ?>
							<a href="/my-account.php">Авторизуйтесь</a> щоб продовжити.
						<? } ?>

				</div>  
  
      </div>  
      <div class="col-md-4">
                   
				<div class="cart_totals omega">
					<h3>Оцінка</h3>
					<table class="bordered">
						<tbody>
							<tr>
								<th>Підсумок</th>
								<td><span><? echo $summ; ?> грн</span></td>
							</tr>
							<tr>
								<th>Ціна доставки</th>
								<td><span>35 грн</span></td>
							</tr>
							<tr>
								<th><strong>До сплати</strong></th>
								<td><strong><span><? echo $summ+35; ?> грн</span></strong></td>
							</tr>
						</tbody>
					</table>
				</div>
  
      </div>  
    </div> 

    <div class="row space50"></div> 

    <div class="row">   
      <div class="col-md-12">
  
  			<article class="payments">
  				<h3>Оплата та доставка</h3>
  				<div class="content">
  					Оплата проводиться покупцем при отриманні замовлення на відділенні Нової Пошти. 
					<br>Перед відправленням до вас зателефонує працівник інтернет магазину для уточнення деталей.
  					<? if($_COOKIE['cart_count']>0 && $checker != 'unloginned'){ ?><button class="btn f-right" name="submitorder">Підтвердити замовлення</button><?}else{ ?><button class="btn f-right" disabled>Підтвердити замовлення</button><? } ?>
					</form>
  				</div>
  			</article>
  
      </div>  
    </div> 
  </div>   
      
  <div class="space60"></div> 
  
 
 
  <!-- Footer -->
 <? include('footer.php'); ?>