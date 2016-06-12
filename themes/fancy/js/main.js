$(document).ready(function(){
  setInterval ('cursorAnimation()', 600);
        $("#sentence").typed({
            strings: ["Greeting Anusha.","Fear you shall not.<br>Today, I don't act as a bad person<br>who usually appear with green font on the screen.","Since it is your birthday,<br>rather I just to be part<br>of this very special day of yours.","Happy Birthday.<br>Wish you having an awesome day<br>for this birthday and so on.","Remember the 'card' that I gave you on the pre-celebration of your birthday?<br>This project had been started even before that day.","I like doing something different,<br>not making the physical card<br>rather I made this.","Hope you like this humble present<br>for your special day.","Cheers!!!<br><br>~Capt.4ce~<br>....."],
            typeSpeed: 1,
            showCursor: true,
            contentType: 'html',
            backSpeed: 20,
            backDelay: 700,
            cursorChar: '|',
            callback: function() {
              //your code to be executed after 1 second
              setTimeout($('#gateway').addClass('hide'),1500);
            }
        });
});

function cursorAnimation() {
    $('.typed-cursor').animate({
        opacity: 0
    }, 'fast', 'swing').animate({
        opacity: 1
    }, 'fast', 'swing');
}
