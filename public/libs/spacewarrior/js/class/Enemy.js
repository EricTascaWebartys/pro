class Enemy{
    constructor(options){
        this.type = options.type || 1;
        this.life = options.life || 1;
        this.point = options.point || 10;
        this.img = options.img || "img/enemy-1-small";
        this.target = options.target || alert('désigner la cible de l\'enemy (joueur)');
        this.width = options.width || 50;
        this.height = options.height || 50;
        this.top = options.top || 0;
        this.left = options.left || 0;
        this.isExist = options.isExist || true;
        this.fireColor = options.fireColor || "red";
        this.fireSize = options.fireSize || 10;
        this.fireSpeed = options.fireSpeed || 1;
        this.screen = document.querySelector('.cadre');
        this.element = document.createElement('div');
        this.element.classList.add('enemy-'+this.type);
        this.element.classList.add('target');
        this.element.style.width = this.width+"px";
        this.element.style.height = this.height+"px";
        this.element.style.display = "block";
        this.element.style.position = "absolute";
        this.element.style.top = this.top+"px";
        this.element.style.left = this.left+"px";
        this.screen.appendChild(this.element);
    }

    totalSpan() {
        return document.getElementsByClassName('enemy_fire').length;
    }

    goIn(xPosition, maxTop, speed, f){
        if(this.target.game.started === "end" || this.target.game.started === "finish") return;

        if(this.type === 1) maxTop = randomNum(150, 450);
        let stop = false;
        this.element.style.left = xPosition + "px";
        let move = window.setInterval(()=>{
            // alert(this.element.offsetTop)
            if(this.target.play ===1 && this.target.vulnerable === 1) this.collide();
            if(this.element.offsetTop === maxTop) stop = true;
            if(stop){
                clearInterval(move);
                if(f) f.call(this, this.element);
            } else {
                this.element.style.top = this.element.offsetTop +1 + "px";
            }
        }, speed);
    }
    moveHorizontal(direction, nbBounce, xDepart, speed, f){
        if(this.type === 1 && f) {
            f();
        }
        let nb = 0;
        let going = 0;
        let largeur = this.screen.offsetWidth;
        let xMin = 0;
        let xMax = largeur - this.width -10;
        let move = window.setInterval(()=>{
            let rand = randomNum(5, 600);
            let rand2 = randomNum(5, 600);
            if(this.element.offsetLeft === xMin) direction = 'right';
            if(this.element.offsetLeft === xMax) direction = 'left';
            if(this.element.offsetLeft === xMax && nb != 'infini') nb = nb+1;
            if(this.element.offsetLeft === this.target.element.offsetLeft && this.element.offsetLeft >= 5 && this.element.offsetLeft <= 600 || this.element.offsetLeft === rand || this.element.offsetLeft === rand2) {
                if(this.type === "boss-1") {
                    this.shootDir(-150,10,"left");
                    this.shootDir(150,10,"right");
                    this.shoot();
                } else if(this.type === "boss-2") {
                    this.shootDir(-150,10,"left");
                    this.shootDir(150,10,"right");
                    this.shootDir(0,10,"left");
                    this.shootDir(0,10,"right");
                    this.shoot();
                }  else if(this.type === "boss-3") {
                    this.shootDir(-150,-10,"left");
                    this.shootDir(-150,-10,"center");
                    this.shootDir(-150,-10,"right");
                    this.shootDir(150,-10,"left");
                    this.shootDir(150,-10,"center");
                    this.shootDir(150,-10,"right");
                    this.shootDir(0,-10,"left");
                    this.shootDir(0,-10,"right");
                    this.shoot();
                } else if(this.type === 2 || this.type === 4 || this.type === 5) {
                    this.shootDir(0,10,"left");
                    this.shootDir(0,10,"right");
                    this.shoot();
                } else {
                    this.shoot();
                }

            }
            direction === 'right' ?  going = this.element.offsetLeft+1 :  going = this.element.offsetLeft-1;
            this.element.style.left = going+"px";
            if(this.target.play ===1 && this.target.vulnerable === 1) this.collide();
            if(nb === nbBounce && this.element.offsetLeft === xDepart) {
                clearInterval(move);
                if(f) f.call(this, this.element);
            }
        }, speed);
    }
    goOut(Enemies){
        let move = window.setInterval(()=>{
            this.element.style.top = this.element.offsetTop-1+"px";
            if(this.target.play ===1 && this.target.vulnerable === 1) this.collide();
            if(this.element.offsetTop <= - this.element.offsetWidth) {
                clearInterval(move);
                this.target.countEnemies = this.target.countEnemies + 1;
                this.element.remove();
            }
        },1);
    }
    shoot() {
        if(this.type === "boss-1" || this.type === "boss-2" || this.type === "boss-3") {
            if(this.totalSpan() > 6) return;
        } else {
            if(this.totalSpan() > 1) return;
        }


        let element = document.createElement('span');
        let heighMax = this.screen.offsetHeight-15;
        this.screen.appendChild(element);
        element.style.backgroundColor = this.fireColor;
        element.style.width = this.fireSize+"px";
        element.style.height = this.fireSize+"px";
        element.style.borderRadius = "50%";
        element.style.display = "block";
        element.style.position = "absolute";
        element.style.top = this.element.offsetTop + this.element.offsetHeight + 10 +"px";
        element.style.left = this.element.offsetLeft + (this.element.offsetWidth/2) +"px";
        let move = window.setInterval(()=>{
            element.style.top = element.offsetTop+1+"px";
            if(element.offsetTop <= this.target.element.offsetTop + this.target.element.offsetHeight && element.offsetTop >= this.target.element.offsetTop && element.offsetLeft <= this.target.element.offsetLeft + this.target.element.offsetWidth && element.offsetLeft >= this.target.element.offsetLeft && this.target.play === 1 && this.target.vulnerable === 1){
                this.target.explosion();
            }
            if(element.offsetTop > heighMax) {
                clearInterval(move);
                element.remove();
            }
        },this.fireSpeed);
    }
    shootDir(xPosition, yPosition, direction){
        if(this.type === "boss-1" || this.type === "boss-2" || this.type === "boss-3") {
            if(this.totalSpan() > 6) return;
        } else {
            if(this.totalSpan() > 1) return;
        }
        // if(!yPosition) let yPosition = 10;
        // if(!xPosition) let xPosition = 0;
        let element = document.createElement('span');
        let heighMax = this.screen.offsetHeight-15;
        let widhtMin = 0;
        let widhtMax = this.screen.offsetWidth;
        this.screen.appendChild(element);
        element.style.backgroundColor = this.fireColor;
        element.style.width = this.fireSize+"px";
        element.style.height = this.fireSize+"px";
        element.style.borderRadius = "50%";
        element.style.display = "block";
        element.style.position = "absolute";
        element.style.top = this.element.offsetTop + this.element.offsetHeight + yPosition +"px";
        element.style.left = this.element.offsetLeft + (this.element.offsetWidth/2) +xPosition+ "px";
        element.classList.add('enemy_fire');

        let move = window.setInterval(()=>{
            element.style.top = element.offsetTop+1+"px";
            if(direction === "left") element.style.left = element.offsetLeft-1+"px";
            if(direction === "right") element.style.left = element.offsetLeft+1+"px";
            if(element.offsetTop <= this.target.element.offsetTop + this.target.element.offsetHeight && element.offsetTop >= this.target.element.offsetTop && element.offsetLeft <= this.target.element.offsetLeft + this.target.element.offsetWidth && element.offsetLeft >= this.target.element.offsetLeft && this.target.play === 1 && this.target.vulnerable === 1){
                this.target.explosion();
            }
            if(element.offsetTop > heighMax || element.offsetLeft < widhtMin || element.offsetLeft > widhtMax-15) {
                clearInterval(move);
                element.remove();
            }
        },this.fireSpeed);
    }
    collide(){
        let centerTargetPositionX = this.target.element.offsetLeft + this.target.element.offsetWidth/2;
        let centerTargetPositionY = this.target.element.offsetTop + this.target.element.offsetHeight/2;
        let targetMinPositionX = centerTargetPositionX - 20;
        let targetMaxPositionX = centerTargetPositionX + 20;
        let targetMinPositionY = centerTargetPositionY - 20;
        let targetMaxPositionY = centerTargetPositionY + 20;
        let enemyMinPositionX = this.element.offsetLeft;
        let enemyMaxPositionX = this.element.offsetLeft + this.element.offsetWidth;
        let enemyMinPositionY = this.element.offsetTop;
        let enemyMaxPositionY = this.element.offsetTop + this.element.offsetHeight;
        if(targetMinPositionX >= enemyMinPositionX && targetMinPositionX <= enemyMaxPositionX && targetMaxPositionX <= enemyMaxPositionX && targetMaxPositionX >= enemyMinPositionX && targetMinPositionY >= targetMinPositionY && targetMinPositionY <= targetMaxPositionY && targetMaxPositionY <= enemyMaxPositionY && targetMaxPositionY >= enemyMinPositionY){
            this.target.explosion();
        }
    }
}
