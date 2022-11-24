<?php

namespace ch\comem;

class databaseEventSubscribe extends database
{
    /**
     * Select all eventSubscribes
     * @return array
     */
    public function selectAllEventSubscribes(): array
    {
        return $this->selectAll('eventSubscribes');
    }

    /**
     * Select one eventSubscribe
     * @return array
     */
    public function selectOneEventSubscribe(string $id): array
    {
        return $this->selectOne('eventSubscribes', $id);
    }

    /**
     * Insert into eventSubscribes
     * @return array
     */
    public function insertEventSubscribe(string $idEvent, string $idMember): array
    {
        $data = [
            'idEvent' => $idEvent,
            'idMember' => $idMember
        ];
        return $this->insert('eventSubscribes', $data);
    }

    /**
     * Update eventSubscribe
     * @return array
     */
    public function updateEventSubscribe(string $id, string $idEvent, string $idMember): array
    {
        $data = [
            'idEvent' => $idEvent,
            'idMember' => $idMember
        ];
        return $this->update('eventSubscribes', $data, $id);
    }

    /**
     * Delete eventSubscribe
     * @return array
     */
    public function deleteEventSubscribe(string $id): array
    {
        return $this->delete('eventSubscribes', $id);
    }

    /**
     * Select all eventSubscribes by event
     * @return array
     */
    public function selectAllEventSubscribesByEvent(string $idEvent): array
    {
        $sql = "SELECT * FROM eventSubscribes WHERE idEvent = :idEvent";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':idEvent', $idEvent, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Select all eventSubscribes by member
     * @return array
     */
    public function selectAllEventSubscribesByMember(string $idMember): array
    {
        $sql = "SELECT * FROM eventSubscribes WHERE idMember = :idMember";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':idMember', $idMember, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Select one eventSubscribe by event and member
     * @return array
     */
    public function selectOneEventSubscribeByEventAndMember(string $idEvent, string $idMember): array
    {
        $sql = "SELECT * FROM eventSubscribes WHERE idEvent = :idEvent AND idMember = :idMember";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':idEvent', $idEvent, \PDO::PARAM_INT);
        $stmt->bindValue(':idMember', $idMember, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Delete eventSubscribe by event and member
     * @return array
     */
    public function deleteEventSubscribeByEventAndMember(string $idEvent, string $idMember): array
    {
        $sql = "DELETE FROM eventSubscribes WHERE idEvent = :idEvent AND idMember = :idMember";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':idEvent', $idEvent, \PDO::PARAM_INT);
        $stmt->bindValue(':idMember', $idMember, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Delete eventSubscribe by event
     * @return array
     */
    public function deleteEventSubscribeByEvent(string $idEvent): array
    {
        $sql = "DELETE FROM eventSubscribes WHERE idEvent = :idEvent";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':idEvent', $idEvent, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Delete eventSubscribe by member
     * @return array
     */
    public function deleteEventSubscribeByMember(string $idMember): array
    {
        $sql = "DELETE FROM eventSubscribes WHERE idMember = :idMember";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':idMember', $idMember, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

}