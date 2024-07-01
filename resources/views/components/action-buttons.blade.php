<!-- resources/views/components/action-buttons.blade.php -->
<div class="flex space-x-2">
    <a href="{{ route('utilisateurs.edit', $row) }}" class="text-blue-500 hover:no-underline">
        <i class="fas fa-eye"></i> View
    </a>
    <a href="{{ route('utilisateurs.destroy', $row) }}" class="text-red-500 hover:no-underline">
        <i class="fas fa-trash"></i> Delete
    </a>
</div>
