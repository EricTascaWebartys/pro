<?php
class Datas {
    private $datas;

    public function __construct($options){
        $this->datas = $options["datas"] || json_decode(file_get_contents('json/datas.json'));
    }

    public function getClassement() {
        var_dump($this->datas);exit();
        // $classement = usort($this->datas, function($d){ 
        //     return $d['score'] > $d['score'];
    }


    /**
     * Get the value of Datas
     *
     * @return mixed
     */
    public function getDatas()
    {
        return $this->datas;
    }

    /**
     * Set the value of Datas
     *
     * @param mixed $datas
     *
     * @return self
     */
    public function setDatas($datas)
    {
        $this->datas = $datas;

        return $this;
    }

}
