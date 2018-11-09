<?php 
session_start();
$id=$_SESSION['id'];
$nameac=$_SESSION['name'];
if(isset($_POST['sub'])){

	if(empty($_POST['content'])){
		$_SESSION['mass']='Vui lòng nhập nội dung';
	}

	if(empty($_POST['title'])){
		$_SESSION['mass2']='Vui lòng nhập tên công ty';
	}
	if(!empty($_POST['content'])&&!empty($_POST['title'])){
   $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $type = $_FILES['file']['type'];
     $max_size = 100000;
  if(isset($name) && !empty($name)){
    $extension = substr($name, strpos($name, '.') + 1);
    if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $extension == $size<=$max_size){
        $location = "uploads/";
        move_uploaded_file($_FILES['file']['tmp_name'], $location.$name);
        $servername="localhost";
	$username="root";
	$password="";
	$dbname="user";
	$conn=new mysqli($servername,$username,$password,$dbname);
	if($conn->connect_error){
		die("Connetion fialed".$conn->connect_error);
	}

	mysqli_set_charset($conn,"utf8");
	$sql=("INSERT into postcty(ID_Post,FactoryName_Post,Post,CreateDate,Updatedate,Titel,Adress,job,LogoName,LogoSize,LogoType,LogoLocation) values($id,'$nameac','$_POST[content]',now(),now(),'$_POST[title]','$_POST[provinces]','$_POST[industry]','$name','$size','$type','$location$name')")or die(mysql_error());
	$result=$conn->query($sql);
	if($result===true){
	$_SESSION['mass1']='Đăng bài thành công';

	}
    }

}
else{
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="user";
	$conn=new mysqli($servername,$username,$password,$dbname);
	if($conn->connect_error){
		die("Connetion fialed".$conn->connect_error);
	}

	mysqli_set_charset($conn,"utf8");
	$sql=("INSERT into postcty(ID_Post,FactoryName_Post,Post,CreateDate,Updatedate,Titel,Adress,job) values($id,'$nameac','$_POST[content]',now(),now(),'$_POST[title]','$_POST[provinces]','$_POST[industry]')")or die(mysql_error());
	$result=$conn->query($sql);
	if($result===true){
	$_SESSION['mass1']='Đăng bài thành công';

	}
}
}

}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Đăng tuyển tìm nhân viên</title>
 		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
 		<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.css">
 		<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.min.css">

 </head>
 <body>
 	<form method="POST" enctype="multipart/form-data">
 	<div class="container">
 	<div class="row">
 	</div>
 	<h1 align="center">Đăng bài tuyển nhân viên</h1>
 <div class="row">
 	
<div class="col-lg-2">

</div>
<div class="col-lg-8" >
	<input type="text" name="title" placeholder="Tên công ty" size="100%">
	<?php if (isset($_SESSION['mass2'])): ?>
 			<p style="color: red"><?php echo $_SESSION['mass2'] ?></p>
 		<?php endif; unset($_SESSION['mass2']) ?>

</div>
<div class="col-lg-2">

