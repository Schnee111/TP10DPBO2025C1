<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($student) ? 'Edit Student' : 'Add Student'; ?></h2>
<form action="index.php?entity=student&action=<?php echo isset($student) ? 'update&id=' . $student['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Name:</label>
        <input type="text" name="name" value="<?php echo isset($student) ? htmlspecialchars($student['name']) : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Email:</label>
        <input type="email" name="email" value="<?php echo isset($student) ? htmlspecialchars($student['email']) : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Course:</label>
        <select name="course_id" class="border p-2 w-full" required>
            <option value="">-- Select Course --</option>
            <?php foreach ($courses as $course): ?>
                <option value="<?php echo $course['id']; ?>" <?php echo isset($student) && $student['course_id'] == $course['id'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($course['title']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
