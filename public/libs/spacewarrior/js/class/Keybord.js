class Keyboard {
    constructor(options){
        this.type = "azerty";
        this.keyPressed = {};
    }

    pushStart(player ,f) {
        let keyPressed = this.keyPressed;
        let press = document.addEventListener("keydown", function(event){
            keyPressed[event.key] = true;
            // console.log(keyPressed[event.key])
            if(event.key === "Enter") {
                if(player.start === 1) return;
                document.getElementsByClassName('title-image')[0].style.visibility = 'hidden';
                document.getElementById('sprite').style.visibility = 'visible';
                document.getElementsByClassName('score')[0].style.visibility = 'visible';
                document.getElementsByClassName('life')[0].style.visibility = 'visible';

                player.startGame();
                if(f) f.call(this);
            }
        });
    }

    pushTab(player){
        let keyPressed = this.keyPressed;
        let press = document.addEventListener("keydown", function(event){
            keyPressed[event.key] = true;
            if(event.key === "Tab"){
                player.game.classement();
            }
        });
    }

    pushButton(player, f){
        let keyPressed = this.keyPressed;
        let right = "d";
        let down = "s";
        let up = "w";
        let left = "a";
        if(this.type === "azerty") left = "q";
        if(this.type === "azerty") up = "z";
        // console.log(player.screen);
        // ------------------------------------Appuyer sur une touche----------------------
        let press = document.addEventListener("keydown", function(event){
            keyPressed[event.key] = true;
            console.log(keyPressed);
            if(event.key === "ArrowLeft" || event.key === left) {
                player.initBtn('left');
                player.left();
                // console.log(player.element.offsetLeft);

            }
            if(event.key === "ArrowRight" || event.key === right) {
                player.initBtn('right');
                player.right();
                // console.log(player.element.offsetLeft);

            }
            if(event.key === "ArrowUp" || event.key === up) {
                player.initBtn('up');
                player.up();
                // console.log(player.element.offsetTop);

            }
            if(event.key === "ArrowDown" || event.key === down) {
                player.initBtn('down');
                player.down();
                // console.log(player.element.offsetTop);

            }
            if(event.key === " ") {
                player.initBtn(' ');

                player.shooting = true;
                player.shoot();
            }

            // if(event.key === "Enter") {
            //     player.startGame();
            // }

        });
        // ------------------------------------cesser d'appuyer sur une touche----------------------
        let unpress = document.addEventListener("keyup", function(event){
            if(event.key === "ArrowUp" || event.key === up) {
                player.initBtn('up');
            }
            if(event.key === "ArrowDown" || event.key === down) {
                player.initBtn('down');
            }
            if(event.key === "ArrowLeft" || event.key === left) {
                player.initBtn('left');
            }
            if(event.key === "ArrowRight" || event.key === right) {
                player.initBtn('right');
            }
        });
        if(f) f.call(this);
    }
}
