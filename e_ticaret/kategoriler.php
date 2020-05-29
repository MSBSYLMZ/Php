<?php include 'header.php';

if (isset($_GET['sef'])) {

	$kategorisor=$db->prepare("SELECT * FROM kategori where kategori_seourl=:seourl");
	$kategorisor->execute(array(
		'seourl'=>$_GET['sef']

	));

	$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);
	$kategori_id=$kategoricek['kategori_id'];





	$urunsor=$db->prepare("SELECT * FROM urun where kategori_id=:kategori_id");

	$urunsor->execute(array(
	'kategori_id'=>$kategori_id
	));
}else {
	$urunsor=$db->prepare("SELECT * FROM urun");

	$urunsor->execute();


}


?>


<!--end main-nav -->

<div class="container">
	
	<div class="row">
		<div class="col-md-9"><!--Main content-->
			<div class="title-bg">
				<div class="title">Ürünler</div>
				<!--	<div class="title-nav">
						<a href="category.htm"><i class="fa fa-th-large"></i>grid</a>
						<a href="category-list.htm"><i class="fa fa-bars"></i>List</a>
					</div>-->
				</div>
				<div class="row prdct"><!--Products-->
					<?php 
					if ($urunsor->rowCount()==0) {

						echo "Ürün Bulunamadı";
					}
					
					while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {
						?>

						<div class="col-md-4">
							<div class="productwrap">
								<div class="pr-img">
									<div class="hot"></div>
									<a href="<?php echo "urun-".seo($uruncek["urun_ad"]).'-'.$uruncek["urun_id"] ?>"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
									<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice">$314</span><?php echo $uruncek['urun_fiyat'] ?></span></div></div>
								</div>
								<span class="smalltitle"><a href="product.htm"><?php echo $uruncek['urun_ad'] ?></a></span>
								<span class="smalldesc">Ürün Kodu:<?php echo $uruncek['urun_id'] ?></span>
							</div>
						</div>

					<?php } ?>
				</div><!--Products-->
<!--

			<ul class="pagination shop-pag">
					<li><a href="#"><i class="fa fa-caret-left"></i></a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
				</ul>   -->

			</div>
			<?php include 'sidebar.php'?>

			<!--sidebar-->
		</div>
		<div class="spacer"></div>
	</div>
	
	<?php include 'footer.php' ?>