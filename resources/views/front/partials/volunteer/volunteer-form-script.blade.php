 <script>
     $(document).ready(function() {
         $('#volunteerForm').on('submit', function(e) {
             e.preventDefault();

             let formData = new FormData(this);

             const spinner = document.getElementById('spinner');
             spinner.classList.remove('d-none');
             
             $.ajax({
                 url: "{{ route('front.store.volunteer') }}",
                 method: 'POST',
                 data: formData,
                 processData: false,
                 contentType: false,
                 headers: {
                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
                 },
                 success: function(response) {
                     if (response.status === 'success') {
                         $('#volunteerForm')[0].reset();
                         toastr.success(response.message ||
                             'Enquiry Submitted Successfully!');
                         spinner.classList.add('d-none');
                     }
                 },
                 error: function(xhr) {
                     let errorMessage = 'Something went wrong! Please try again later.';
                     if (xhr.responseJSON && xhr.responseJSON.message) {
                         errorMessage = xhr.responseJSON.message;
                     }
                     toastr.error(errorMessage,
                         'Something went wrong! Please try again later.');
                     spinner.classList.add('d-none');
                 }
             });
         });
     });
 </script>
