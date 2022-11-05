<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shoot</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="libs/particles.js-master/demo/css/style.css">
  <link rel="stylesheet" href="css/front.css">

</head>

<body>
    <div class="bg" id="gameScreen">
        <div onclick="openFullscreen();" style="width:100px;height:100px; background:red; position:absolute;top:0;right:0;display:block;z-index:99999">

        </div>
        <div class="col-4 col-12 mx-auto cadre" style="width:640px; height:820px" id="particles-js">
            <div id="sprite" class="sprite">
                <!-- <img src="img/spacecraft.png" alt="spacecraft"> -->
            </div>
            <div class="title-image">
                <img src="img/title.png" alt="spacewarrior">
                <p class="text-center mt-5 pulse">APPYUEZ ENTRER POUR JOUER</p>
                <p class="text-center text-light" style="width:100%; opacity:0.7"><span>Appuyer sur [Tab] pour voir le classement</span></p>

                <p class="text-center by mt-5">Réaliser et développer par Eric TASCA</p>

            </div>
            <p class="score">SCORE : <span id="score"></span></p>
            <p class="life"><img src="img/spacecraft.png" alt="life"> X <span id="life"></span></p>
            <p class="text-center stage-clear">STAGE CLEAR</p>
            <div class="end">
                <p class="score-final">SCORE : <span id="score-final"></span></p>
            </div>
            <div class="gameover">
                <p class="score-gameover mb-3">SCORE : <span id="score-gameover"></span></p>
                <div class="form">
                    <input type="hidden" name="score" value="" id="score_request">
                    <p class="text-center"><input type="text" value="" placeholder="Votre nom" id="name" required><button id="save">valider</button>  </p>
                </div>

            </div>

        </div>
        <!-- <span class="js-count-particles"></span> -->
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="libs/particles.js-master/particles.js"></script>
    <script src="libs/particles.js-master/demo/js/app.js"></script>
    <script src="libs/particles.js-master/demo/js/lib/stats.js"></script>

    <script type="text/javascript" src="js/class/Player.js"></script>
    <script type="text/javascript" src="js/class/Enemy.js"></script>
    <script type="text/javascript" src="js/class/Score.js"></script>
    <script type="text/javascript" src="js/class/Keybord.js"></script>
    <script type="text/javascript" src="js/class/Game.js"></script>

    <script type="text/javascript">
        var elem = document.getElementById("gameScreen");
        function openFullscreen() {
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.webkitRequestFullscreen) { /* Safari */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) { /* IE11 */
                elem.msRequestFullscreen();
            }
        }
    </script>

    <script type="text/javascript">

        document.getElementsByClassName('score')[0].style.visibility = 'hidden';
        document.getElementsByClassName('life')[0].style.visibility = 'hidden';
        document.getElementsByClassName('stage-clear')[0].style.visibility = 'hidden';
        document.getElementsByClassName('end')[0].style.visibility = 'hidden';
        let screen = document.getElementsByClassName('cadre');
        let sprite = document.getElementById('sprite');
        sprite.style.visibility = 'hidden';
        let Boss_1_arrive = false;
        let Boss_1_clear = false;
        let Boss_name = "boss-1";
        let Boss_life = 100;
        let Boss_width = 280;
        let Boss_height = 280;

        let Enemies = {
            datas: [],
            get: function(){
                return this.datas;
            },
            register: function(enemy){
                this.datas.push(enemy);
            },
            delete: function(i){
                delete this.datas[i];
            },
            length: function(){
                return this.datas.length;
            },
        };
        let game = new Game({
            started:"title_display"
        });
        let player = new Player({
            lifes:9,
            game: game,
            element: sprite,
            screen: screen[0],
            img:"spacecraft.png",
            enemies: Enemies
        });
        player.element.style.top = player.topPositionDefault+"px";
        player.element.style.left = player.leftPositionDefault+"px";
        let control = new Keyboard({
            type: "azerty",
            keyPressed: {}
        });



