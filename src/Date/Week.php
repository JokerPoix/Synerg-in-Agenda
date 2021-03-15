<?php
namespace App\Date;

class Week
{
    public $year;
    public $week;
    /**
     * Month constructor
     * @param int $year the year
     * @param int $week the week you are looking for
     * @throws Exception
     */
    public function __construct(?int $year =null, ?int $week=null)
    {
        if ($year === null) {
            $year = intval(date('Y'));
        }
        if ($week === null) {
            $week = intval(date('W'));
        }
        if ($year<1970) {
            throw new \Exception("Ma mémoire ne remonte pas à si loin.");
        }
        if ($week >52 || $week <1) {
            throw new \Exception("Semaine non valide");
        }
        $this->year = $year;
        $this->week = $week;
        
    }

    /*
    *return the month plainly spelled with year
    *@return string
    */
    public function ShowMonthYear(): string
    {
        return $this->weeks[$this->week-1] . ' ' . $this->year;
    }

    public function getDays(): array
    {   
        // we need to specify 'today' otherwise datetime constructor uses 'now' which includes current time
        $today = new \DateTime('today');
        $firstDay = clone $today->setISODate($this->year, $this->week, 0);
        $days =[];
        
        for ($i=1; $i <=7 ; $i++) {
            $day =(clone $firstDay)->modify("+{$i} day");
            $formatedDay = strftime("%a %d", $day->getTimestamp());
            array_push($days, $formatedDay);
        };
        return($days);
    }

    public function previousWeek(): Week 
    {
        $week = $this->week - 1;
        $year = $this->year;
        if ($week === 0){
            $week = 52;
            $year--;
        }
        return new Week($year, $week);
    }

    public function nextWeek(): Week 
    {
        $week = $this->week + 1;
        $year = $this->year;
        if ($week>52){
            $week = 1;
            $year++;
        }
        return new Week($year, $week);
    }

}