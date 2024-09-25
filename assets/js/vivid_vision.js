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

    $("#imagePreview").click(function(){
        // Trigger a click event on the button
        $("#imageInput").click();
    });
    

    $("#status").on('change',function(){
        let status = $(this).val();
        $(".status_border").css("border-left", "4px solid #35cb35");
        if(status == 'Draft'){
            $(".status_border").css("border-left", "4px solid #ffa75c");
        }

    })
});