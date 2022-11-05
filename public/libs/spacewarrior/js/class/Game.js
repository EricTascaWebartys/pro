class Game {
    constructor(options) {
        this.started = options.started || "title_display";
        this.level = options.level || 1;
        this.paused = options.paused || false;
        this.end = options.end || false;
        this.final_score = options.final_score || 0;
        this.url_classement = options.url_classement || "";
        this.url_datas_save = options.url_datas_save || "";
    }

    start(){
        this.started = "in_game";
        if(this.level === 1) Musics.play('level_1');
        if(this.level === 2) Musics.play('level_2');
        if(this.level === 3) Musics.play('level_3');
        return this;
    }
    stop(){
        this.started = "title_display";
        return this;
    }
    congratulation(){
        this.end = true;
        document.getElementsByClassName('end')[0].style.visibility = 'visible';
        document.getElementsByClassName('end')[0].style.opacity = 1;
        document.getElementById("score-final").innerHTML=this.final_score;
        document.getElementById("score_request").value = player.game.final_score;

        Music.play('goat');
        setTimeout(()=>{
            this.gameover();
        },6000);
        // setTimeout(()=>{
        //     Music.play('end');
        // },13000);
        return this;
    }
    gameover(){
        document.getElementsByClassName('gameover')[0].style.visibility = 'visible';
        document.getElementsByClassName('gameover')[0].style.opacity = 1;
        document.getElementById("score-gameover").innerHTML=this.final_score;
        document.getElementById("score_request").value = player.game.final_score;
        if(this.started === "finish") {
            Music.play('end');
        } else {
            Music.play('gameover');
        };

        return this;
    }
    classement(){
        window.location.replace(this.url_classement);
    }
}
