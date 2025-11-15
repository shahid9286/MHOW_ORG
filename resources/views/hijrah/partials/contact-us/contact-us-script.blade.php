 <script>
     $(document).ready(function() {
         $('#contactform').on('submit', function(e) {
             e.preventDefault();

             $('.error-label').text('').css('color', '');

             const spinner = document.getElementById('spinner');
             spinner.classList.remove('d-none');

             let formData = new FormData(this);

             $.ajax({
                 url: "{{ route('front.contactus.store') }}",
                 method: 'POST',
                 data: formData,
                 processData: false,
                 contentType: false,
                 headers: {
                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
                 },
                 success: function(response) {
                     if (response.status === 'success') {
                         $('#contactform')[0].reset();
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
         toastr.options = {
             "closeButton": true,
             "progressBar": true,
             "positionClass": "toast-top-right",
             "timeOut": "5000",
         };
     });
 </script>
