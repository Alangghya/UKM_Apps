<html>
	<head>
		<h1>DAFTAR UKM</h1>
		<style>
			#headerContent{
				width:30%;
				//border:2px solid;
				//-moz-border-radius:15px; /* Firefox 3.6 and earlier */
			}
			#penjelasan{
				position: absolute;
				top: 10%;
				left:25%;
			}
			#detail_penjelasan{
				position: absolute;
				top: 10%;
				left:45%;
			}
			#entryUKMarea{
				width:20%;
				background-color: #9ACD32;
				box-shadow: 10px 10px 10px #888888;
			}
			th{
				background-color: #DAA520;
			}
			
			.1{
				background-color: lightblue;
			}
			.2{
				background-color: lightgreen;
			}
		</style>
		<script src="http://localhost:8989/prak_UKM/js/jquery.js"></script>
		<script>
		var bu='http://localhost:8989/prak_UKM/index.php/utama/';
			function doLogout(){
				var data={}
			
				$.post(bu+'logout',data,function(xxx){
					document.location="http://localhost:8989/prak_UKM/index.php/utama/login";				
				})
			}
			
			function doEdit(e){
				var data={};	
				data['id']=e;			
				$.post(bu+'editPenjelasan',data,function(xxx){
					$('#penjelasan').html(xxx);				
				});
			}
			
			function EditIt(e){
				var data={};	
				data['id']=e;	
				data['isi']=$('#t_NamaUKM').val();
				
				if (confirm('Setuju Mengganti Menjadi : '+data['isi']+" ?")){
					$.post(bu+'updateNamaUKM',data,function(xxx){
						$('#c').html(xxx);				
					});
				}	
			}
			
			function DetailIt(e){
				var data={};	
				data['id']=e;
				data['id_ukm']=$('#hide_UKM').val();			
				$.post(bu+'detailPeserta',data,function(xxx){
					$('#detail_penjelasan').html(xxx);				
				})
			}
			
						
			function doIT(){
				alert('DO IT!');
			}
			
			function myDetail(t){
				//alert(t);
				
				var data={};	
				data['nama']=t;			
				$.post(bu+'mydetail',data,function(xxx){
					$('#penjelasan').html(xxx);				
				})
			}
			
			function DeleteIt(e){
				var data={}
				data['idUKM']=e;			
				$.post(bu+'deleteUKM',data,function(xxx){
					//$('#penjelasan').html(xxx);		
					alert('UKM telah hilang');
					document.location="http://localhost:8989/prak_UKM/index.php/utama/manage";		
				})
			}
			
			function register_me(e){
				//alert(e);
				var data={};
				
				
				data['ID_UKM']=$('#hide_UKM').val();
				data['ID_Peserta']=<?php echo $this->session->userdata('id'); ?>;
				
				$.post(bu+'registerPeserta',data,function(x){
					$('#detail_penjelasan').html(x);
				});
				
			}
			
			 $(document).ready(function(){
			 	$('#bSubmitUKM').click(function(){
			 		if ($('#t_calonNamaUKM').val()==''){
			 			alert('Masukan Nama UKM');
			 		}else{
			 			$.ajax({
	                    type: "POST",
	                    url: bu+'insertNEW_UKM/'+$('#t_calonNamaUKM').val(),
	                    success: function(msg) {
	                        $('#c').html(msg);
	                    }
                    });
			 		}
			 		//alert(bu+'insertNEW_UKM/'+$('#t_calonNamaUKM').val());
			 		
			 	});
			 });
		</script>
	</head>
	<body>
		<div id="headerContent">
			<p>Selamat Datang : <?php echo $this->session->userdata('Nama') ?> || 
			<a onclick="myDetail('<?php echo strtolower($this->session->userdata('Nama')) ?>')" href="#">MyDetails</a> ||
			<a onclick="doLogout()" href="#">LogOut</a>
			</p>
		</div>
		
		<div id="content">
			<div id="c">
				<table>
					<tr>
						<th>NO</th>
						<th>Nama UKM</th>
						<th>Pembuat</th>
					</tr>
					<?php $tweet=0; foreach($rows as $row){ ++$tweet; ?>
					<tr class="<?php if($tweet%2==0){echo "2";}else{echo "1";} ?>">
						<td>
							<?php //if (strtolower($this->session->userdata('Nama'))=='pek'){echo "a";} ?>
							<input type="button" id="<?php echo $row->ID_UKM?>" value="<?php echo $row->ID_UKM?>" onclick="doEdit(<?php echo $row->ID_UKM?>)">
						</td>
						<td><?php echo $row->NamaUKM?></td>
						<td><?php echo $row->Nama?></td>
					</tr>
					<?php }?>
				</table>
			</div>
			<div id="test">
					<!--nothing here-->		
			</div>
			<div id='entryUKMarea'>
				<table>
					<tr>
						<td>Nama UKM : </td>
						<td><input id="t_calonNamaUKM" type="text"></td>
					</tr>
					<tr>
						<td></td>
						<td><input id='bSubmitUKM' type="button" value="Add UKM"></td>
					</tr>
				</table>
			</div>
			<div id="penjelasan">
				
			</div>
			<div id="detail_penjelasan">
				
			</div>
		</div>
				
	</body>
</html>