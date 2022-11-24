<?php

namespace ch\comem;

class databaseEvent extends database
{
    /**
     * Select all events
     * @return array
     */
    public function selectAllEvents(): array
    {
        return $this->selectAll('events');
    }

    /**
     * Select one event
     * @return array
     */
    public function selectOneEvent(string $id): array
    {
        return $this->selectOne('events', $id);
    }

    /**
     * Insert into events
     * @return array
     */
    public function insertEvent(string $date, string $lieu, string $heureDebut, string $heureFin): array
    {
        $data = [
            'date' => $date,
            'lieu' => $lieu,
            'heureDebut' => $heureDebut,
            'heureFin' => $heureFin
        ];
        return $this->insert('events', $data);
    }

    /**
     * Update event
     * @return array
     */
    public function updateEvent(string $id, string $date, string $lieu, string $heureDebut, string $heureFin): array
    {
        $data = [
            'date' => $date,
            'lieu' => $lieu,
            'heureDebut' => $heureDebut,
            'heureFin' => $heureFin
        ];
        return $this->update('events', $data, $id);
    }

    /**
     * Delete event
     * @return array
     */
    public function deleteEvent(string $id): array
    {
        return $this->delete('events', $id);
    }
}