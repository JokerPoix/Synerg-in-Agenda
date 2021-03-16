<?php
namespace Date;

class Events
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    public function getEventsBetween(\DateTime $start, \DateTime $end): array
    {
        $pdo = new \PDO('mysql:host=localhost;dbname=Agenda synerg-in', 'root', 'root', [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ]);
        $sql ="SELECT * FROM Events WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}'";
        $statement = $this->pdo->query($sql);
        $results = $statement ->fetchAll();
        return $results;
    }

    public function getEventsByDay(\DateTime $start, \DateTime $end): array
    {
        $events = $this->getEventsBetween($start, $end);
        $days=[];
        foreach ($events as $event) {
            $date = explode(' ', $event['start'])[0];
            if (!isset($days[$date])) {
                $days[$date] = [$event];
            } else {
                $days[$date][] = $event;
            }
        }
        return $days;
    }

    public function find(int $id): Event
    {
        require 'Event.php';
        $statement = $this->pdo->query("SELECT * FROM events WHERE id= $id LIMIT 1");
        $statement ->setFetchMode(\PDO::FETCH_CLASS, \Date\Event::class);
        $result =$statement->fetch();
        if ($result === false);
        throw new \Exception('Aucun résultat trouvé');
        return $result;
    }
}