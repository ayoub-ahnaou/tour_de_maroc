<?php require APP_ROOT . '/public/components/header.php'; ?>

<div class="container">
    <h1>Virtual Team: <?php echo htmlspecialchars($data['virtualTeam']['team_name']); ?></h1>

    <h2>Cyclists in this Team</h2>
    <?php if (empty($data['cyclists'])) : ?>
        <p>No cyclists added to this team yet.</p>
    <?php else : ?>
        <ul class="list-group">
            <?php foreach ($data['cyclists'] as $cyclist) : ?>
                <li class="list-group-item">
                    <?php echo htmlspecialchars($cyclist['nom_utilisateur']); ?>
                    <!-- You can display more cyclist info here if needed -->
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <h2>Add Cyclist to Team</h2>
    <form action="<?php echo URLROOT; ?>/virtualteam/addCyclist" method="POST">
        <input type="hidden" name="virtual_team_id" value="<?php echo $data['virtualTeam']['virtual_team_id']; ?>">
        <div class="mb-3">
            <label for="cyclist_id" class="form-label">Cyclist ID:</label>
            <input type="number" class="form-control" id="cyclist_id" name="cyclist_id" required>
            <div class="form-text">Enter the Utilisateur ID of the cyclist to add.</div>
        </div>
        <button type="submit" class="btn btn-primary">Add Cyclist</button>
    </form>

    <a href="<?php echo URLROOT; ?>/virtualteam/myteams" class="btn btn-secondary mt-3">Back to My Teams</a>
</div>

<?php require APP_ROOT . '/public/components/footer.php'; ?>