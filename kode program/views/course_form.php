<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($course) ? 'Edit Course' : 'Add Course'; ?></h2>
<form action="index.php?entity=course&action=<?php echo isset($course) ? 'update&id=' . $course['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Course Title:</label>
        <input type="text" name="title" value="<?php echo isset($course) ? htmlspecialchars($course['title']) : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Description:</label>
        <textarea name="description" class="border p-2 w-full" required><?php echo isset($course) ? htmlspecialchars($course['description']) : ''; ?></textarea>
    </div>
    <div>
        <label class="block">Duration (hours):</label>
        <input type="number" name="duration" value="<?php echo isset($course) ? $course['duration'] : ''; ?>" class="border p-2 w-full" required min="1">
    </div>
    <div>
        <label class="block">Instructor:</label>
        <select name="instructor_id" class="border p-2 w-full" required>
            <option value="">-- Select Instructor --</option>
            <?php foreach ($instructors as $instructor): ?>
                <option value="<?php echo $instructor['id']; ?>" <?php echo isset($course) && $course['instructor_id'] == $instructor['id'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($instructor['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
