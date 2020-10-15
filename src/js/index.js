import "../scss/style.scss";
import fullpage from "fullpage.js";
import "../../node_modules/fullpage.js/vendors/easings";
import { gsap } from "gsap";
import { Power4 } from "gsap";
import { TextPlugin } from "gsap/TextPlugin";
gsap.registerPlugin(TextPlugin);

window.addEventListener("DOMContentLoaded", start);

function start() {

    new fullpage('#fullpage', {
        scrollBar: true,
        scrollingSpeed: 400,
        easing: 'easeInSine',

        onLeave: function () {

            console.log("hey");
            const tml = gsap.timeline();

            tml.to(".section__text", 0.2, {
                opacity: 0,
                ease: Power4.easeOut
            })

            tml.to(".section__text", 0.3, {
                opacity: 1,
                ease: Power4.easeIn
            })

            gsap.set("h1", {
                delay: 0.2,
                text: "The Algae Dome"
            })
        }
    })

}