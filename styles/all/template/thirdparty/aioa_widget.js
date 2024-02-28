function load_aioa_script() {
    
    let aioa_script_tag = document.createElement("script");
    aioa_script_tag.src = "https://www.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js?aioa_reg_req=true&colorcode=&token=&position=bottom_right";
    aioa_script_tag.id = "aioa-adawidget";
    console.log(aioa_script_tag)
    document.getElementsByTagName("head")[0].appendChild(aioa_script_tag);
}
window.addEventListener("load", (event) => {
    setTimeout(() => {
        load_aioa_script();
    }, 3000)
});
