<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Student List</h2>
<a href="index.php?entity=student&action=add" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Student</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Name</th>
        <th class="border p-2">Email</th>
        <th class="border p-2">Course</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($studentList as $student): ?>
    <tr>
        <td class="border p-2"><?php echo htmlspecialchars($student['name']); ?></td>
        <td class="border p-2"><?php echo htmlspecialchars($student['email']); ?></td>
        <td class="border p-2"><?php echo htmlspecialchars($student['course_title'] ?? ''); ?></td>
        <td class="border p-2 flex space-x-2">
            <a href="index.php?entity=student&action=edit&id=<?php echo $student['id']; ?>" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>
            
            <form action="index.php?entity=student&action=delete&id=<?php echo $student['id']; ?>" method="POST" onsubmit="return confirm('Are you sure?');" style="display:inline;">
                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
