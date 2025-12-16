document.addEventListener('DOMContentLoaded', function() {
    // Get all permission checkboxes
    const permissionCheckboxes = document.querySelectorAll('.form-check-input[data-role-id][data-permission]');

    // Add change event listener to each checkbox
    permissionCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const roleId = this.dataset.roleId;
            const permission = this.dataset.permission;
            const isChecked = this.checked;

            // Send AJAX request to update permission
            fetch('/api/roles/update-permission', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    role_id: roleId,
                    permission: permission,
                    enabled: isChecked
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    toastr.success('Permission updated successfully');
                } else {
                    // Show error message and revert checkbox
                    toastr.error('Failed to update permission');
                    this.checked = !isChecked;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.error('An error occurred while updating permission');
                this.checked = !isChecked;
            });
        });
    });
});