$(document).ready(function() { // to ensure it runs after the DOM is fully loaded.
    $("#status").on('change',function(){
        let status = $(this).val();
        $(".status_border").css("border-left", "4px solid #35cb35");
        if(status == 'Draft'){
            $(".status_border").css("border-left", "4px solid #ffa75c");
        }

    })
});