<?php
    trait Hewan
    {
        public $nama, $darah=50, $jumlahKaki, $keahlian;
        
        public function atraksi($elang)
        {
            return "Kemudian ".$this->nama." berlari cepat untuk menangkap ".$elang->nama." yang sedang terbang tinggi untuk menghindar"."."."<br>";
        }
    }
    
    trait Fight
    {
        public $attackPower, $defencePower;
        
        public function serang($harimau)
        {
            return "Setelah itu  ".$this->nama." menyerang ".$harimau->nama." dan ".$harimau->nama." membalas menyerang ".$this->nama."."."<br>";
        }

        public function diserang($harimau)
        {
            $this->darah = $this->darah-($harimau->attackPower/$this->defencePower);
            return " Elang terkena serangan oleh ".$harimau->nama. " yang menyebabkan darah berkurang menjadi ".$this->darah."."."<br>";
        }
    }
   
    class Harimau
    {
        use Hewan, Fight;

        public function GetInfoHewan()
        {
            return "Pada suatu pagi ada seekor ".$this->nama." yang mempunyai jumlah kaki ".$this->jumlahKaki.
            " memiliki keahlian ".$this->keahlian." attack power = ".$this->attackPower.
            " dan defence power = ".$this->defencePower."."."<br>";
        }
    }

    class Elang
    {
        use Hewan, Fight;

        public function GetInfoHewan()
        {
            return "Lalu datanglah seekor ".$this->nama." yang mempunyai jumlah kaki ".$this->jumlahKaki.
            " memiliki keahlian ".$this->keahlian." attack power = ".$this->attackPower.
            " dan defence power = ".$this->defencePower."."."<br>";
        }
    }

    $harimau    = new Harimau();
    $harimau->nama          = "harimau";
    $harimau->jumlahKaki    = 4;
    $harimau->keahlian      = "lari cepat";
    $harimau->attackPower   = 7;
    $harimau->defencePower  = 8;
    echo $harimau->GetInfoHewan();

    $elang      = new Elang();
    $elang->nama          = "elang";
    $elang->jumlahKaki    = 2;
    $elang->keahlian      = "terbang tinggi";
    $elang->attackPower   = 10;
    $elang->defencePower  = 5;
    echo $elang->GetInfoHewan();

   echo $elang->serang($harimau);
   echo $harimau->atraksi($elang);

  echo $elang->diserang($harimau);
?>