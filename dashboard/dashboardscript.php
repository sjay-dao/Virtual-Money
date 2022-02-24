<script type="text/javascript">

	$(function(){
		loadTbl();
	});

	function loadTbl(){
		$('#modal_edit').hide()
		var key  = $("#txtsearchinquiry").val();
   
	    $.ajax({
	        type: 'POST',
	        url: 'dashboard/dashboardclass.php',
	        data: 'key='+key+
	        '&form=loadtblsample',
	        success: function(data) {
	            $("#tblsample").html(data);
	           
	        }
	    });
	}

	function editUser(row){
		console.log(row);
		$("#modal_edit").show();
		loadExistingUserData(row);
	}

	function loadExistingUserData(row){
		let name = row['name'].split("*");
		  $("#firstname").val(name[0]);
		  $("#lastname").val(name[2]);
		  $("#middlename").val(name[1]);
          
            $("#contact").val(row['contact']);
            $("#email").val(row['email']);
            $("#user_code").val(row['user_code']);
            $("#profileImage").attr("src", row['imageurl']);

	}
</script>