class Score {
    constructor(){
        this.datas = []
    }
    get(){
        return this.datas;
    }
    set(enemy){
        this.datas = push.enemy.point;
        return this;
    }
    delete(i){
        delete this.datas[i];
    }
    length(){
        return this.datas.length;
    }

}
