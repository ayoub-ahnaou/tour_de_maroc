<?php require_once "./components/header.php"; ?>

<div class="container">
    <h1>Most Supported Cyclists</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Name</th>
                <th>Email</th>
                <th>Team</th>
                <th>Nationality</th>
                <th>Supporters</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['mostFollowedCyclists'])): ?>
                <?php foreach ($data['mostFollowedCyclists'] as $index => $cyclist): ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <td><?= htmlspecialchars($cyclist['nom_utilisateur']); ?></td>
                        <td><?= htmlspecialchars($cyclist['email']); ?></td>
                        <td><?= htmlspecialchars($cyclist['equipe']); ?></td>
                        <td><?= htmlspecialchars($cyclist['nationalite']); ?></td>
                        <td><?= (int)$cyclist['total_followers']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No cyclists found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once "./components/footer.php"; ?>