// -------------------------------------Afficher le score et les vie---------------------------------
        document.getElementById("score").innerHTML=player.score;
        document.getElementById("life").innerHTML=player.lifes;
// -------------------------------------------------------------------------------------------

// ------------------------------------Music-------------------------------------
let Music = {
    audio: new Audio(),
    musics: {
        level_1: 'level_1',
        level_2: 'level_2',
        level_3: 'level_3',
        boss: 'boss',
        boss_final: 'boss_fin',
        stage_clear: 'stage_clear',
        gameover: 'gameover',
        goat: 'goat',
        end: 'end',
    },
    play: function(name){
        if(this.musics[name]){
            this.audio.src = 'music/'+this.musics[name]+'.mp3';
            this.audio.load();
            this.audio.addEventListener('canplaythrough', function(){
                this.play();
                if(this.musics && (this.musics[name] === "level_1" ||  this.musics[name] === "level_2" ||  this.musics[name] === "level_3"||  this.musics[name] === "boss"||  this.musics[name] === "boss_fin")) {
                    this.loop = true;
                } else {
                    this.loop = false;
                }
            });
        }
    },
};

let Sound = {
    audio: new Audio(),
    musics: {
        default: 'laser_1',
        boss: 'boss',
    },
    play: function(name){
        if(this.musics[name]){
            this.audio.src = 'music/'+this.musics[name]+'.mp3';
            this.audio.load();
            this.audio.addEventListener('canplaythrough', function(){
                this.play();
            });
        }
    },
};

let Explosion = {
    audio: new Audio(),
    musics: {
        explosion: 'explosion',
        boss: 'explosion-boss',
        vaisseau: 'end',
    },
    play: function(name){
        if(this.musics[name]){
            this.audio.src = 'music/'+this.musics[name]+'.mp3';
            this.audio.load();
            this.audio.addEventListener('canplaythrough', function(){
                this.play();
            });
        }
    },
};

// -------------------------------------------------------------------------------

