<? include('header.php'); ?>
  <!-- Header End -->

  <div class="space40"></div>

  <div class="container">       
    <div class="row"> 
      <div class="col-md-12">

        <div class="breadcrumb-container">
          <h1>Інформація про товар</h1>  
          
          <ol class="breadcrumb">
            <li><a href="index.php">Головна</a></li>
            <li><a href="shop.php">Магазин</a></li>
            <li class="active">Інформація про товар</li>
          </ol>
        </div>   
          
      </div>
    </div>    
  </div>          
  
  <div class="space20"></div>

<? $item = $Items_obj->getItemById($_GET['id']); ?>
  <div class="container">       
    <div class="row"> 
      <div class="col-md-12">       
        <h3><? echo $item[0]['name'] ?></h3>    
      </div>  
    </div> 
  </div> 
  
  <div class="container">       
    <div class="row"> 
      <div class="col-md-8">

        <center><img src="<? echo $item[0]['img'] ?>" alt="" style="width:400px" ></center>

      </div>  
	  <div class="col-md-4">

        <div class="shipping_calculator col-md-8 col-md-offset-2">
		<center>
			<h3>Вартість</h3>
			<h2 class="new-price"><? echo $item[0]['price']; ?> грн</h2>
			<div class="space30"></div> 
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
		</center>
		</div>
      </div>  
    </div>   
  </div> 
  
  <div class="space50"></div> 
  
  <div class="container">       
    <div class="row"> 
      <div class="col-md-12">

        <h3>Опис</h3>
            
        <!-- Tabs -->
        <div class="tabbable">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-pencil"></i>Опис</a></li>
            <li><a href="#tab1-2" data-toggle="tab"><i class="fa fa-cloud-download"></i>Короткі характеристики</a></li>
            <li><a href="#tab1-3" data-toggle="tab"><i class="fa fa-folder-open"></i>Усі характеристики</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab1-1">
				<? echo $item[0]['desc1'] ?>
            </div>
            <div class="tab-pane" id="tab1-2">
				<? echo $item[0]['desc2'] ?>
            </div>
            <div class="tab-pane" id="tab1-3">
				<? echo $item[0]['desc3'] ?>
            </div>
          </div>
        </div>
        <!-- Tabs End -->
        
      </div>  
    </div> 
  </div> 
  
  <div class="space50"></div> 
  
  <div class="container">       
    <div class="row"> 
      <div class="col-md-12">

        <h3>Коментарі</h3>    

      	<article id="comments" class="comments-area">
  				<ol class="commentlist">
					<? $comments = $Comments_obj->getCommentsByItemID($_GET['id']); ?>
					<? if($comments['count']>0){ ?> 
					<? for($i=0; $i<$comments['count'];$i++){ ?>
  					<li>
  						<article>
  							<div class="comment-author vcard">
  								<img alt="" src="<? echo $comments[$i]['avatar']; ?>" class="avatar avatar-60 photo" style="width:70px;height:70px">
  							</div><!-- .comment-meta -->
  							<section class="comment-content">
  								<p class="comment-meta">
  									<cite class="fn"><? echo $comments[$i]['username']; ?></cite>
  									  
  									<time>
  										<a><? echo $comments[$i]['datetime']; ?></a>
  									</time>
  								</p>
  								<p>
  									<? echo $comments[$i]['text']; ?>
  								</p>
  							</section><!-- .comment-content -->
  						</article><!-- #comment-## -->
  						
  					</li>
  					<? } ?>
  					<? }else{ ?>
						<center>Коментарів ще немає</center>
					<? } ?>
  				</ol><!-- .commentlist -->
        </article>

      </div>  
    </div> 
  </div> 
  
  <div class="space40"></div> 
  
  <div class="container">       
    <div class="row"> 
      <div class="col-md-12">

        <div class="respond-wrapper clearfix">
					<div id="respond" style="width:100%;">
						<h3 id="reply-title">Залишити відповідь <small></h3>
						<? if($checker!='unloginned'){ ?>
						<? if(isset($_POST['submitcomm'])){
							$Comments_obj->sendComm($_GET[id],$userData['id'] );
						} ?>
						<form method="post" id="commentform">
						
							<p class="comment-form-comment">   
								<textarea id="comment" name="comment" placeholder="Коментар"></textarea>  
							</p>
							<p class="form-submit">
								<input name="submitcomm" type="submit" id="submit" value="Добавити коментар" class="btn">
							</p>
						</form>
						<? }else{ ?>
							<a href="http://vzyhvzyh.xyz/my-account.php">Авторизуйтесь</a> щоб залишити коментар.  
						<? } ?>
					</div>
					<div class="speech-bubble"><h3>Дякуємо за коментар</h3></div>
				</div>

      </div>  
    </div> 
  </div> 
  
  <div class="space60"></div> 
<? include('footer.php'); ?>