 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 <!-- Bootstrap Bundle JS -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
 <!-- DataTables JS -->
 <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
 <script>
     $(document).ready(function() {
         $('#example').DataTable({
             responsive: true
         });

         const sidebar = document.querySelector('.sidebar');
         const toggleBtn = document.querySelector('.toggle-sidebar');

         toggleBtn.addEventListener('click', () => {
             sidebar.classList.toggle('active');
         });
     });
 </script>

 </body>

 </html>
