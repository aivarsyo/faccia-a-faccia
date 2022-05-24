import "../scss/style.scss";
import fullpage from "fullpage.js";
import barba from '@barba/core';
import "../../node_modules/fullpage.js/vendors/easings";
import { gsap } from "gsap";
import { Power4 } from "gsap";
import { Bounce } from "gsap";
import { Power3 } from "gsap";

// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
let vh = window.innerHeight * 0.01;
// Then we set the value in the --vh custom property to the root of the document
document.documentElement.style.setProperty('--vh', `${vh}px`);

window.addEventListener("DOMContentLoaded", start);

function start() {


        fullPageDesign();
        onRefreshLoadTitle();
        arrowIconAnimation();



        optimiseHeaderForBarba();
        barbaInit();
    

    menu();
}

function fullPageDesign() {

    const checker = document.querySelector("#fullpage");
    if(checker){

    new fullpage('#fullpage', {
        licenseKey: '91A71BDD-6DA64641-B8480688-A6DC974F',
        scrollBar: true,
        scrollingSpeed: 500,
        easing: 'easeOutSine',

        onLeave: function (origin, destination) {

            // variables for project title, client and link, taken from data attributes

            let project_title = destination.item.dataset.title;
            let project_client = destination.item.dataset.client;
            let project_link = destination.item.dataset.link;

            const tml = gsap.timeline();

            // if last section, play video

            if (destination.isLast == true) {

                //document.querySelector("video").play();

                // if any other section, show project title and client

            } else {

                tml.to(".section__text", 0.2, {
                    opacity: 0,
                    ease: Power4.easeOut
                })

                tml.to(".section__text", 0.3, {
                    opacity: 1,
                    ease: Power4.easeIn
                })
            }

            // sets project title and client for specific section, as well the link

            gsap.set("h1", {
                innerHTML: project_title,
                delay: 0.2
            })

            gsap.set("h2", {
                innerHTML: project_client,
                delay: 0.2
            })

            document.querySelector(".section__text").href = project_link;

            // if it's the very first section, then show the arrow, otherwise hide it

            if (destination.isFirst == false) {
                gsap.to(".arrow_icon", 0.1, {
                    opacity: 0
                })
            } else {
                gsap.to(".arrow_icon", {
                    opacity: 1,
                    delay: 0.4
                })
            }
        }
    })
}
}

function onRefreshLoadTitle() {
    const checker = document.querySelector(".section__text");
    if(checker){

    setTimeout(function () {

        // variable for the section which is active at that moment

        const fullpage_data = fullpage_api.getActiveSection();

        // on a fresh page load, this smoothly shows the project title and client, as well sets the link

        if (fullpage_data.isFirst == true) {

            document.querySelector(".section__text").href = fullpage_data.item.dataset.link;

            gsap.from("h1", {
                opacity: 0,
                innerHTML: fullpage_data.item.dataset.title
            })

            gsap.from("h2", {
                opacity: 0,
                innerHTML: fullpage_data.item.dataset.client
            })

            // and this sets the arrow visible, as by default it's opacity:0

            gsap.set(".arrow_icon", {
                opacity: 1
            })
        }
    }, 200);
}
}

function arrowIconAnimation() {
    const checker = document.querySelector(".arrow_icon");
    if(checker){

    gsap.to(".arrow_icon", 1.5, {
        y: -15,
        ease: Bounce.easeOut,
        repeat: -1,
        repeatDelay: 2
    })
}
}

function menu() {

    // for italic hover problem

    document.querySelectorAll(".menu-item a").forEach(link => {
        const content = link.innerHTML.toUpperCase();
        link.setAttribute("title", content)
    })

    //

    document.querySelector(".burger_menu").addEventListener("click", function () {
        gsap.to(".mobile_menu", 0.3, {
            x: 0,
            ease: Power3.easeIn
        })
    })

    document.querySelector(".close").addEventListener("click", function () {
        gsap.to(".mobile_menu", 0.3, {
            x: "100%",
            ease: Power3.easeOut
        })
    })
}

function optimiseHeaderForBarba() {

    const checker = document.querySelector(".single__projectVideo");

    if(checker){

    document.querySelector("body").setAttribute("data-barba", "wrapper");

    document.querySelectorAll("header").forEach(header => {
        header.setAttribute("data-barba-prevent", "all");
    })
}
}

/* --- barba.js page transition for single.php --- */

const barbaInit = () => {

    const checker = document.querySelector(".single__projectVideo");

    if(checker){


    barba.init({

        transitions: [{

            to: {
                namespace: [
                    'project'
                ]
            },

            name: 'slide',
            sync: true,

            leave: (data) => {

                //optimiseHeaderForBarba();

                if (data.trigger.parentElement.classList.contains("next")) {
                    pageTransitionLeaveToLeft(data);
                } else {
                    pageTransitionLeaveToRight(data);
                }

            },

            enter: (data) => {

                if (data.trigger.parentElement.classList.contains("next")) {
                    const tml = gsap.timeline();

                    tml.set(data.next.container, {
                        y: -data.current.container.offsetHeight,
                    })

                    tml.from(data.next.container, {
                        duration: .5,
                        x: "100vw",
                        ease: "power1.out",
                        onComplete: function () {
                            //scrollToTop();
                        }
                    })

                    tml.set(data.next.container, {
                        y: 0
                    })

                    return tml;

                } else {
                    const tml = gsap.timeline();

                    tml.set(data.next.container, {
                        y: -data.current.container.offsetHeight,
                    })

                    tml.from(data.next.container, {
                        duration: .5,
                        x: "-100vw",
                        ease: "power1.out",
                        onComplete: function () {
                            //scrollToTop();
                        }
                    })

                    tml.set(data.next.container, {
                        y: 0
                    })

                    return tml;
                }

            },
        }
        ],
    });
}
}

/* --- **************************** --- */

function pageTransitionLeaveToRight(data) {

    gsap.to(data.current.container, {
        duration: .5,
        x: "100vw",
        ease: "power1.out"
    })
}

function pageTransitionLeaveToLeft(data) {
    gsap.to(data.current.container, {
        duration: .5,
        x: "-100vw",
        ease: "power1.out"
    })
}
