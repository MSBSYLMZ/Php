<?php 
include 'header.php';
$denemesor=$db->prepare("SELECT * FROM deneme where deneme_id=:id");
$denemesor->execute(array(
  'id'=> 2
));
$denemecek=$denemesor->fetch(PDO::FETCH_ASSOC);

 ?>
<button name="deneme_durum" type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>

<?php 
if($denemecek['deneme_durum']==1){?>
	<button name="okey" type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>




<?php  }  ?>
