<?php require APP_ROOT . '/public/components/header.php'; ?>

<div class="flex-grow container mx-auto px-4 py-8">
    <!-- White card -->
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); max-width: 500px; margin: 0 auto;">

        <!-- Form content -->
        <h2 style="font-size: 20px; font-weight: bold; margin-bottom: 20px;">Create Virtual Team</h2>

        <form action="<?php echo URL_ROOT; ?>/virtualteam/create" method="POST">
            <!-- Team name input -->
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px;">Team Name:</label>
                <input 
                    type="text" 
                    name="team_name" 
                    required
                    style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"
                >
            </div>

            <!-- Buttons -->
            <div style="display: flex; gap: 10px;">
                <a href="<?php echo URL_ROOT; ?>/virtualteams" 
                   style="flex: 1; padding: 10px; text-align: center; background: #f3f4f6; border: 1px solid #ccc; border-radius: 4px; text-decoration: none; color: #374151;">
                    Cancel
                </a>
                <button type="submit" 
                        style="flex: 1; padding: 10px; background: #4b5563; color: white; border: none; border-radius: 4px; cursor: pointer;">
                    Create Team
                </button>
            </div>
        </form>
    </div>
</div>

<?php require APP_ROOT . '/public/components/footer.php'; ?>