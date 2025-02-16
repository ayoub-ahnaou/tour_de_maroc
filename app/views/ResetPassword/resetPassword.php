<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-center text-gray-800">Reset Your Password</h2>
    <p class="text-center text-gray-500 text-sm mt-2">Enter a new password for your account.</p>

    <form action="" method="POST" class="mt-6">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token'] ?? ''); ?>">
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($_GET['user_id'] ?? ''); ?>">

        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-medium">New Password</label>
            <input type="password" id="password" name="password" required
                   class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none">
        </div>

        <div class="mb-4">
            <label for="confirm_password" class="block text-gray-700 font-medium">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required
                   class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none">
        </div>

        <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-200">
            Reset Password
        </button>
    </form>

    <p class="text-center text-gray-500 text-sm mt-4">
        <a href="/login" class="text-blue-500 hover:underline">Back to Login</a>
    </p>
</div>

</body>
</html>

