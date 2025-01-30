document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-button');
  
    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Get the delete type and ID from data attributes
            const deleteType = this.dataset.deleteType;
            const deleteID = this.dataset.deleteId;
  
            // Show a confirmation SweetAlert with a dynamic message
            Swal.fire({
                title: 'Confirm Delete',
                text: `Are you sure you want to delete this ${deleteType}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: `Yes, delete ${deleteType}`
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the dynamic delete URL
                    window.location.href = `delete.php?delete_${deleteType}_id=${deleteID}`;
                }
            });
        });
    });
  });
  