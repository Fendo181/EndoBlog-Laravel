<?php

class SimpleClass{
    
    //プロパティ
    public $var = 'a value';
    
    
    //メソッド
    public function dispVar(){
        
        echo $this->var;
    }
    
}


dispVar();