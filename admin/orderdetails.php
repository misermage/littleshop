<? include('header.php') ?>
<style>
.dataTables_filter{
	float:right;
}
.gradeX td{
	vertical-align: middle !important;
}
</style>
<?
	if(isset($_GET['delete'])){
		$Orders_obj->deleteItem($_GET['delete']);
	}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Деталі замовлення  <a href="addorderitem.php?id=<? echo $_GET['id']; ?>"><button type="button" class="btn btn-primary pull-right">Додати товар до замовлення</button></a></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-md-6 table-responsive">
					<div>
						<? 
						$Details = $Orders_obj->getOrderDetails($_GET['id']);
						$Items = $Orders_obj->getItemsByOrderId($_GET['id']);
						$Statuses = $Orders_obj->getAllStatuses($_GET['id']);
						
						?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<? if(isset($_POST['submit'])){
									$Orders_obj->editOrderItem($_GET['edit']);
								} ?>
							<? if(isset($_GET['edit'])){ ?><form method="POST"><?}?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Зображення</th>
                                        <th>Id товару</th>
                                        <th>Назва</th>
                                        <th>Кількість</th>
                                        <th>Адміністрування</th>
                                    </tr>
                                </thead>
                                <tbody>
									
									<? for($i=0;$i<$Items['count'];$i++){ ?>
                                    <tr class="odd gradeX">
                                        <td>
											<center>
											<? echo $i+1; ?>
											</center>
										</td>
                                        <td>
											<center><img src="<? echo $Items[$i]['img']; ?>" width="150px;"></center>
										</td>
                                        <td>
											<center>
											<? if($_GET['edit']==$Items[$i]['id']){ ?><input type="text" class="form-control" name="item_id" value="<?}?><? echo $Items[$i]['item_id']; ?><? if($_GET['edit']==$Items[$i]['id']){ ?>"><? } ?>
											</center>
										</td>
                                        <td>
											<? echo $Items[$i]['name']; ?>
										</td>
										<td>
											<center>
											<? if($_GET['edit']==$Items[$i]['id']){ ?><input type="text" class="form-control" name="count" value="<?}?><? echo $Items[$i]['count']; ?><? if($_GET['edit']==$Items[$i]['id']){ ?>"><? } ?>
											</center>
										</td>
										<td>
											<center>
											<? if($_GET['edit']==$Items[$i]['id']){ ?>
												<button type="submit" class="btn btn-success" name="submit">Зберегти</button>
											<? }else{ ?>
												<a href="?id=<? echo $_GET['id']; ?>&edit=<? echo $Items[$i]['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>		
												<a href="?id=<? echo $_GET['id']; ?>&delete=<? echo $Items[$i]['id']; ?>"><i class="fa fa-minus" aria-hidden="true"></i></a>
											<? } ?>
											</center>
										</td>
                                    </tr>
                                    <? } ?>
                                </tbody>
                            </table>
							<? if(isset($_GET['edit'])){ ?></form><?}?>
                            <!-- /.table-responsive -->
                             
							
                        </div>
                        <!-- /.panel-body -->
                    </div>
				</div>
				<div class="col-md-6">
					<? if(isset($_POST['refl'])){
						$Orders_obj->changeStatus($_GET['id']);
					} ?>
					<form method="POST">
						<table class="table table-striped">
							<tr>
								<th>Замовник</th>
								<td><? echo $Orders_obj->getUsername($Details['user_id']); ?></td>
							</tr>
							<tr>
								<th>Справжнє ім'я</th>
								<td><? echo $Details['realname']; ?></td>
							</tr>
							<tr>
								<th>Адреса</th>
								<td><? echo $Details['addr1']; ?></td>
							</tr>
							<tr>
								<th>E-mail</th>
								<td><? echo $Details['email']; ?></td>
							</tr>
							<tr>
								<th>Номер телефону</th>
								<td><? echo $Details['number']; ?></td>
							</tr>
							<tr>
								<th>Дата офрмлення замовлення</th>
								<td><? echo $Details['dateq']; ?></td>
							</tr>
							<tr>
								<th>Статус</th>
								<td>
									<select name="status">
										<? for($o=0;$o<$Statuses['count'];$o++){ ?>
										<option value="<? echo $Statuses[$o]['sid']; ?>" <? if($Details['status']==$Statuses[$o]['sid']){echo 'selected';} ?>><? echo $Statuses[$o]['name']; ?></option>
										<? } ?>
									</select>
								</td>
							</tr>
							<tr>
								<th>Сума до оплати</th>
								<td><? echo $Details['suma']; ?> грн</td>
							</tr>
							<tr>
								<th>Коментар</th>
								<td><? echo $Details['comm']; ?></td>
							</tr>
						</table>
						<button type="submit" class="btn btn-primary" name="refl">Прийняти зміни</button>
					</form>
				</div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	  <!-- DataTables JavaScript -->
    
<? include('footer.php'); ?>

