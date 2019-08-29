<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Criptografia
 *
 * @author almerindo junior
 * @Empresa the slex
 */
class Criptografia {
    //put your code here
    private $alfabetoMm  =  ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
    private $alfabetoUnificado = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9','@','=','_','-','&','+','*','$','%','#',':','.',',',' '];
    private $cifra = ['A' =>'UTY','B' =>'fDi','C' =>'qwF','D' =>'OnO','E' =>'gqs','F' =>'WJd','G' =>'sBI','H' =>'Mmg','I' =>'RVn','J' =>'lvA','K' =>'Ybm','L' =>'FBn','M' =>'lbd','N' =>'njz','O' =>'BMT','P' =>'YGU','Q' =>'svb','R' =>'YtX','S' =>'Zol','T' =>'Dvi','U' =>'LJJ','V' =>'Wox','W' =>'RlH','X' =>'Tqp','Y' =>'lUY','Z' =>'SdZ','a' =>'Xit','b' =>'FuR','c' =>'kCJ','d' =>'VGm','e' =>'QDd','f' =>'ydk','g' =>'Npr','h' =>'nLt','i' =>'QcC','j' =>'VBq','k' =>'JhG','l' =>'MuK','m' =>'gCm','n' =>'pRJ','o' =>'Bsj','p' =>'qNy','q' =>'IUk','r' =>'zeK','s' =>'BQj','t' =>'lSf','u' =>'OBO','v' =>'tug','w' =>'vMS','x' =>'Syx','y' =>'sLx','z' =>'QHf','0' =>'SJN','1' =>'dCu','2' =>'zPn','3' =>'rsi','4' =>'hVC','5' =>'gTH','6' =>'FJi','7' =>'SKs','8' =>'AaK','9' =>'vwK','@' =>'Rps','=' =>'Uai','_' =>'TaT','-' =>'ZuV','&' =>'RId','+' =>'FSK','*' =>'VUU','$' =>'KDU','%' =>'Wfk','#' =>'LxO',':' =>'DZI','.' =>'sfx',',' =>'fyw',' ' =>'rVN'];
   
    public function decodeCifra($dados){
        $separados = array();  $retorno = "";
            $v=0;$y=0;$p=0;
        for ($x=0; $x<strlen($dados); $x++){
            if($x ==0){
             $v=$x+2;
             $separados[$y] = $dados[$x].$dados[$v-1].$dados[$v] ;
             $x+=2;
            }elseif (($x+3)>=strlen($dados)) {
              $v=$x+2;
             $separados[$y] = $dados[$x].$dados[$v-1].$dados[$v] ;
             $x+=2;
            } else {
              $v=$x+2;
            $separados[$y] = $dados[$x].$dados[$v-1].$dados[$v] ;
             $x+=2;
            }
            $y++;
        }
        for($x = 0; $x<count($separados); $x++){
            for ($b=0; $b<count($this->getCifra());$b++){
                if($separados[$x] == $this->getCifra()[$this->getAlfabetoUnificado()[$b]]){
                    $retorno .= $this->getAlfabetoUnificado()[$b];
                }
            }
        }
        return base64_decode($retorno);
    }

        public function encodeCifra($dados){
        $dados = base64_encode($dados); $retorno = "";
        for ($x=0; $x < strlen($dados); $x++){
      for ($y=0;$y< count($this->getAlfabetoUnificado()); $y++){
         if($dados[$x] == $this->getAlfabetoUnificado()[$y] ){
            $retorno .= $this->getCifra()[$dados[$x]];
             break;
         }
  } 
    }
 return ["cript"=>$retorno, "tamanho"=> strlen($retorno)] ;
    }

        public function verificarCifra(){
        if($this->verificarDuplicatas($this->getCifra())){
            echo 'existe Duplicadas na cifra';
        } else {
            echo 'Não existe duplicadas na cifra';
        }
    }
    
    public function verificarDuplicatas($string){
$copia = array_unique($string); if(count($copia) != count($string)) { return TRUE;  // echo "existem valores duplicados";
} else {    return FALSE;    // echo "não existem valores duplicados";
}
    }

    public function gerarCifra(){
         $var;
          echo '[';
          $cont = count($this->getAlfabetoMm())-1;
          for ($x = 0; $x < count($this->getAlfabetoUnificado()); $x++){
              if($x == 0){
                  $var["".$this->getAlfabetoUnificado()[$x].""] = $this->getAlfabetoMm()[rand(0, $cont)].$this->getAlfabetoMm()[rand(0, $cont)].$this->getAlfabetoMm()[rand(0, $cont)];
                  echo "'".$this->getAlfabetoUnificado()[$x]."' =>'".$var["".$this->getAlfabetoUnificado()[$x].""]."'";
              } else {
                    $var["".$this->getAlfabetoUnificado()[$x].""] = $this->getAlfabetoMm()[rand(0, $cont)].$this->getAlfabetoMm()[rand(0, $cont)].$this->getAlfabetoMm()[rand(0, $cont)] ;
                   echo ",'".$this->getAlfabetoUnificado()[$x]."' =>'".$var["".$this->getAlfabetoUnificado()[$x].""]."'";
              }
          }
          echo ']';
    }
    protected function getCifra() {
        return $this->cifra;
    }

    public function setCifra($cifra) {
        $this->cifra = $cifra;
    }
    
    protected function getAlfabetoUnificado() {
        return $this->alfabetoUnificado;
    }

    public function setAlfabetoUnificado($alfabetoUnificado) {
        $this->alfabetoUnificado = $alfabetoUnificado;
    }
    
    protected function getAlfabetoMm() {
        return $this->alfabetoMm;
    }

    public function setAlfabetoMm($alfabetoMm) {
        $this->alfabetoMm = $alfabetoMm;
    }

     public function version(){
        return "version 0.1";
    }

    
}
