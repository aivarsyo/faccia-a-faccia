import "../scss/style.scss";
import fullpage from "fullpage.js";


window.addEventListener("DOMContentLoaded", start);

function start(){

    new fullpage('#fullpage', {
        scrollBar: true,
        scrollingSpeed: 600
    })

}