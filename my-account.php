<? include("header.php"); ?>
  <!-- Header End -->

  <div class="space40"></div>

  <div class="container">       
    <div class="row"> 
      <div class="col-md-12">

        <div class="breadcrumb-container">
          <h1>Мій акаунт <? if($checker!='unloginned'){ ?><a href="?logout=1" style="font-size:16px">Вихід</a><? } ?></h1> 
          
          <ol class="breadcrumb">
            <li><a href="index.php">Головна</a></li>
            <li class="active">Мій акаунт</li>
          </ol>
        </div>  
          
      </div>
    </div>    
  </div>          
  
  <div class="space20"></div>
	<? if($checker=='unloginned'){ ?>
  <div class="container login">
    <div class="row">
      <div class="col-md-6">
		<?
			if(isset($_POST['login'])){
				$User_obj->login();
			}
		?>
        <h3>Авторизація</h3>
        <form class="form-horizontal" role="form" method="POST">
          <div class="form-group">
            <div class="col-md-12">
              <input type="text" class="form-control" placeholder="Нікнейм" name="usname">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <input type="password" class="form-control" placeholder="Пароль" name="password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary" name="login">Увійти</button>
            </div>  
          </div>
        </form>
        <!--
        <a href="#">Forgot your password?</a>
		-->
      </div> 
      <div class="col-md-6">
		<?
			if(isset($_POST['reg'])){
				$User_obj->register();
			}
		?>
        <h3>Регістрація</h3>
        <form class="form-horizontal" role="form" method="POST">
          <div class="form-group">
            <div class="col-md-12">
              <input type="name" class="form-control" placeholder="Нікнейм" name="username">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <input type="email" class="form-control" placeholder="E-mail" name="mail">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <input type="password" class="form-control" placeholder="Пароль" name="pass">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary" name="reg">Створити акаунт</button>
            </div>  
          </div>
        </form>
        
      </div>   
    </div>
  </div> 
	<? }else{ ?>
	<div class="container login">
		<div class="col-md-6">
			<?
				if(isset($_POST['redag'])){
					$User_obj->changeData($_COOKIE['id']);
				}
			?>
			<h3>Редагування персональних даних</h3>
			<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="col-md-12">
					<input type="text" class="form-control" value="<? echo $userData['realname']; ?>" placeholder="ПІП" name="realname">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
					<input type="text" class="form-control" value="<? echo $userData['addr1']; ?>" placeholder="Адреса" name="addr">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
					<input type="text" class="form-control" value="<? echo $userData['number']; ?>" placeholder="Номер телефону" name="numb">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
					<input type="file" class="form-control" name="image">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
					<button type="submit" class="btn btn-primary" name="redag">Редагувати</button>
					</div>  
				</div>
			</form>
		</div>
		<div class="col-md-6">
			<h3>Замовлення</h3>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Дата</th>
						<th>Статус</th>
						<th>Вартість</th>
					</tr>
				</thead>
				<tbody>
					<? $orderlist = $Items_obj->getMyOrders($userData['id']); ?>
					<? if($orderlist['count']<1){ ?>
					<tr>
						<td colspan=4>Ви ще не здійснювали замовлень</td>
					</tr>
					
					<? }else{ ?>
					<? for($i=0;$i<$orderlist['count'];$i++){ ?>
					<tr>
						<td><? echo $orderlist[$i]['id']; ?></td>
						<td><? echo $orderlist[$i]['dateq']; ?></td>
						<td><? echo $orderlist[$i]['name']; ?></td>
						<td><? echo $orderlist[$i]['suma']; ?></td>
					</tr> 
					<? } ?>
					<? } ?>
				</tbody>
			</table>
		</div>
	</div>
	<? } ?>
  <div class="space60"></div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>Services</h4>
      </div> 
    </div> 
  </div>         
           
  <div class="container">
    <div class="row">
    
      <div class="col-md-4">    
        <div class="box-white">
          <h4>Innovation</h4>
          <p>
            Tocidunt lacerat, aliquam ac a natoque sagittis, portas turpis risus? Odio tincidunt! Nunc adipiscing a enim platea sociis magna! Odio amet et? Ut amet odio aliquam enim nec purus arcu, habitasse et dis nisi. Etiam pulvinar pulvinar porttitor sed vut porta lacus magna ultrices.
          </p>  
        </div>
      </div>   
      
      <div class="col-md-4">    
        <div class="box-gray">
          <h4>Consulting</h4>
          <p>
            Placerat, ancidunt vut velit platea amet? Phasellus turpis risus? Odio tincidunt! Nunc adipiscing a enim platea sociis magna! Odio amet et? Ut amet odio aliquam enim nec purus arcu, habitasse et dis nisi. Etiam pulvinar pulvinar porttitor sed vut porta lacus magna elementum.
          </p>  
        </div>
      </div>  
       
      <div class="col-md-4">    
        <div class="box-theme-color">
          <h4>Experiments</h4>
          <p>
            Sagittis, porta tincidunt vut velit platea amet? Phasellus turpis risus? Odio tincidunt! Nunc adipiscing a enim platea sociis magna! Odio amet et? Ut amet odio aliquam enim nec purus arcu, habitasse et dis nisi. Etiam pulvinar pulvinar porttitor sed vut porta lacus ultrices magna.
          </p>  
        </div>            
      </div>   
      
    </div> 
  </div>           

  

 
<? include("footer.php"); ?>
         