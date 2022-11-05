class Player{
    constructor(options){
        this.element = options.element || "";
        this.screen = options.screen || "";
        this.speed = options.speed || 1;
        this.play = options.play || 1;
        this.vulnerable = options.vulnerable || 1;
        this.start = options.start || false;
        this.paused = options.paused || false;
        this.end = options.end || false;
        this.level = options.level || 1,
        this.game = options.game || false;
        this.lifes = options.lifes || 5;
        this.enemies = options.enemies || false;
        this.countEnemies = options.countEnemies || 0;
        this.beforeBoss = options.beforeBoss || 0;
        this.checkBoss = options.checkBoss || 0;
        this.score = options.score || 0;
        this.opacity = options.opacity || 1;
        this.img = options.img || "spacecraft.png",
        this.shooting = options.shooting || false;
        this.score = options.score || 0;
        this.music = options.music || true;
        this.moving = options.moving || false;
        this.movingLeft = options.movingLeft || false;
        this.movingRight = options.movingRight || false;
        this.movingUp = options.movingUp || false;
        this.movingDown = options.movingDown || false;
        this.isMovingLeft = options.isMovingLeft || false;
        this.isMovingRight = options.isMovingRight || false;
        this.isMovingUp = options.isMovingUp || false;
        this.isMovingDown = options.isMovingDown || false;
        this.leftMin = options.leftMin || 0;
        this.leftMax = options.leftMax || 580;
        this.topMin = options.topMin || 20;
        this.topMax = options.topMax || 765;
        this.topPositionDefault = options.topPositionDefault || 710;
        this.leftPositionDefault = options.leftPositionDefault || 295;
        this.element.style.backgroundImage = "url(libs/spacewarrior/img/"+this.img+")";
    }
    startGame(){
        this.start = 1;
        this.play = 1;
        this.game.started = "in_game";
        return this;
    }
    // --------------------------------Direction CONTROL--------------------------------------
    left(){
        this.movingLeft = window.setInterval(() => {
            // let leftLimit = this.screen.offsetWidth*0.04;
            let limit = this.leftMin;
            this.isMovingLeft = true;
            this.element.offsetLeft <= limit ? this.element.style.left = limit+'px' : this.element.style.left = this.element.offsetLeft - 2 +'px';
        }, this.speed);
    }
    right(){
        this.movingRight = window.setInterval(() => {
            // let rightLimit = this.screen.offsetWidth*0.939;
            let limit = this.leftMax;
            this.isMovingRight = true;
            this.element.offsetLeft >= limit ? this.element.style.left = limit+'px' : this.element.style.left = this.element.offsetLeft + 2 +'px';
        }, this.speed);
    }
    up(){
        this.movingUp = window.setInterval(() => {
            // let leftLimit = this.screen.offsetWidth*0.04;
            let limit = this.topMin;
            this.isMovingUp = true;
            this.element.offsetTop <= limit ? this.element.style.top = limit+'px' : this.element.style.top = this.element.offsetTop - 2 +'px';
        }, this.speed);
    }
    down(){
        this.movingDown = window.setInterval(() => {
            // let leftLimit = this.screen.offsetWidth*0.04;
            let limit = this.topMax;
            this.isMovingDown = true;
            this.element.offsetTop >= limit ? this.element.style.top = limit+'px' : this.element.style.top = this.element.offsetTop + 2 +'px';
        }, this.speed);
    }
    initBtn(btn){
        if(btn === "left") {
            if(this.movingLeft) clearInterval(this.movingLeft);
            this.isMovingLeft = false;
            this.movingLeft = false;
            console.log(this.movingLeft)
            // this.intervalLeft = false;
        }
        if(btn === "right") {
            clearInterval(this.movingRight);
            this.isMovingRight = false;
            this.movingRight = false;
        }
        if(btn === "up") {
            if(this.movingUp) clearInterval(this.movingUp);
            this.isMovingUp = false;
            this.movingUp = false;
        }
        if(btn === "down") {
            if(this.movingDown) clearInterval(this.movingDown);
            this.isMovingDown = false;
            this.movingDown = false;
        }
        if(btn === "shoot") {
        /*         clearInterval(this.intervalShoot);*/
            this.intervalShoot = false;
            this.shooting = false;
        }
    }
    shoot(){
        if(this.game.end) return;
        if(this.shooting) {
            this.missile();
            Sound.play('default');
        }
        // let sound = new Audio("music/laser_1.mp3");
        // sound.play();

    }
    missile(){

        let enemies = this.enemies;
        let missile = document.createElement('span');
        missile.classList.add('missile-player');

        this.screen.appendChild(missile);
        // missile.style.left = missile.offsetLeft + (this.element.offsetWidth/2)-2 + "px";
        missile.style.top = this.element.offsetTop+"px";
        missile.style.left = this.element.offsetLeft + (this.element.offsetWidth/2)-2 +"px";
        missile.style.top = missile.offsetTop - 10 + "px";

        let moveMissile = window.setInterval(()=>{
            let time_explosion = 500;
            missile.style.top = missile.offsetTop - 10 + "px";
            if(enemies.length > 0){
                for(let i in enemies){
                    let enemy = enemies[i];
                    if(enemy.isExist === false) {
                        if(missile.offsetTop < -50) {
                            if(moveMissile) clearInterval(moveMissile);
                            if(missile) missile.remove();
                        }
                    }
                    if(typeof enemy === 'undefined') return;
                    if(missile.offsetTop >= enemy.element.offsetTop
                        && missile.offsetTop <= enemy.element.offsetTop+enemy.height
                        && missile.offsetLeft >= enemy.element.offsetLeft
                        && missile.offsetLeft <= enemy.element.offsetLeft+enemy.width){
                        clearInterval(moveMissile);
                        missile.remove();
                        if(enemy.life > 1){
                            enemy.life = enemy.life-1;
                        } else {
                            enemy.element.classList.remove("enemy-"+enemy.type);
                            if(enemy.type === "boss-1" || enemy.type === "boss-2" || enemy.type === "boss-3") {
                                // enemy.element.classList.add("explosion-boss");
                                enemy.element.classList.add("explosion");
                                enemy.element.style.height = "400px";
                                enemy.element.style.width = "400px";
                                this.level = this.level +1;
                                // time_explosion = 700;
                                // let stage_clear = new Audio("music/stage_clear.mp3");

                                setTimeout(()=>{
                                    Music.play('stage_clear');
                                    document.getElementsByClassName('stage-clear')[0].style.visibility = 'visible';
                                    document.getElementsByClassName('stage-clear')[0].style.opacity = 1;
                                    setTimeout(()=>{
                                        document.getElementsByClassName('stage-clear')[0].style.visibility = 'hidden';
                                        document.getElementsByClassName('stage-clear')[0].style.opacity = 0;
                                        Boss_1_clear = true;
                                        if(this.level === 2) level_2();
                                        if(this.level === 3) level_3();
                                        if(this.level > 3) {
                                            this.game.started = "finish";
                                            // let bonnus = this.lifes * 1000;
                                            // this.score = this.score + bonnus;
                                            this.game.final_score = this.score;
                                            this.game.congratulation();
                                            return;
                                        }
                                    },10000);
                                }, 2500);

                            } else {
                                enemy.element.classList.add("explosion");
                            }

                            // let sound = new Audio("music/explosion.mp3");
                            // sound.play();
                            Explosion.play('explosion');

                            if(enemy.isExist) player.score = player.score + enemy.point;
                            if(enemy.isExist && enemy.type === "boss-3") player.score = player.score + player.lifes * 100;
                            if(enemy.isExist) player.countEnemies = player.countEnemies + 1;
                            document.getElementById("score").innerHTML=this.score;
                            enemy.isExist = false;
                            Enemies.delete(i);
                            setTimeout(()=>{
                                // player.Enemies.delete[i];
                                enemy.element.remove();
                            },time_explosion);
                        }
                    }
                }
            }
            if(missile.offsetTop < -50) {
                if(moveMissile) clearInterval(moveMissile);
                if(missile) missile.remove();
            }
        },10);

    }
    lifeReturn(){
        let opacity = 0;
        this.element.style.opacity = opacity.toString();
        this.element.style.top = "730px";
        this.element.style.left = this.screen.offsetWidth/2+"px";
        this.img="spacecraft.png";
        this.element.style.backgroundImage = "url(libs/spacewarrior/img/"+this.img+")";
        this.play = 1;
        let interval = window.setInterval(()=>{
            if(opacity >= 1){
                this.vulnerable = 1;
                clearInterval(interval);
            } else{
                opacity = opacity+0.1;
                this.element.style.opacity = opacity.toString();
            }
        },200);
        // setTimeout(()=>{
        //     this.element.style.opacity = 1;
        // },4000);
    }

    explosion(){
        if(this.lifes <= 0){
            this.lifes = 0;
            // return;
        } else {
            this.lifes = this.lifes - 1;
            document.getElementById("life").innerHTML=this.lifes;
        }

        this.img="explosion.gif";
        this.element.style.backgroundImage = "url(libs/spacewarrior/img/"+this.img+")";
        // let sound = new Audio("music/explosion.mp3");
        // sound.play();
        Explosion.play('explosion');

        this.play = 0;
        this.vulnerable = 0;
        setTimeout(()=>{
            if(this.lifes === 0 ) {
                this.game.started = "end";
                this.game.end = true;
                this.game.final_score = this.score;
                this.game.gameover();
                return;
            }
            this.element.style.opacity = 0;
            this.lifeReturn();
            // if(this.lifes >=1) this.lifeReturn();
        },500);
    }

}
