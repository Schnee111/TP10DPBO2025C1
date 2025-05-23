<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Course List</h2>
<a href="index.php?entity=course&action=add" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Course</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Title</th>
        <th class="border p-2">Description</th>
        <th class="border p-2">Duration (hours)</th>
        <th class="border p-2">Instructor</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($courseList as $course): ?>
    <tr>
        <td class="border p-2"><?php echo htmlspecialchars($course['title']); ?></td>
        <td class="border p-2"><?php echo htmlspecialchars($course['description']); ?></td>
        <td class="border p-2"><?php echo $course['duration']; ?></td>
        <td class="border p-2"><?php echo htmlspecialchars($course['instructor_name'] ?? ''); ?></td>
        <td class="border p-2 flex space-x-2">
            <a href="index.php?entity=course&action=edit&id=<?php echo $course['id']; ?>" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>
            
            <form action="index.php?entity=course&action=delete&id=<?php echo $course['id']; ?>" method="POST" onsubmit="return confirm('Are you sure?');" style="display:inline;">
                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
