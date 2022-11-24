<?php

namespace ch\comem;

class databaseMember extends database
{
    /**
     * Select all members
     * @return array
     */
    public function selectAllMembers(): array
    {
        return $this->selectAll('members');
    }

    /**
     * Select one member
     * @return array
     */
    public function selectOneMember(string $id): array
    {
        return $this->selectOne('members', $id);
    }

    /**
     * Insert into members
     * @return array
     */
    public function insertMember(string $nom, string $prenom, string $email, string $password): array
    {
        $data = [
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'password' => $password
        ];
        return $this->insert('members', $data);
    }

    /**
     * Update member
     * @return array
     */
    public function updateMember(string $id, string $nom, string $prenom, string $email, string $password): array
    {
        $data = [
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'password' => $password
        ];
        return $this->update('members', $data, $id);
    }

    /**
     * Delete member
     * @return array
     */
    public function deleteMember(string $id): array
    {
        return $this->delete('members', $id);
    }

    /**
     * Select one member by email
     * @return array
     */
    public function selectOneMemberByEmail(string $email): array
    {
        $sql = "SELECT * FROM members WHERE email = '$email'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Select one member by email and password
     * @return array
     */
    public function selectOneMemberByEmailAndPassword(string $email, string $password): array
    {
        $sql = "SELECT * FROM members WHERE email = '$email' AND password = '$password'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

}