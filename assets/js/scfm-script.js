jQuery(document).ready(function($){
    $('#scfm-form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: siteInfo.ajaxUrl,
            data: {
                action: 'scfm_form_action',
                nonce: siteInfo.nonce,
                form_data: $(this).serialize(),
            },
            success: function(response){
                
                if(response.success){
                     Toastify({
                        text: response.data.message || "Form submitted successfully!",
                        duration: 3000,
                        close: true,
                        gravity: "top", // top or bottom
                        position: "center", // left, center or right
                        backgroundColor: "#BECEB6",
                        stopOnFocus: true,
                        style: {
                            color: '#75866E',
                        },
                    }).showToast();
                    $('#scfm-form')[0].reset();
                    
                    
                } else{
                        Toastify({
                        text: response.data.message,
                        duration: 3000,
                        close: true,
                        gravity: "top", // top or bottom
                        position: "center", // left, center or right
                        backgroundColor: '#E7C5C1',
                        style: {
                            color: '#942B36',
                        },
                        stopOnFocus: true,
                    }).showToast();
                }
            },
            error: function (error){
                console.log(error);                
            }
        })
    })
})