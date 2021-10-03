<?
interface sposob_nagrevania{
    public function on_komforka();
    public function off_komforka();
}


class indiction_komforka implements sposob_nagrevania {
    public function on_komforka(){
        echo "Комфорка зажглась с помощью индукционного тепла";
    }
    public function off_komforka(){
        echo "Подача индукционного тепла прекратилась";
    }
}

class gazov_komforka implements sposob_nagrevania {
    public function on_komforka(){
        echo "Комфорка зажглась с помощью газового тепла";
    }
    public function off_komforka(){
        echo "Подача газа прекратилась";
    }
}
class electric_plita
{
    private $komforka;
    private $shnur = "0vt";
    private $knopka_on_off = "on";
    private $power = 0;

    public function __construct(sposob_nagrevania $komforka, string $shnur, string $knopka_on_off, int $power)
    {
        $this->shnur = $shnur;
        $this->knopka_on_off = $knopka_on_off;
        $this->power = $power;
        $this->komforka = $komforka;
    }

    function on_nagrev () {
        $this->komforka->on_komforka();
    }

    function off_nagrev () {
        $this->komforka->off_komforka();
    }

    function setShnur(string $shnur)
    {
        $this->shnur = $shnur;
    }
    function getShnur()
    {
        return $this->shnur;
    }

    function setKnopka_on_off(string $knopka_on_off)
    {
        $this->knopka_on_off = $knopka_on_off;
    }
    function getKnopka_on_off()
    {
        return $this->knopka_on_off;
    }

    function setPower(int $power)
    {
        $this->power = $power;
    }
    function getPower()
    {
        return $this->power;
    }
}


$komforka_induction = new indiction_komforka();
$komforka_gaz = new gazov_komforka();
$electric_plita = new electr_plita($komforka_gaz, '220V', 'off', '100');
echo $electric_plita->on_nagrev() . "<br>";
echo 'Мощность: ' . $electric_plita->getPower() . "<br>";
echo 'Подача тока: ' . $electric_plita->getShnur() . "<br>";
echo 'Состояние плиты: ' . $electric_plita->getKnopka_on_off() . "<br>";
echo $electric_plita->off_nagrev() . "<br>";
