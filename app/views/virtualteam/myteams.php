<?php require APP_ROOT . '/public/components/header.php'; ?>

<div class="container">
    <h1>My Virtual Teams</h1>

    <?php if (empty($data['virtualTeams'])) : ?>
        <p>You haven't created any virtual teams yet.</p>
    <?php else : ?>
        <ul class="list-group">
            <?php foreach ($data['virtualTeams'] as $team) : ?>
                <li class="list-group-item">
                    <a href="<?php echo URL_ROOT; ?>/virtualteam/detail/<?php echo $team['virtual_team_id']; ?>">
                        <?php echo htmlspecialchars($team['team_name']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <a href="<?php echo URL_ROOT; ?>/virtualteam/create" class="btn btn-primary mt-3">Create New Team</a>
</div>

<?php require APP_ROOT . '/public/components/footer.php'; ?>