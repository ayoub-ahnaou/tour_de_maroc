<?php require APPROOT . '/views/components/header.php'; ?>
<?php require APPROOT . '/views/components/navbar.php'; ?>

<div class="container">
    <h1>My Virtual Teams</h1>

    <?php if (empty($data['virtualTeams'])) : ?>
        <p>You haven't created any virtual teams yet.</p>
    <?php else : ?>
        <ul class="list-group">
            <?php foreach ($data['virtualTeams'] as $team) : ?>
                <li class="list-group-item">
                    <a href="<?php echo URLROOT; ?>/virtualteam/detail/<?php echo $team['virtual_team_id']; ?>">
                        <?php echo htmlspecialchars($team['team_name']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <a href="<?php echo URLROOT; ?>/virtualteam/create" class="btn btn-primary mt-3">Create New Team</a>
</div>

<?php require APPROOT . '/views/components/footer.php'; ?>