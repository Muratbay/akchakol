window.addEventListener('DOMContentLoaded', () => {

    // NAVBAR
    const nav = document.querySelector('header');

    window.addEventListener('scroll', () => {
        if (window.scrollY >= 10) {
            nav.classList.add('active');
        }
        else {
            nav.classList.remove('active')
        }

    });

    // TOGGLE
    const toggle = document.querySelector('.toggle'),
        menuIcon = document.querySelector('.menu-icon'),
        timesIcon = document.querySelector('.times-icon'),
        mobileMenu = document.querySelector('.nav-links-mobile');

    toggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('active');
        if(!mobileMenu.classList.contains('active')){
            menuIcon.classList.add('active')
            timesIcon.classList.remove('active')
        }else {
            timesIcon.classList.add('active')
            menuIcon.classList.remove('active')
        }
    })

    // DROP-DOWN
    const changeLangBtn = document.querySelectorAll('.change-lang-btn'),
        translateDropDown = document.querySelectorAll('.translate-drop-down');
    
        changeLangBtn.forEach(item => item.addEventListener('click', () => {
            translateDropDown.forEach(drop => drop.classList.toggle('active'))
        }))


    // ACCORDION
    const acc_btns = document.querySelectorAll(".accordion-header");
    const acc_contents = document.querySelectorAll(".accordion-body");

    acc_btns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            acc_contents.forEach((acc) => {
                if (
                    e.target.nextElementSibling !== acc &&
                    acc.classList.contains("active")
                ) {
                    acc.classList.remove("active");
                    acc_btns.forEach((btn) => btn.classList.remove("active"));
                }
            });

            const panel = btn.nextElementSibling;
            panel.classList.toggle("active");
            btn.classList.toggle("active");
        });
    });

    window.onclick = (e) => {
        if (!e.target.matches(".accordion-header")) {
            acc_btns.forEach((btn) => btn.classList.remove("active"));
            acc_contents.forEach((acc) => acc.classList.remove("active"));
        }
    };


    // SCROLL-TOP
    function scrollTopFunc() {
        const scrollTop = document.querySelector('#scroll-top');
        if (window.scrollY > 500) {
            scrollTop.classList.add('active');
        }
        else {
            scrollTop.classList.remove('active');
        }
    };
    window.addEventListener('scroll', scrollTopFunc);
})