   <div class="dashboard-footer">
   <p class="m-0 text-center">&copy; My Company. All rights reserved</p>
   </div>
   </div>
   <script>
       var APP_URL = "{{ env('APP_URL') }}";
   </script>
    
    @if (request()->routeIs([
           'dashboard.articles.new',
           'dashboard.articles.edit',
           'dashboard.pages.new',
           'dashboard.pages.edit',
       ]))
   <script>
       CKEDITOR.replace('content', {
           filebrowserUploadUrl: "{{ route('dashboard.ckupload') . '?_token=' . csrf_token() }}",
           filebrowserUploadMethod: 'form'
       });
       CKEDITOR.on("instanceReady", function(event) {
           event.editor.on("beforeCommandExec", function(event) {
               // Show the paste dialog for the paste buttons and right-click paste
               if (event.data.name == "paste") {
                   event.editor._.forcePasteDialog = true;
               }
           })
       });
   </script>
   @endif

   </body>

   </html>
