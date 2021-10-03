<?php

interface emkost {
    public function soderjit_water();
    public function nesoderjit_water();
}

class steklo implements emkost {
    public function soderjit_water()
    {
       echo "В стеклянной ёмкости есть вода";
    }
    public function nesoderjit_water()
    {
        echo "В стеклянной ёмкости нет воды";
    }
}

class plastic implements emkost {
    public function soderjit_water()
    {
        echo "В пластиковой ёмкости есть вода";
    }
    public function nesoderjit_water()
    {
        echo "В пластиковой ёмкости нет воды";
    }
}

class filter_for_water {
    private $material;
    private $filter = "вкл";

    public function __construct(emkost $material, string $filter)
    {
        $this->filter = $filter;
        $this->material = $material;
    }
    function Soderj_water()
    {
        $this->material->soderjit_water();
    }
    function Nosoderj_water()
    {
        $this->material->nesoderjit_water();
    }

    function setFilter(string $filter)
    {
        $this->filter = $filter;
    }
    function getFilter()
    {
        return $this->filter;
    }
}
$steklo = new steklo();
$plastic = new plastic();
$filter = new filter_for_water($steklo, 'on');
echo $filter->soderj_water() . "<br>";
echo 'Состояние фильтра: ' . $filter->getFilter() . "<br>";
echo $filter->Nosoderj_water() . "<br>";
