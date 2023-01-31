"use strict";

window.addEventListener('load', function(){


    let tabs = document.querySelectorAll('ul.nav-tabs > li');

    tabs.forEach(function(tab){

        tab.addEventListener('click', switchTab);
        
    });

    function switchTab(event)
    {
        event.preventDefault(event);
        

        document.querySelector('ul.nav-tabs li.active').classList.remove('active');
        document.querySelector('.tab-pane.active').classList.remove('active');

        let clickedTab = event.currentTarget;
        let anchor = event.target;
        let activePaneID = anchor.getAttribute('href');
        
        clickedTab.classList.add("active");

        document.querySelector(activePaneID).classList.add("active");
    }


});