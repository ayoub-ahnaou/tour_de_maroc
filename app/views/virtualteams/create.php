<?php require APPROOT . '/views/components/header.php'; ?>
<?php require APPROOT . '/views/components/navbar.php'; ?>

<div class="container">
    <h1>Create Virtual Team</h1>

    <?php if (isset($data['error'])) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $data['error']; ?>
        </div>
    <?php endif; ?>

    <form action="<?php echo URLROOT; ?>/virtualteam/create" method="POST">
        <div class="mb-3">
            <label for="team_name" class="form-label">Team Name:</label>
            <input type="text" class="form-control" id="team_name" name="team_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Team</button>
    </form>
</div>

<?php require APPROOT . '/views/components/footer.php'; ?>