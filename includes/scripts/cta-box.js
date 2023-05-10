jQuery(document).ready(function(){
    //Get Clicks on page load from localStorage
    var ctaBoxClicks= localStorage.getItem("cta_box_clicks") || 0;
    jQuery(".cta-box").find(".cta-box-clicks").html(ctaBoxClicks+" Clicks");

    //Function to increment the clicks and redirect
    jQuery(document).on("click", ".cta-box a.cta-box-btn", function(e){
        e.preventDefault();
        let link = jQuery(this).attr("href");
        localStorage.setItem("cta_box_clicks", parseInt(ctaBoxClicks) + 1)
        ctaBoxClicks= localStorage.getItem("cta_box_clicks");
        jQuery(this).closest(".cta-box").find(".cta-box-clicks").html(ctaBoxClicks+" Clicks");
        window.open(link, "_blank");
    })
})