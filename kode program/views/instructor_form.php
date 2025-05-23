<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($instructor) ? 'Edit Instructor' : 'Add Instructor'; ?></h2>
<form action="index.php?entity=instructor&action=<?php echo isset($instructor) ? 'update&id=' . $instructor['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Name:</label>
        <input type="text" name="name" value="<?php echo isset($instructor) ? htmlspecialchars($instructor['name']) : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Email:</label>
        <input type="email" name="email" value="<?php echo isset($instructor) ? htmlspecialchars($instructor['email']) : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Specialization:</label>
        <input type="text" name="specialization" value="<?php echo isset($instructor) ? htmlspecialchars($instructor['specialization']) : ''; ?>" class="border p-2 w-full">
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