// ------------------------------------NIVEAU-------------------------------------
    function randomNum(min, max) {
        let random = Math.floor(Math.random() * (max - min)) + min;
        return random;
    }
    function level_1(f){
        if(player.music === true) Music.play('level_1');
        player.music === false;
        let time = randomNum(700,1500);
        let i = 0;
        let attacks = setInterval(()=>{
            i++;
            if(i >= 10 && i<= 12 || i >= 25 && i<= 30) {
                type = 3;
            } else if (i === 10 || i===20 || i === 40) {
                type = 2;
            } else if (i === 41) {
                type = 5;
            }else {
                type = 1;
            }
            attackEnemy(type, time);
            if(i===50) {
                clearInterval(attacks);
                setTimeout(()=>{
                    if(player.game.started === "in_game") Music.play('boss');
                    attackBoss();
                },7000);
            }

        },time);
        // attackEnemy(1, 1000, ()=>attackEnemy(2, 3000, ()=>attackEnemy(3,6000)));
    }
    function level_2(){
        Music.play('level_2');
        Boss_name = "boss-2";
        Boss_life = 120;
        let time = randomNum(1000,1500);
        let i = 0;
        let attacks = setInterval(()=>{
            i++;
            if(i >= 10 && i<= 12 || i >= 25 && i<= 30 || i === 48) {
                type = 3;
            } else if (i === 10 || i===20 || i === 40 || i === 60) {
                type = 2;
            } else if (i === 51 || i === 66|| i === 77 || i === 2 || i === 31) {
                type = 5;
            } else if (i >1 && i <= 3 || i === 22 || i === 33 || i === 44) {
                type = 4;
            } else {
                type = 1;
            }
            attackEnemy(type, time);
            if(i===70) {
                clearInterval(attacks);
                setTimeout(()=>{
                    if(player.game.started === "in_game") Music.play('boss');
                    attackBoss();
                },7000);

            }

        },time);
    }
    function level_3() {
        Music.play('level_3');
        Boss_name = "boss-3";
        Boss_life = 180;
        let time = randomNum(1000,1500);
        let i = 0;
        let attacks = setInterval(()=>{
            i++;
            if(i >= 3 && i< 10 || i >= 21 && i<= 35 || i === 48|| i === 58) {
                type = 3;
            } else if (i === 10 || i===20 || i === 40 || i === 60 || i === 70) {
                type = 2;
            } else if (i === 1|| i === 51 || i === 66|| i === 77 || i === 2 || i === 31) {
                type = 5;
            } else if (i >1 && i <= 3 || i === 22 || i === 33 || i === 44) {
                type = 4;
            } else {
                type = 1;
            }
            attackEnemy(type, time);
            if(i === 90) {
                clearInterval(attacks);
                setTimeout(()=>{
                    if(player.game.started === "in_game") Music.play('boss_final');
                    attackBoss();
                },7000);

            }

        },time);
    }
    function attackBoss(f){
        if(player.game.started === "end" || player.game.started === "finish") return;
        if(Boss_name === "boss-3") Boss_width = 350;
        if(Boss_name === "boss-3") Boss_height = 400;
        let boss = new Enemy({
            type: Boss_name,
            target: player,
            top:10,
            left:10,
            width: Boss_width,
            height: Boss_height,
            life: Boss_life,
            isExist: true,
            point:1000,
            fireColor: "#fc9de9"
        });
        Enemies.register(boss);
        player.enemies = Enemies.get();

        boss.goIn(320, 80, 5, ()=>boss.moveHorizontal("left",'infini', 320, 7));
        let intervalClear = setInterval(()=>{
            if(Boss_1_clear === true) {
                clearInterval(intervalClear);
                if(f) f();
            }
        }, 1000);

    }

    function attackEnemy(type, time, f){
        let taille = 50;
        let life = 1;
        let point = 10;
        let fireColor = "#ffb71c";
        let fireSize = 10;
        if(type === 2) {
            taille = 120;
            life = 10;
            point = 100;
            fireColor ="#fc9de9";
        }
        if(type === 3) {
            taille = 70;
            life = 3;
            point = 30;
        }
        if(type === 4) {
            taille = 70;
            life = 7;
            point = 50;
            fireColor ="red";
        }
        if(type === 5) {
            taille = 100;
            life = 10;
            point = 100;
            fireColor = "#9dfcad";
        }

        setTimeout(()=>{
            let enemy = new Enemy({
                type:type,
                target: player,
                top:10,
                left:10,
                width: taille,
                height: taille,
                life: life,
                isExist: true,
                point:point,
                fireColor: fireColor
            });
            Enemies.register(enemy);
            player.enemies = Enemies.get();
                // let nbEnemy = player.countEnemies;
            let xPosition = randomNum(taille, 640-taille);
            let yPosition = randomNum(20, 400);
            let dir = "right";
            if(xPosition > 320) dir = "left";
            enemy.goIn(xPosition, yPosition, 5, ()=>enemy.moveHorizontal(dir,2, 100, 7, ()=>enemy.goOut(Enemies)));
                // if(type === "mini-boss") nbEnemy = miniBossRemoved;
                // if(type === "boss") nbEnemy = bossRemoved;
                if(f) f();
        }, time);

    }
    if(player.game.started === "title_display") {
        control.pushTab(player);
        control.pushStart(player,()=>control.pushButton(player, ()=>level_1(()=>level_2())));
    }

    // -------------------------------------------Enregistrement score-----------------------------------------
    let score_request = document.getElementById("score_request");

    document.getElementById('save').onclick = function() {
        let name = document.getElementById('name').value;
        if(score_request.value == player.game.final_score) {
            $.ajax({
                url : 'datas_save.php',
                type : 'POST', // Le type de la requête HTTP.
                data: {
                    name: name,
                    score: score_request.value
                },
                success : function(r){

                    // if(r == 1) alert('enregistrement réussi');
                    if(r == 1) document.querySelector('.form').remove();

                }
             });
        } else {
            alert('Hey mais tu triches !!!');
        }

    };




    </script>
</body>
</html>