</div>

 </div>
 <div class="row">
 	<div class="col-lg-2">

 	</div >
 	<div class="col-lg-8">
	Nơi làm việc:<select class="select2-multiple" name="provinces"  size=""><option >Hồ Chí Minh</option><option >Hà Nội</option><option >Đà Nẵng</option><option >An Giang</option><option >Bà Rịa - Vũng Tàu</option><option >Bắc Cạn</option><option >Bắc Giang</option><option >Bạc Liêu</option><option >Bắc Ninh</option><option >Bến Tre</option><option >Bình Định</option><option >Bình Dương</option><option >Bình Phước</option><option >Bình Thuận</option><option >Cà Mau</option><option >Cần Thơ</option><option >Cao Bằng</option><option >Đắk Lắk</option><option >Đăk Nông</option><option >Điện Biên</option><option >Đồng Nai</option><option >Đồng Tháp</option><option >Gia Lai</option><option >Hà Giang</option><option >Hà Nam</option><option >Hà Tây</option><option >Hà Tĩnh</option><option >Hải Dương</option><option >Hải Phòng</option><option >Hậu Giang</option><option >Hòa Bình</option><option >Hưng Yên</option><option >Kiên Giang</option><option >Khánh Hòa</option><option >Kon Tum</option><option >Lai Châu</option><option >Lâm Đồng</option><option >Lạng Sơn</option><option >Lào Cai</option><option>Long An</option><option >Nam Định</option><option >Nghệ An</option><option >Ninh Bình</option><option >Ninh Thuận</option><option >Phú Thọ</option><option >Phú Yên</option><option >Quảng Bình</option><option >Quảng Nam</option><option >Quảng Ngãi</option><option >Quảng Ninh</option><option >Quảng Trị</option><option >Sóc Trăng</option><option >Sơn La</option><option >Tây Ninh</option><option >Thái Bình</option><option >Thái Nguyên</option><option >Thanh Hóa</option><option>Thừa Thiên - Huế</option><option >Tiền Giang</option><option >Trà Vinh</option><option>Tuyên Quang</option><option >Vĩnh Long</option><option >Vĩnh Phúc</option><option>Yên Bái</option>
	</select>
	Ngành nghề:<select name="industry" >
	        <option >An Ninh / Bảo Vệ</option><option >An Toàn Lao Động</option><option >Bán hàng</option><option >Bán lẻ / Bán sỉ</option><option >Báo chí / Biên tập viên / Xuất bản</option><option >Bảo hiểm</option><option >Bảo trì / Sửa chữa</option><option >Bất động sản</option><option >Biên phiên dịch / Thông dịch viên</option><option >Biên phiên dịch (tiếng Nhật)</option><option >Chăm sóc sức khỏe / Y tế</option><option >CNTT - Phần cứng / Mạng</option><option >CNTT - Phần mềm</option><option >Dầu khí / Khoáng sản</option><option >Dệt may / Da giày</option><option >Dịch vụ khách hàng</option><option >Điện lạnh / Nhiệt lạnh</option><option >Dược / Sinh học</option><option >Điện / Điện tử</option><option >Đồ Gỗ</option><option >Giáo dục / Đào tạo / Thư viện</option><option >Hàng gia dụng</option><option >Hóa chất / Sinh hóa / Thực phẩm</option><option >Kế toán / Kiểm toán</option><option >Khách sạn / Du lịch</option><option >Kiến trúc</option><option >Kỹ thuật ứng dụng / Cơ khí</option><option >Lao động phổ thông</option><option >Môi trường / Xử lý chất thải</option><option >Mới tốt nghiệp / Thực tập</option><option >Ngân hàng / Chứng khoán</option><option >Nghệ thuật / Thiết kế / Giải trí</option><option >Người nước ngoài</option><option >Nhà hàng / Dịch vụ ăn uống</option><option >Nhân sự</option><option >Nội thất / Ngoại thất</option><option >Nông nghiệp / Lâm nghiệp</option><option >Ô tô</option><option >Pháp lý / Luật</option><option >Phi chính phủ / Phi lợi nhuận</option><option >Quản lý chất lượng (QA / QC)</option><option >Quản lý điều hành</option><option >Quảng cáo / Khuyến mãi / Đối ngoại</option><option >Sản xuất / Vận hành sản xuất</option><option >Tài chính / Đầu tư</option><option >Thời trang</option><option >Thuỷ Hải Sản</option><option >Thư ký / Hành chánh</option><option>Tiếp thị</option><option >Tư vấn</option><option >Vận chuyển / Giao thông / Kho bãi</option><option >Vật tư / Mua hàng</option><option >Viễn Thông</option><option >Xây dựng</option><option >Xuất nhập khẩu / Ngoại thương</option><option >Khác</option></select>
	        Logo <input type="file" name="file" id="InputFile">
	        </div>

</div>

<div class="col-lg-2">

</div>

 </div>
 <div class="row">
 	<div class="col-lg-2">
 		
 	</div>
 	<div class="col-lg-8" >
 		<textarea name="content" placeholder="Nội dung" rows="10" cols="100" ></textarea>
 		<?php if (isset($_SESSION['mass'])): ?>
 			<p style="color: red"><?php echo $_SESSION['mass'] ?></p>
 		<?php endif; unset($_SESSION['mass']) ?>

 	</div>
 	<div class="col-lg-2">

 	</div>

 </div>
 <div class="row">
 	<div class="col-lg-2">
 		
 	</div>
 	<div class="col-lg-4">
 		
 	</div>
 	<div class="col-lg-4" align="center">
 		<button type="submit" class="btn btn-warning" name="sub">Đăng bài</button>
 		<?php if (isset($_SESSION['mass1'])): ?>
 			<p style="color: red"><?php echo $_SESSION['mass1'] ?></p>
 		<?php endif; unset($_SESSION['mass1']) ?>
 	</div>
 	<div class="col-lg-2">
 		
 	</div>

 </div>
</div>

</form>

<script type="text/javascript">
	$(document).ready(function() {
  $(".select2-multiple").select2();
  placeholder: "Select a state",
  allowClear: true
}	;
  
</script>
<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
			<script src="bootstrap/js/bootstrap.min.js"></script>
 </body>
 </html>