<?php
/**
 * View to show all events
 */
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Evénements</title>
    </head>
    <body>
        <h1>Evénements</h1>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Lieu</th>
                    <th>Heure de début</th>
                    <th>Heure de fin</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                    <tr>
                        <td><?= $event['date'] ?></td>
                        <td><?= $event['lieu'] ?></td>
                        <td><?= $event['heureDebut'] ?></td>
                        <td><?= $event['heureFin'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>
