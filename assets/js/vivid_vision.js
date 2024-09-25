$(document).ready(function() { // to ensure it runs after the DOM is fully loaded.
    
    // When the file input changes (i.e., an image is selected)
    $("#imageInput").change(function(event) {
        var input = event.target;

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                // Set the src of the image preview to the image data URL
                $('#imagePreview').attr('src', e.target.result).show(); // Show the image
            }

            // Read the selected image as a data URL
            reader.readAsDataURL(input.files[0]);
        }
    });

    // Trigger a click event on the button
    $("#imagePreview").click(function(){
        $("#imageInput").click();
    });
    
    // Change Border Color based on Selected Status
    $("#status").on('change',function(){
        let status = $(this).val();
        $(".status_border").css({
            "border-left": "4px solid #35cb35",
            "border-right": "4px solid #35cb35"
        });
        if(status == 'Draft'){
            $(".status_border").css({
                "border-left": "4px solid #ffa75c",
                "border-right": "4px solid #ffa75c"
            });
        }

    })

    // Show modal for Versions
    $("#showVersions").on('click',function(){
        $('#addRowModal').modal('show');
        $('#addRowModal').find('.modal-title').text('Recent Versions');
    })

    // Save New Vivid Vision Version
	$("#btnSave").click(function(e){ 
		e.preventDefault();
		swal({
			title: "Do you want to save this as new version and export as pdf?",
			text: "",
			icon: "warning",
			buttons: [
				'No, cancel it!',
				'Yes, I am sure!'
			],
			dangerMode: true,
			}).then(function(isConfirm) {
			if (isConfirm) {
                $("#myForm").submit();
			} else {
				swal("Cancelled", "", "error");
			}
		})
	})

    	// This is Delete Function
	$(".btnDelete").click(function(e){ 
		let id = $(this).attr('data-id');
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this data!",
			icon: "warning",
			buttons: [
				'No, cancel it!',
				'Yes, I am sure!'
			],
			dangerMode: true,
			}).then(function(isConfirm) {
			if (isConfirm) {
		
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: "function/vivid_vision_delete.php",
					data: {id: id},
					async: false,
					dataType: 'text',
					success: function(data){
						
					},
					error: function(){
						swal('Could not edit data');
					}
				});
		
				swal({
				title: 'Deleted Successfully!',
				text: '',
				icon: 'success'
				}).then(function() {
					//RELOAD THE PAGE TO SHOW CHANGES AFTER DELETE
					location.reload();
				});
			} else {
				swal("Cancelled", "", "error");
			}
		})
	})

});