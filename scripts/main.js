"use strict";

$(function() {

    function Car(selector) {
        this.x = 0;
        this.y = 0;
        this.maxX = 283;
        this.maxY = 250;
        this.speed = 10;
        
        this.car = document.querySelector(selector);

        this.run = function() {
            this.timeout = window.setInterval(this.increment.bind(this), this.speed);
        };

        this.increment = function() {
            if((this.x > this.maxX) || (this.y > this.maxY)) {
                window.clearInterval(this.timeout);
//                console.log('asdf');
                this.car.style.background = "url(../img/car-with-adv.png)";
            }
            this.x++;
            this.y += 2;
            this.correctStyles();
        };

        this.correctStyles = function() {
            this.car.style.top = this.x + 'px';
            this.car.style.right = this.y + 'px';
        };
        
    }

    function init() {
        var toyota = new Car('.block-2__car');
        toyota.run();
    }

    init();
    document.querySelector('.block-3__child').addEventListener('click',function(){
//        console.log(this);
       this.style.display = 'none';
       document.querySelector('#new_child').style.display  = 'block';
    });
   
});
